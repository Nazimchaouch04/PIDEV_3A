<?php

namespace App\Controller;

use App\Repository\LogEventRepository;
use App\Repository\UtilisateurRepository;
use App\Service\ActivityLogger;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin-logs')]
#[IsGranted('ROLE_ADMIN')]
class AdminLogController extends AbstractController
{
    #[Route('', name: 'app_admin_logs_index', methods: ['GET'])]
    public function index(Request $request, LogEventRepository $logEventRepository): Response
    {
        // Get filter parameters from request
        $role = $request->query->get('role');
        $actionType = $request->query->get('action_type');
        $dateFrom = $request->query->get('date_from');
        $dateTo = $request->query->get('date_to');

        // Convert date strings to DateTime objects
        $dateFromObj = $dateFrom ? new \DateTime($dateFrom . ' 00:00:00') : null;
        $dateToObj = $dateTo ? new \DateTime($dateTo . ' 23:59:59') : null;

        // Fetch logs with filters if any are set, otherwise fetch all
        if ($role || $actionType || $dateFrom || $dateTo) {
            $logs = $logEventRepository->findWithFilters($role, $actionType, $dateFromObj, $dateToObj);
        } else {
            $logs = $logEventRepository->findBy([], ['createdAt' => 'DESC']);
        }

        return $this->render('admin_logs/index.html.twig', [
            'logs' => $logs,
            'filters' => [
                'role' => $role,
                'action_type' => $actionType,
                'date_from' => $dateFrom,
                'date_to' => $dateTo,
            ],
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

    #[Route('/clear', name: 'app_admin_logs_clear', methods: ['POST'])]
    public function clearAllLogs(EntityManagerInterface $entityManager, ActivityLogger $activityLogger): Response
    {
        // Get repository and delete all logs
        $logRepository = $entityManager->getRepository(\App\Entity\LogEvent::class);
        $logs = $logRepository->findAll();
        
        foreach ($logs as $log) {
            $entityManager->remove($log);
        }
        
        $entityManager->flush();
        
        // Log this action (will be the only log remaining)
        $activityLogger->log('Historique des logs effacé par admin', $this->getUser());
        
        $this->addFlash('success', 'Tous les logs ont été effacés avec succès.');
        
        return $this->redirectToRoute('app_admin_logs_index');
    }

    #[Route('/pdf', name: 'app_admin_logs_pdf', methods: ['GET'])]
    public function generatePdf(Request $request, LogEventRepository $logEventRepository): Response
    {
        // Get filter parameters from request (same as index)
        $role = $request->query->get('role');
        $actionType = $request->query->get('action_type');
        $dateFrom = $request->query->get('date_from');
        $dateTo = $request->query->get('date_to');

        // Convert date strings to DateTime objects
        $dateFromObj = $dateFrom ? new \DateTime($dateFrom . ' 00:00:00') : null;
        $dateToObj = $dateTo ? new \DateTime($dateTo . ' 23:59:59') : null;

        // Fetch logs with filters if any are set
        if ($role || $actionType || $dateFrom || $dateTo) {
            $logs = $logEventRepository->findWithFilters($role, $actionType, $dateFromObj, $dateToObj);
        } else {
            $logs = $logEventRepository->findBy([], ['createdAt' => 'DESC']);
        }

        // Configure Dompdf
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->setIsRemoteEnabled(true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve HTML
        $html = $this->renderView('admin_logs/pdf.html.twig', [
            'logs' => $logs,
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Generate filename with filters info
        $filename = 'historique_biosync_log';
        if ($actionType) {
            $filename .= '_' . $actionType;
        }
        if ($dateFrom || $dateTo) {
            $filename .= '_' . ($dateFrom ?: 'debut') . '_a_' . ($dateTo ?: 'fin');
        }
        $filename .= '.pdf';

        // Output PDF
        $dompdf->stream($filename, ["Attachment" => true]);

        return new Response('', 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    #[Route('/statistics', name: 'app_admin_logs_statistics', methods: ['GET'])]
    public function statistics(LogEventRepository $logEventRepository, UtilisateurRepository $userRepository): Response
    {
        $allLogs = $logEventRepository->findAll();
        
        // Calculate activity by day (last 30 days)
        $activityByDay = $this->calculateActivityByDay($allLogs);
        
        // Calculate activity by role
        $activityByRole = $this->calculateActivityByRole($allLogs);
        
        // Calculate activity by action type
        $activityByAction = $this->calculateActivityByAction($allLogs);
        
        // Calculate top active users
        $topUsers = $this->calculateTopActiveUsers($allLogs);
        
        // Calculate hourly distribution
        $hourlyDistribution = $this->calculateHourlyDistribution($allLogs);
        
        // General stats
        $totalLogs = count($allLogs);
        $logsToday = $this->countLogsToday($allLogs);
        $logsThisWeek = $this->countLogsThisWeek($allLogs);
        $logsThisMonth = $this->countLogsThisMonth($allLogs);

        return $this->render('admin_logs/statistics.html.twig', [
            'activityByDay' => $activityByDay,
            'activityByRole' => $activityByRole,
            'activityByAction' => $activityByAction,
            'topUsers' => $topUsers,
            'hourlyDistribution' => $hourlyDistribution,
            'totalLogs' => $totalLogs,
            'logsToday' => $logsToday,
            'logsThisWeek' => $logsThisWeek,
            'logsThisMonth' => $logsThisMonth,
        ]);
    }

    private function calculateActivityByDay(array $logs): array
    {
        $data = [];
        $endDate = new \DateTime();
        $startDate = (new \DateTime())->modify('-29 days');
        
        // Initialize all days with 0
        for ($i = 0; $i < 30; $i++) {
            $date = (clone $startDate)->modify("+$i days");
            $data[$date->format('Y-m-d')] = 0;
        }
        
        // Count logs per day
        foreach ($logs as $log) {
            $date = $log->getCreatedAt()->format('Y-m-d');
            if (isset($data[$date])) {
                $data[$date]++;
            }
        }
        
        // Format for Chart.js
        $labels = [];
        $values = [];
        foreach ($data as $date => $count) {
            $labels[] = (new \DateTime($date))->format('d/m');
            $values[] = $count;
        }
        
        return ['labels' => $labels, 'data' => $values];
    }

    private function calculateActivityByRole(array $logs): array
    {
        // Initialize all roles with 0
        $counts = [
            'ROLE_ADMIN' => 0,
            'ROLE_COACH' => 0,
            'ROLE_SPECIALISTE' => 0,
            'ROLE_USER' => 0,
            'Système' => 0,
        ];
        
        foreach ($logs as $log) {
            if ($log->getUtilisateur()) {
                $roles = $log->getUtilisateur()->getRoles();
                // Check roles in priority order
                if (in_array('ROLE_ADMIN', $roles)) {
                    $role = 'ROLE_ADMIN';
                } elseif (in_array('ROLE_COACH', $roles)) {
                    $role = 'ROLE_COACH';
                } elseif (in_array('ROLE_SPECIALISTE', $roles)) {
                    $role = 'ROLE_SPECIALISTE';
                } else {
                    $role = 'ROLE_USER';
                }
            } else {
                $role = 'Système';
            }
            $counts[$role] = ($counts[$role] ?? 0) + 1;
        }
        
        // Map role names
        $roleLabels = [
            'ROLE_ADMIN' => 'Administrateur',
            'ROLE_COACH' => 'Coach',
            'ROLE_SPECIALISTE' => 'Spécialiste',
            'ROLE_USER' => 'Utilisateur',
            'Système' => 'Système'
        ];
        
        // Filter out roles with 0 count (optional - remove this if you want to show all roles)
        $counts = array_filter($counts, fn($count) => $count > 0);
        
        $labels = [];
        $data = [];
        $colors = [
            'ROLE_ADMIN' => '#6366F1',      // Indigo
            'ROLE_COACH' => '#10B981',      // Emerald
            'ROLE_SPECIALISTE' => '#F59E0B', // Amber
            'ROLE_USER' => '#3B82F6',       // Blue
            'Système' => '#6B7280'          // Gray
        ];
        
        $colorValues = [];
        foreach ($counts as $role => $count) {
            $labels[] = $roleLabels[$role] ?? $role;
            $data[] = $count;
            $colorValues[] = $colors[$role] ?? '#718096';
        }
        
        return [
            'labels' => $labels, 
            'data' => $data, 
            'colors' => $colorValues
        ];
    }

    private function calculateActivityByAction(array $logs): array
    {
        $counts = [];
        
        foreach ($logs as $log) {
            $action = $log->getAction();
            $counts[$action] = ($counts[$action] ?? 0) + 1;
        }
        
        arsort($counts); // Sort by count descending
        $counts = array_slice($counts, 0, 5, true); // Top 5
        
        return [
            'labels' => array_keys($counts),
            'data' => array_values($counts)
        ];
    }

    private function calculateTopActiveUsers(array $logs): array
    {
        $counts = [];
        
        foreach ($logs as $log) {
            if ($log->getUtilisateur()) {
                $name = $log->getUtilisateur()->getNomComplet();
                $counts[$name] = ($counts[$name] ?? 0) + 1;
            }
        }
        
        arsort($counts);
        return array_slice($counts, 0, 5, true);
    }

    private function calculateHourlyDistribution(array $logs): array
    {
        $hours = array_fill(0, 24, 0);
        
        foreach ($logs as $log) {
            $hour = (int)$log->getCreatedAt()->format('H');
            $hours[$hour]++;
        }
        
        return [
            'labels' => array_map(fn($h) => sprintf('%02d:00', $h), range(0, 23)),
            'data' => $hours
        ];
    }

    private function countLogsToday(array $logs): int
    {
        $today = (new \DateTime())->format('Y-m-d');
        $count = 0;
        foreach ($logs as $log) {
            if ($log->getCreatedAt()->format('Y-m-d') === $today) {
                $count++;
            }
        }
        return $count;
    }

    private function countLogsThisWeek(array $logs): int
    {
        $weekStart = (new \DateTime())->modify('monday this week');
        $count = 0;
        foreach ($logs as $log) {
            if ($log->getCreatedAt() >= $weekStart) {
                $count++;
            }
        }
        return $count;
    }

    private function countLogsThisMonth(array $logs): int
    {
        $monthStart = (new \DateTime())->modify('first day of this month');
        $count = 0;
        foreach ($logs as $log) {
            if ($log->getCreatedAt() >= $monthStart) {
                $count++;
            }
        }
        return $count;
    }
}
