<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/users' => [[['_route' => 'admin_users_index', '_controller' => 'App\\Controller\\Admin\\NutritionAdminController::users'], null, ['GET' => 0], null, false, false, null]],
        '/admin/users/pdf' => [[['_route' => 'admin_users_pdf', '_controller' => 'App\\Controller\\Admin\\NutritionAdminController::exportUsersPdf'], null, ['GET' => 0], null, false, false, null]],
        '/aliment' => [[['_route' => 'app_aliment_index', '_controller' => 'App\\Controller\\AlimentController::index'], null, ['GET' => 0], null, false, false, null]],
        '/aliment/new' => [[['_route' => 'app_aliment_new', '_controller' => 'App\\Controller\\AlimentController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/certification' => [[['_route' => 'app_certification', '_controller' => 'App\\Controller\\CertificationController::index'], null, null, null, false, false, null]],
        '/community' => [[['_route' => 'app_community', '_controller' => 'App\\Controller\\CommunityController::index'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_landing', '_controller' => 'App\\Controller\\LandingController::index'], null, null, null, false, false, null]],
        '/medical' => [[['_route' => 'app_medical', '_controller' => 'App\\Controller\\MedicalController::index'], null, null, null, false, false, null]],
        '/medical/new' => [[['_route' => 'app_medical_new', '_controller' => 'App\\Controller\\MedicalController::new'], null, null, null, false, false, null]],
        '/bo/mental' => [[['_route' => 'app_mental_admin_dashboard', '_controller' => 'App\\Controller\\MentalAdminController::dashboard'], null, null, null, false, false, null]],
        '/bo/mental/questions' => [[['_route' => 'app_mental_admin_questions', '_controller' => 'App\\Controller\\MentalAdminController::listQuestions'], null, null, null, false, false, null]],
        '/bo/mental/quiz' => [[['_route' => 'app_mental_admin_quiz_list', '_controller' => 'App\\Controller\\MentalAdminController::listQuizzes'], null, null, null, false, false, null]],
        '/bo/mental/quiz/new' => [[['_route' => 'app_mental_admin_quiz_new', '_controller' => 'App\\Controller\\MentalAdminController::newQuiz'], null, null, null, false, false, null]],
        '/bo/mental/questions/new' => [[['_route' => 'app_mental_admin_question_new', '_controller' => 'App\\Controller\\MentalAdminController::newQuestion'], null, null, null, false, false, null]],
        '/mental' => [[['_route' => 'app_mental', '_controller' => 'App\\Controller\\MentalController::index'], null, null, null, false, false, null]],
        '/mental/new' => [[['_route' => 'app_mental_new', '_controller' => 'App\\Controller\\MentalController::new'], null, null, null, false, false, null]],
        '/mental/quiz/question' => [[['_route' => 'app_mental_quiz_question', '_controller' => 'App\\Controller\\MentalController::quizQuestion'], null, null, null, false, false, null]],
        '/mental/quiz/result' => [[['_route' => 'app_mental_quiz_result', '_controller' => 'App\\Controller\\MentalController::quizResult'], null, null, null, false, false, null]],
        '/nutrition' => [[['_route' => 'app_nutrition', '_controller' => 'App\\Controller\\NutritionController::index'], null, null, null, false, false, null]],
        '/nutrition/new' => [[['_route' => 'app_nutrition_new', '_controller' => 'App\\Controller\\NutritionController::new'], null, null, null, false, false, null]],
        '/profile' => [[['_route' => 'app_profile', '_controller' => 'App\\Controller\\ProfileController::index'], null, null, null, false, false, null]],
        '/profile/edit' => [[['_route' => 'app_profile_edit', '_controller' => 'App\\Controller\\ProfileController::edit'], null, null, null, false, false, null]],
        '/profile/health' => [[['_route' => 'app_profile_health', '_controller' => 'App\\Controller\\ProfileController::health'], null, null, null, false, false, null]],
        '/repas' => [[['_route' => 'app_repas_index', '_controller' => 'App\\Controller\\RepasController::index'], null, ['GET' => 0], null, false, false, null]],
        '/repas/nutrition' => [[['_route' => 'app_nutrition_redirect', '_controller' => 'App\\Controller\\RepasController::nutritionRedirect'], null, null, null, false, false, null]],
        '/repas/nutrition/new' => [[['_route' => 'app_nutrition_new_redirect', '_controller' => 'App\\Controller\\RepasController::nutritionNewRedirect'], null, null, null, false, false, null]],
        '/repas/new' => [[['_route' => 'app_repas_new', '_controller' => 'App\\Controller\\RepasController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\SecurityController::register'], null, null, null, false, false, null]],
        '/sports' => [[['_route' => 'app_sports', '_controller' => 'App\\Controller\\SportsController::index'], null, null, null, false, false, null]],
        '/sports/new' => [[['_route' => 'app_sports_new', '_controller' => 'App\\Controller\\SportsController::new'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|users/([^/]++)/repas(*:235)'
                        .'|repas/([^/]++)/aliments(*:266)'
                    .')'
                    .'|liment/(?'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|show(*:304)'
                                .'|edit(*:316)'
                            .')'
                            .'|(*:325)'
                        .')'
                        .'|pdf(*:337)'
                    .')'
                .')'
                .'|/community/groupe/([^/]++)(?'
                    .'|(*:376)'
                    .'|/(?'
                        .'|join(*:392)'
                        .'|leave(*:405)'
                    .')'
                .')'
                .'|/me(?'
                    .'|dical/([^/]++)(?'
                        .'|(*:438)'
                        .'|/(?'
                            .'|edit(*:454)'
                            .'|delete(*:468)'
                            .'|honor(*:481)'
                        .')'
                    .')'
                    .'|ntal/(?'
                        .'|([^/]++)(?'
                            .'|(*:510)'
                            .'|/delete(*:525)'
                        .')'
                        .'|quiz/start/([^/]++)(*:553)'
                    .')'
                .')'
                .'|/bo/mental/qu(?'
                    .'|iz/([^/]++)/(?'
                        .'|edit(*:598)'
                        .'|delete(*:612)'
                    .')'
                    .'|estions/([^/]++)/(?'
                        .'|edit(*:645)'
                        .'|delete(*:659)'
                    .')'
                .')'
                .'|/nutrition/([^/]++)(?'
                    .'|(*:691)'
                    .'|/(?'
                        .'|edit(*:707)'
                        .'|delete(*:721)'
                    .')'
                .')'
                .'|/repas/(?'
                    .'|([^/]++)(?'
                        .'|/(?'
                            .'|show(*:760)'
                            .'|edit(*:772)'
                        .')'
                        .'|(*:781)'
                    .')'
                    .'|pdf(*:793)'
                .')'
                .'|/sports/([^/]++)(?'
                    .'|(*:821)'
                    .'|/(?'
                        .'|edit(*:837)'
                        .'|delete(*:851)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        235 => [[['_route' => 'admin_user_meals', '_controller' => 'App\\Controller\\Admin\\NutritionAdminController::userMeals'], ['id'], ['GET' => 0], null, false, false, null]],
        266 => [[['_route' => 'admin_meal_foods', '_controller' => 'App\\Controller\\Admin\\NutritionAdminController::mealFoods'], ['id'], ['GET' => 0], null, false, false, null]],
        304 => [[['_route' => 'app_aliment_show', '_controller' => 'App\\Controller\\AlimentController::show'], ['id'], ['GET' => 0], null, false, false, null]],
        316 => [[['_route' => 'app_aliment_edit', '_controller' => 'App\\Controller\\AlimentController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        325 => [[['_route' => 'app_aliment_delete', '_controller' => 'App\\Controller\\AlimentController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        337 => [[['_route' => 'app_aliment_pdf', '_controller' => 'App\\Controller\\AlimentController::exportPdf'], [], ['GET' => 0], null, false, false, null]],
        376 => [[['_route' => 'app_community_groupe', '_controller' => 'App\\Controller\\CommunityController::showGroupe'], ['id'], null, null, false, true, null]],
        392 => [[['_route' => 'app_community_join', '_controller' => 'App\\Controller\\CommunityController::joinGroupe'], ['id'], ['POST' => 0], null, false, false, null]],
        405 => [[['_route' => 'app_community_leave', '_controller' => 'App\\Controller\\CommunityController::leaveGroupe'], ['id'], ['POST' => 0], null, false, false, null]],
        438 => [[['_route' => 'app_medical_show', '_controller' => 'App\\Controller\\MedicalController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        454 => [[['_route' => 'app_medical_edit', '_controller' => 'App\\Controller\\MedicalController::edit'], ['id'], null, null, false, false, null]],
        468 => [[['_route' => 'app_medical_delete', '_controller' => 'App\\Controller\\MedicalController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        481 => [[['_route' => 'app_medical_honor', '_controller' => 'App\\Controller\\MedicalController::markAsHonored'], ['id'], ['POST' => 0], null, false, false, null]],
        510 => [[['_route' => 'app_mental_show', '_controller' => 'App\\Controller\\MentalController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        525 => [[['_route' => 'app_mental_delete', '_controller' => 'App\\Controller\\MentalController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        553 => [[['_route' => 'app_mental_quiz_start', '_controller' => 'App\\Controller\\MentalController::quizStart'], ['quizId'], null, null, false, true, null]],
        598 => [[['_route' => 'app_mental_admin_quiz_edit', '_controller' => 'App\\Controller\\MentalAdminController::editQuiz'], ['id'], null, null, false, false, null]],
        612 => [[['_route' => 'app_mental_admin_quiz_delete', '_controller' => 'App\\Controller\\MentalAdminController::deleteQuiz'], ['id'], ['POST' => 0], null, false, false, null]],
        645 => [[['_route' => 'app_mental_admin_question_edit', '_controller' => 'App\\Controller\\MentalAdminController::editQuestion'], ['id'], null, null, false, false, null]],
        659 => [[['_route' => 'app_mental_admin_question_delete', '_controller' => 'App\\Controller\\MentalAdminController::deleteQuestion'], ['id'], ['POST' => 0], null, false, false, null]],
        691 => [[['_route' => 'app_nutrition_show', '_controller' => 'App\\Controller\\NutritionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        707 => [[['_route' => 'app_nutrition_edit', '_controller' => 'App\\Controller\\NutritionController::edit'], ['id'], null, null, false, false, null]],
        721 => [[['_route' => 'app_nutrition_delete', '_controller' => 'App\\Controller\\NutritionController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        760 => [[['_route' => 'app_repas_show', '_controller' => 'App\\Controller\\RepasController::show'], ['id'], ['GET' => 0], null, false, false, null]],
        772 => [[['_route' => 'app_repas_edit', '_controller' => 'App\\Controller\\RepasController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        781 => [[['_route' => 'app_repas_delete', '_controller' => 'App\\Controller\\RepasController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        793 => [[['_route' => 'app_repas_pdf', '_controller' => 'App\\Controller\\RepasController::exportPdf'], [], ['GET' => 0], null, false, false, null]],
        821 => [[['_route' => 'app_sports_show', '_controller' => 'App\\Controller\\SportsController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        837 => [[['_route' => 'app_sports_edit', '_controller' => 'App\\Controller\\SportsController::edit'], ['id'], null, null, false, false, null]],
        851 => [
            [['_route' => 'app_sports_delete', '_controller' => 'App\\Controller\\SportsController::delete'], ['id'], ['POST' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
