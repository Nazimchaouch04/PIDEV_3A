<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

#[Route('/api/face')]
class FaceLoginController extends AbstractController
{
    private const PYTHON_API_URL = 'http://127.0.0.1:8001';

    public function __construct(
        private HttpClientInterface $httpClient,
        private EntityManagerInterface $em,
        private UtilisateurRepository $userRepo,
        private EventDispatcherInterface $dispatcher
    ) {}

    // ─── Check if user has Face ID configured ─────────────────────────────────

    #[Route('/status', name: 'api_face_status', methods: ['POST'])]
    public function status(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'] ?? null;

        if (!$email) {
            return $this->json(['configured' => false]);
        }

        $user = $this->userRepo->findOneBy(['email' => $email]);
        if (!$user) {
            return $this->json(['configured' => false]);
        }

        return $this->json([
            'configured' => !empty($user->getFaceEncoding()),
        ]);
    }

    // ─── Step 1 of setup: Extract encoding from one image ─────────────────────

    #[Route('/generate-embedding', name: 'api_face_generate_embedding', methods: ['POST'])]
    public function generateEmbedding(Request $request): JsonResponse
    {
        $imageFile = $request->files->get('image');

        if (!$imageFile) {
            return $this->json(['error' => 'No image provided.'], 400);
        }

        try {
            $response = $this->httpClient->request('POST', self::PYTHON_API_URL . '/generate-embedding', [
                'body' => [
                    'file' => fopen($imageFile->getPathname(), 'r'),
                ],
            ]);

            $data = $response->toArray(false);

            if (isset($data['error'])) {
                return $this->json(['error' => $data['error']], 422);
            }

            return $this->json(['encoding' => $data['encoding']]);
        } catch (\Exception $e) {
            return $this->json(['error' => 'Face API unavailable. ' . $e->getMessage()], 503);
        }
    }

    // ─── Step 2 of setup: Save averaged encoding to DB ────────────────────────

    #[Route('/register-face', name: 'api_face_register', methods: ['POST'])]
    public function registerFace(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'] ?? null;
        $encodings = $data['encodings'] ?? [];

        if (!$email) {
            return $this->json(['error' => 'Email is required for setup.'], 400);
        }

        $user = $this->userRepo->findOneBy(['email' => $email]);
        if (!$user) {
            return $this->json(['error' => 'Utilisateur introuvable.'], 404);
        }

        if (count($encodings) < 3) {
            return $this->json(['error' => 'At least 3 face images are required for setup.'], 400);
        }

        // Ask Python to compute the averaged embedding
        try {
            $response = $this->httpClient->request('POST', self::PYTHON_API_URL . '/average-encodings', [
                'body' => [
                    'encodings_json' => json_encode($encodings),
                ],
            ]);

            $data = $response->toArray(false);
        } catch (\Exception $e) {
            return $this->json(['error' => 'Face API unavailable.'], 503);
        }

        if (!isset($data['averaged_encoding'])) {
            return $this->json(['error' => 'Failed to compute average embedding.'], 500);
        }

        $user->setFaceEncoding($data['averaged_encoding']);
        $this->em->flush();

        return $this->json(['success' => true, 'message' => 'Face ID configured successfully!']);
    }

    // ─── Login via Face ID ────────────────────────────────────────────────────

    #[Route('/login', name: 'api_face_login', methods: ['POST'])]
    public function faceLogin(Request $request): JsonResponse
    {
        $email = $request->request->get('email');
        $imageFile = $request->files->get('image');

        if (!$email || !$imageFile) {
            return $this->json(['error' => 'Email and face image are required.'], 400);
        }

        $user = $this->userRepo->findOneBy(['email' => $email]);

        if (!$user || empty($user->getFaceEncoding())) {
            return $this->json(['error' => 'Face ID not configured for this account.'], 404);
        }

        // Send image + stored encoding to Python for comparison
        try {
            $response = $this->httpClient->request('POST', self::PYTHON_API_URL . '/compare-face', [
                'body' => [
                    'file' => fopen($imageFile->getPathname(), 'r'),
                    'stored_encoding' => json_encode($user->getFaceEncoding()),
                ],
            ]);

            $result = $response->toArray(false);
        } catch (\Exception $e) {
            return $this->json(['error' => 'Face recognition service unavailable.'], 503);
        }

        if (!($result['match'] ?? false)) {
            return $this->json([
                'success' => false,
                'error' => $result['error'] ?? 'Face not recognized.',
                'distance' => $result['distance'] ?? null,
            ], 401);
        }

        // ✅ Face matched — authenticate the user in the Symfony session
        $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
        $this->container->get('security.token_storage')->setToken($token);
        $request->getSession()->set('_security_main', serialize($token));

        // Determine redirect URL by role
        $redirectUrl = in_array('ROLE_ADMIN', $user->getRoles(), true)
            ? $this->generateUrl('app_admin_dashboard')
            : $this->generateUrl('app_dashboard');

        return $this->json([
            'success' => true,
            'redirect' => $redirectUrl,
        ]);
    }
}
