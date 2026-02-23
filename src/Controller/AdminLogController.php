<?php

namespace App\Controller;

use App\Repository\LogEventRepository;
use App\Repository\UtilisateurRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin-logs')]
#[IsGranted('ROLE_ADMIN')]
class AdminLogController extends AbstractController
{
    #[Route('', name: 'app_admin_logs_index', methods: ['GET'])]
    public function index(LogEventRepository $logEventRepository): Response
    {
        // Fetch all logs, ordered descending by creation date
        $logs = $logEventRepository->findBy([], ['createdAt' => 'DESC']);

        return $this->render('admin_logs/index.html.twig', [
            'logs' => $logs,
        ]);
    }

    #[Route('/user/{id}', name: 'app_admin_logs_user', methods: ['GET'])]
    public function userLogs(int $id, LogEventRepository $logEventRepository, UtilisateurRepository $userRepository): Response
    {
        $user = $userRepository->find($id);
        
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Fetch all logs for this user
        $logs = $logEventRepository->findByUser($id);

        return $this->render('admin_logs/user_logs.html.twig', [
            'logs' => $logs,
            'user' => $user,
        ]);
    }

    #[Route('/user/{id}/login-logout', name: 'app_admin_logs_user_login_logout', methods: ['GET'])]
    public function userLoginLogout(int $id, LogEventRepository $logEventRepository, UtilisateurRepository $userRepository): Response
    {
        $user = $userRepository->find($id);
        
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Fetch only login/logout events for this user
        $logs = $logEventRepository->findLoginLogoutByUser($id);

        return $this->render('admin_logs/user_login_logout.html.twig', [
            'logs' => $logs,
            'user' => $user,
        ]);
    }

    #[Route('/pdf', name: 'app_admin_logs_pdf', methods: ['GET'])]
    public function generatePdf(LogEventRepository $logEventRepository): Response
    {
        $logs = $logEventRepository->findBy([], ['createdAt' => 'DESC']);

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->setIsRemoteEnabled(true);

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('admin_logs/pdf.html.twig', [
            'logs' => $logs,
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("historique_biosync_log.pdf", [
            "Attachment" => true
        ]);

        return new Response('', 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
