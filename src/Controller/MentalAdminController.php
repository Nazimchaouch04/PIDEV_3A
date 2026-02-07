<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\QuizMental;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/bo/mental')]
#[IsGranted('ROLE_ADMIN')]
class MentalAdminController extends AbstractController
{
    #[Route('', name: 'app_mental_admin_dashboard')]
    public function dashboard(
        QuestionRepository $questionRepository,
        EntityManagerInterface $em
    ): Response {
        $totalQuestions = $questionRepository->count([]);
        $totalQuizzes = $em->getRepository(QuizMental::class)->count([]);
        $totalUsers = $em->getRepository(\App\Entity\Utilisateur::class)->count([]);
        $totalMedailles = $em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->select('COUNT(q.id)')
            ->where('q.medailleQuiz IS NOT NULL')
            ->getQuery()
            ->getSingleScalarResult();

        $recentQuestions = $questionRepository->findBy([], ['id' => 'DESC'], 5);

        return $this->render('bo/mental/dashboard.html.twig', [
            'totalQuestions' => $totalQuestions,
            'totalQuizzes' => $totalQuizzes,
            'totalUsers' => $totalUsers,
            'totalMedailles' => $totalMedailles,
            'recentQuestions' => $recentQuestions,
        ]);
    }

    #[Route('/questions', name: 'app_mental_admin_questions')]
    public function listQuestions(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findAll();

        return $this->render('bo/mental/questions/list.html.twig', [
            'questions' => $questions,
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
            $quiz->setStatut('disponible'); // Quiz disponible par défaut
            
            // Utilisateur
            $userId = $request->request->get('utilisateur_id');
            $utilisateur = $em->getRepository(\App\Entity\Utilisateur::class)->find($userId);
            if ($utilisateur) {
                $quiz->setUtilisateur($utilisateur);
            } else {
                $quiz->setUtilisateur($this->getUser());
            }
            
            $em->persist($quiz);
            $em->flush();

            $this->addFlash('success', 'Quiz créé avec succès et disponible pour l\'utilisateur !');
            return $this->redirectToRoute('app_mental_admin_quiz_list');
        }

        $utilisateurs = $em->getRepository(\App\Entity\Utilisateur::class)->findAll();

        return $this->render('bo/mental/quiz/form.html.twig', [
            'quiz' => $quiz,
            'utilisateurs' => $utilisateurs,
            'isEdit' => false,
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
            
            // Utilisateur
            $userId = $request->request->get('utilisateur_id');
            $utilisateur = $em->getRepository(\App\Entity\Utilisateur::class)->find($userId);
            if ($utilisateur) {
                $quiz->setUtilisateur($utilisateur);
            }

            $em->flush();

            $this->addFlash('success', 'Quiz modifié avec succès !');
            return $this->redirectToRoute('app_mental_admin_quiz_list');
        }

        $utilisateurs = $em->getRepository(\App\Entity\Utilisateur::class)->findAll();

        return $this->render('bo/mental/quiz/form.html.twig', [
            'quiz' => $quiz,
            'utilisateurs' => $utilisateurs,
            'isEdit' => true,
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
            
            // Options fausses séparées par |
            $optionsFausses = [
                $request->request->get('option_1'),
                $request->request->get('option_2'),
                $request->request->get('option_3'),
            ];
            $question->setOptionsFaussesFromArray(array_filter($optionsFausses));
            
            $question->setPointsValeur((int) $request->request->get('points_valeur'));

            // Créer un quiz par défaut ou lier à un quiz existant
            // Pour l'instant, on crée un quiz "Question Bank"
            $quiz = $em->getRepository(QuizMental::class)->findOneBy(['titre' => 'Question Bank']) 
                    ?? (new QuizMental())
                        ->setTitre('Question Bank')
                        ->setNiveauStressCible(5)
                        ->setUtilisateur($this->getUser());
            
            $question->setQuiz($quiz);
            $em->persist($quiz);
            $em->persist($question);
            $em->flush();

            $this->addFlash('success', 'Question créée avec succès !');
            return $this->redirectToRoute('app_mental_admin_questions');
        }

        return $this->render('bo/mental/questions/form.html.twig', [
            'question' => $question,
            'isEdit' => false,
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
            'isEdit' => true,
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
}
