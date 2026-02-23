<?php

namespace App\Controller;

use App\Entity\Prescription;
use App\Entity\Consultation;
use App\Form\PrescriptionType;
use App\Repository\PrescriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Process\Process;

#[Route('/prescription')]
final class PrescriptionController extends AbstractController
{
    private ParameterBagInterface $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    // LIST
    #[Route(name: 'app_prescription_index', methods: ['GET'])]
    public function index(PrescriptionRepository $prescriptionRepository): Response
    {
        // Get only prescriptions for the current specialist's consultations
        $user = $this->getUser();
        
        if ($this->isGranted('ROLE_ADMIN')) {
            // Admin sees all prescriptions
            $prescriptions = $prescriptionRepository->findAll();
        } else {
            // Specialist sees only his own prescriptions
            $prescriptions = $prescriptionRepository->findBySpecialist($user);
        }
        
        return $this->render('prescription/index.html.twig', [
            'prescriptions' => $prescriptions,
            'isAdmin' => $this->isGranted('ROLE_ADMIN'),
        ]);
    }

    // CREATE PRESCRIPTION FOR SPECIALIST (without consultation)
    #[Route('/create', name: 'app_prescription_create', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Only specialists can create prescriptions
        if (!$this->isGranted('ROLE_SPECIALIST') && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }

        $prescription = new Prescription();
        $form = $this->createForm(PrescriptionType::class, $prescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Generate AI prescription if requested
            $aiGenerate = $request->query->get('ai_generate', false);
            if ($aiGenerate) {
                $symptoms = $request->query->get('symptoms', '');
                $diagnostic = $request->query->get('diagnostic', '');
                
                // Generate AI prescription data
                $aiData = $this->generateAIPrescription($symptoms, $diagnostic);
                
                if ($aiData && isset($aiData['suggestions']) && !empty($aiData['suggestions'])) {
                    // Auto-fill with first AI suggestion
                    $firstSuggestion = $aiData['suggestions'][0];
                    $prescription->setNomMedicament($firstSuggestion['name'] ?? '');
                    $prescription->setDose((int)($firstSuggestion['dosage'] ?? 1));
                    // Extract number from frequency (e.g., "3 fois par jour" -> "3")
                    $frequency = $firstSuggestion['frequency'] ?? '1';
                    if (preg_match('/\d+/', $frequency, $matches)) {
                        $prescription->setFrequence((int)$matches[0]);
                    } else {
                        $prescription->setFrequence(1);
                    }
                    $prescription->setDuree((int)($firstSuggestion['duration'] ?? 7));
                    $prescription->setInstructions($firstSuggestion['precautions'] ?? '');
                }
            }
            
            $entityManager->persist($prescription);
            $entityManager->flush();

            return $this->redirectToRoute('app_prescription_index');
        }

        return $this->render('prescription/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // CREATE FROM CONSULTATION
    #[Route('/new/{id}', name: 'app_prescription_new', methods: ['GET','POST'])]
    public function new(
        Consultation $consultation,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {

        // security doctor owner
        if ($consultation->getRendezVous()->getSpecialiste() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $prescription = new Prescription();
        $prescription->setConsultation($consultation);

        // Check if AI generation is requested
        $aiGenerate = $request->query->get('ai_generate', false);
        $aiData = null;

        if ($aiGenerate) {
            $symptoms = $request->query->get('symptoms', '');
            $diagnostic = $request->query->get('diagnostic', '');
            
            // Generate AI prescription data
            $aiData = $this->generateAIPrescription($symptoms, $diagnostic);
            
            if ($aiData && isset($aiData['suggestions']) && !empty($aiData['suggestions'])) {
                // Auto-fill with first AI suggestion
                $firstSuggestion = $aiData['suggestions'][0];
                $prescription->setNomMedicament($firstSuggestion['name'] ?? '');
                $prescription->setDose((int)($firstSuggestion['dosage'] ?? 1));
                
                // Extract number from frequency (e.g., "3 fois par jour" -> "3")
                $frequency = $firstSuggestion['frequency'] ?? '1';
                if (preg_match('/\d+/', $frequency, $matches)) {
                    $prescription->setFrequence((int)$matches[0]);
                } else {
                    $prescription->setFrequence(1);
                }
                
                $prescription->setDuree((int)($firstSuggestion['duration'] ?? 7)); // Ensure int and default to 7
                $prescription->setInstructions($firstSuggestion['precautions'] ?? '');
            }
        }

        $form = $this->createForm(PrescriptionType::class, $prescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($prescription);
            $entityManager->flush();

            return $this->redirectToRoute('app_consultation_show', [
                'id' => $consultation->getId()
            ]);
        }

        return $this->render('prescription/new.html.twig', [
            'prescription' => $prescription,
            'form' => $form->createView(),
            'ai_data' => $aiData,
            'consultation' => $consultation
        ]);
    }

    // SHOW
    #[Route('/{id}', name: 'app_prescription_show', methods: ['GET'])]
    public function show(Prescription $prescription): Response
    {
        return $this->render('prescription/show.html.twig', [
            'prescription' => $prescription,
        ]);
    }

    // EDIT
    #[Route('/{id}/edit', name: 'app_prescription_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Prescription $prescription,
        EntityManagerInterface $entityManager
    ): Response {

        $form = $this->createForm(PrescriptionType::class, $prescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Prescription mise à jour avec succès!');
            return $this->redirectToRoute('app_prescription_show', [
                'id' => $prescription->getId()
            ]);
        }

        // Debug: Show form errors if any
        if ($form->isSubmitted() && !$form->isValid()) {
            $errors = $form->getErrors(true);
            foreach ($errors as $error) {
                error_log('PRESCRIPTION ERROR: ' . $error->getMessage());
                $this->addFlash('error', $error->getMessage());
            }
        }

        return $this->render('prescription/edit.html.twig', [
            'prescription' => $prescription,
            'form' => $form->createView()
        ]);
    }

    // DELETE
    #[Route('/{id}', name: 'app_prescription_delete', methods: ['POST'])]
    public function delete(
        Request $request,
        Prescription $prescription,
        EntityManagerInterface $entityManager
    ): Response {

        if ($this->isCsrfTokenValid('delete'.$prescription->getId(), $request->request->get('_token'))) {
            $entityManager->remove($prescription);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_prescription_index');
    }

    private function generateAIPrescription(string $symptoms, string $diagnostic): ?array
    {
        try {
            $projectDir = $this->parameterBag->get('kernel.project_dir');
            $process = new Process(['python', $projectDir . '/ai_services/prescription_suggester.py', 
                                   $symptoms, $diagnostic]);
            $process->setWorkingDirectory($projectDir);
            $process->run();

            if ($process->isSuccessful()) {
                $output = $process->getOutput();
                // Convert to UTF-8 if needed
                if (!mb_check_encoding($output, 'UTF-8')) {
                    $output = mb_convert_encoding($output, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
                }
                
                $result = json_decode($output, true);
                
                if (json_last_error() === JSON_ERROR_NONE) {
                    return $result;
                }
            }
        } catch (\Exception $e) {
            // Log error but don't break the prescription creation
        }
        
        return null;
    }
}