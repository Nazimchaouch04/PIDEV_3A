<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\QuizMental;
use App\Entity\Utilisateur;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/bo/mental')]
class MentalAdminController extends AbstractController
{
    #[Route('', name: 'app_mental_admin_dashboard')]
    public function dashboard(
        QuestionRepository     $questionRepository,
        EntityManagerInterface $em
    ): Response {
        if (!$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_SPECIALISTE')) {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs et spécialistes.');
        }

        $totalQuestions = $questionRepository->count([]);
        $totalQuizzes   = $em->getRepository(QuizMental::class)->count([]);
        $totalUsers     = $em->getRepository(Utilisateur::class)->count([]);
        $totalMedailles = $em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->select('COUNT(q.id)')
            ->where('q.medailleQuiz IS NOT NULL')
            ->getQuery()
            ->getSingleScalarResult();

        $recentQuestions = $questionRepository->findBy([], ['id' => 'DESC'], 5);

        return $this->render('bo/mental/dashboard.html.twig', [
            'totalQuestions'  => $totalQuestions,
            'totalQuizzes'    => $totalQuizzes,
            'totalUsers'      => $totalUsers,
            'totalMedailles'  => $totalMedailles,
            'recentQuestions' => $recentQuestions,
        ]);
    }

    #[Route('/questions', name: 'app_mental_admin_questions')]
    public function listQuestions(QuestionRepository $questionRepository): Response
    {
        return $this->render('bo/mental/questions/list.html.twig', [
            'questions' => $questionRepository->findAll(),
        ]);
    }

    #[Route('/quiz', name: 'app_mental_admin_quiz_list')]
    public function listQuizzes(EntityManagerInterface $em): Response
    {
        $quizzes = $em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->leftJoin('q.utilisateur', 'u')
            ->addSelect('u')
            ->orderBy('q.dateQuiz', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('bo/mental/quiz/list.html.twig', [
            'quizzes' => $quizzes,
        ]);
    }

    #[Route('/quiz/new', name: 'app_mental_admin_quiz_new')]
    public function newQuiz(Request $request, EntityManagerInterface $em): Response
    {
        $quiz = new QuizMental();

        if ($request->isMethod('POST')) {
            $quiz->setTitre($request->request->get('titre'));
            $quiz->setNiveauStressCible((int) $request->request->get('niveau_stress'));
            $quiz->setScoreResultat((int) $request->request->get('score', 0));
            $quiz->setMedailleQuiz($request->request->get('medaille'));
            $quiz->setDateQuiz(new \DateTime($request->request->get('date_quiz') ?: 'now'));
            $quiz->setStatut('disponible');

            $userId      = $request->request->get('utilisateur_id');
            $utilisateur = $em->getRepository(Utilisateur::class)->find($userId);
            if ($utilisateur) {
                $quiz->setUtilisateur($utilisateur);
            } else {
                // FIX :95 — cast UserInterface → Utilisateur
                /** @var Utilisateur $currentUser */
                $currentUser = $this->getUser();
                $quiz->setUtilisateur($currentUser);
            }

            $em->persist($quiz);
            $em->flush();

            $this->addFlash('success', 'Quiz créé avec succès et disponible pour l\'utilisateur !');
            return $this->redirectToRoute('app_mental_admin_quiz_list');
        }

        $utilisateurs = $em->getRepository(Utilisateur::class)->findAll();

        return $this->render('bo/mental/quiz/form.html.twig', [
            'quiz'         => $quiz,
            'utilisateurs' => $utilisateurs,
            'isEdit'       => false,
        ]);
    }

    #[Route('/quiz/{id}/edit', name: 'app_mental_admin_quiz_edit')]
    public function editQuiz(QuizMental $quiz, Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $quiz->setTitre($request->request->get('titre'));
            $quiz->setNiveauStressCible((int) $request->request->get('niveau_stress'));
            $quiz->setScoreResultat((int) $request->request->get('score'));
            $quiz->setMedailleQuiz($request->request->get('medaille') ?: null);
            $quiz->setDateQuiz(new \DateTime($request->request->get('date_quiz')));

            $userId      = $request->request->get('utilisateur_id');
            $utilisateur = $em->getRepository(Utilisateur::class)->find($userId);
            if ($utilisateur) {
                // FIX :181 — $utilisateur est déjà Utilisateur (trouvé par le repo), pas besoin de cast
                $quiz->setUtilisateur($utilisateur);
            }

            $em->flush();

            $this->addFlash('success', 'Quiz modifié avec succès !');
            return $this->redirectToRoute('app_mental_admin_quiz_list');
        }

        $utilisateurs = $em->getRepository(Utilisateur::class)->findAll();

        return $this->render('bo/mental/quiz/form.html.twig', [
            'quiz'         => $quiz,
            'utilisateurs' => $utilisateurs,
            'isEdit'       => true,
        ]);
    }

    #[Route('/quiz/{id}/delete', name: 'app_mental_admin_quiz_delete', methods: ['POST'])]
    public function deleteQuiz(QuizMental $quiz, EntityManagerInterface $em): Response
    {
        $em->remove($quiz);
        $em->flush();

        $this->addFlash('success', 'Quiz supprimé avec succès !');
        return $this->redirectToRoute('app_mental_admin_quiz_list');
    }

    #[Route('/questions/new', name: 'app_mental_admin_question_new')]
    public function newQuestion(Request $request, EntityManagerInterface $em): Response
    {
        $question = new Question();

        if ($request->isMethod('POST')) {
            $question->setEnonce($request->request->get('enonce'));
            $question->setReponseCorrecte($request->request->get('reponse_correcte'));

            $optionsFausses = [
                $request->request->get('option_1'),
                $request->request->get('option_2'),
                $request->request->get('option_3'),
            ];
            $question->setOptionsFaussesFromArray(array_filter($optionsFausses));
            $question->setPointsValeur((int) $request->request->get('points_valeur'));

            $quiz = $em->getRepository(QuizMental::class)->findOneBy(['titre' => 'Question Bank']);
            if (!$quiz) {
                $quiz = new QuizMental();
                $quiz->setTitre('Question Bank');
                $quiz->setNiveauStressCible(5);

                // FIX — cast UserInterface → Utilisateur pour setUtilisateur
                /** @var Utilisateur $currentUser */
                $currentUser = $this->getUser();
                $quiz->setUtilisateur($currentUser);
            }

            $question->setQuiz($quiz);
            $em->persist($quiz);
            $em->persist($question);
            $em->flush();

            $this->addFlash('success', 'Question créée avec succès !');
            return $this->redirectToRoute('app_mental_admin_questions');
        }

        return $this->render('bo/mental/questions/form.html.twig', [
            'question' => $question,
            'isEdit'   => false,
        ]);
    }

    #[Route('/questions/{id}/edit', name: 'app_mental_admin_question_edit')]
    public function editQuestion(Question $question, Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $question->setEnonce($request->request->get('enonce'));
            $question->setReponseCorrecte($request->request->get('reponse_correcte'));

            $optionsFausses = [
                $request->request->get('option_1'),
                $request->request->get('option_2'),
                $request->request->get('option_3'),
            ];
            $question->setOptionsFaussesFromArray(array_filter($optionsFausses));
            $question->setPointsValeur((int) $request->request->get('points_valeur'));

            $em->flush();

            $this->addFlash('success', 'Question modifiée avec succès !');
            return $this->redirectToRoute('app_mental_admin_questions');
        }

        return $this->render('bo/mental/questions/form.html.twig', [
            'question' => $question,
            'isEdit'   => true,
        ]);
    }

    #[Route('/questions/{id}/delete', name: 'app_mental_admin_question_delete', methods: ['POST'])]
    public function deleteQuestion(Question $question, EntityManagerInterface $em): Response
    {
        $em->remove($question);
        $em->flush();

        $this->addFlash('success', 'Question supprimée avec succès !');
        return $this->redirectToRoute('app_mental_admin_questions');
    }

    #[Route('/quiz/export-pdf', name: 'app_mental_admin_quiz_export_pdf')]
    public function exportQuizPdf(EntityManagerInterface $em): Response
    {
        $quizzes = $em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->leftJoin('q.utilisateur', 'u')
            ->leftJoin('q.questions', 'qs')
            ->addSelect('q', 'u', 'COUNT(qs.id) as nbQuestions')
            ->groupBy('q.id', 'u.id')
            ->orderBy('q.dateQuiz', 'DESC')
            ->getQuery()
            ->getResult();

        $formattedQuizzes = [];
        foreach ($quizzes as $quizData) {
            $quiz        = $quizData[0] ?? null;
            $utilisateur = $quizData[1] ?? null;

            if ($quiz && $utilisateur) {
                $formattedQuizzes[] = (object) [
                    'id'                => $quiz->getId(),
                    'titre'             => $quiz->getTitre(),
                    'dateQuiz'          => $quiz->getDateQuiz(),
                    'niveauStressCible' => $quiz->getNiveauStressCible(),
                    'scoreResultat'     => $quiz->getScoreResultat(),
                    'medailleQuiz'      => $quiz->getMedailleQuiz(),
                    'statut'            => $quiz->getStatut(),
                    'utilisateur'       => $utilisateur,
                    'nbQuestions'       => $quizData['nbQuestions'] ?? 0,
                ];
            }
        }

        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isRemoteEnabled', true);
        $options->set('isJavascriptEnabled', true);

        $html = $this->renderView('bo/mental/quiz/export_pdf.html.twig', [
            'quizzes'    => $formattedQuizzes,
            'dateExport' => new \DateTime(),
        ]);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->render();

        $filename = 'quiz_mental_export_' . date('Y-m-d_H-i-s') . '.pdf';

        $response = new Response($dompdf->output());
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');
        $response->headers->set('Cache-Control', 'private, max-age=0, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
    }
}
