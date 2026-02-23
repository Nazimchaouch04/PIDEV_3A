<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AIService
{
    private $httpClient;
    private $apiKey;

    public function __construct(HttpClientInterface $httpClient, string $huggingFaceToken)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $huggingFaceToken;
        
        // Test API key on construction
        if (empty($this->apiKey)) {
            error_log('AI Service: No HuggingFace token provided');
        }
    }

    public function testConnection(): bool
    {
        try {
            $response = $this->httpClient->request('POST', 'https://api-inference.huggingface.co/models/google/flan-t5-base', [
                'headers' => ['Authorization' => 'Bearer ' . $this->apiKey],
                'json' => ['inputs' => 'test'],
                'timeout' => 10
            ]);
            return $response->getStatusCode() === 200;
        } catch (\Exception $e) {
            error_log('AI Connection Test: ' . $e->getMessage());
            return false;
        }
    }

    public function generateDescription(string $groupName, string $theme): string
    {
        // Try multiple models for better variety
        $models = [
            ['mistralai/Mistral-7B-Instruct-v0.3', "Create an inspiring 3-sentence French description for a wellness group called '$groupName' focused on '$theme'. Make it motivational and welcoming."],
            ['meta-llama/Llama-2-7b-chat-hf', "Générer une description inspirante pour le groupe de bien-être '$groupName' avec le thème '$theme'. Soyez encourageant et bienveillant."],
            ['google/flan-t5-base', "Décrire une communauté de bien-être nommée '$groupName' sur le thème '$theme'. Rendez-le accueillante et motivante."],
            ['microsoft/DialoGPT-2', "Créer un texte captivant pour '$groupName' - thème '$theme'. Focalisé sur le bien-être et la croissance personnelle."]
        ];

        foreach ($models as $index => $modelConfig) {
            try {
                $response = $this->httpClient->request('POST', "https://api-inference.huggingface.co/models/$modelConfig[0]", [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->apiKey,
                        'Content-Type' => 'application/json'
                    ],
                    'json' => [
                        'inputs' => $modelConfig[1],
                        'parameters' => [
                            'max_new_tokens' => 120,
                            'temperature' => 0.8,
                            'do_sample' => true
                        ]
                    ],
                    'timeout' => 25
                ]);

                $statusCode = $response->getStatusCode();
                if ($statusCode === 200) {
                    $data = $response->toArray();
                    if (isset($data[0]['generated_text'])) {
                        $text = $data[0]['generated_text'];
                        if (!empty($text) && strlen($text) > 30) {
                            return trim($text);
                        }
                    }
                } elseif ($statusCode === 410) {
                    error_log("AI Model $modelConfig[0] is no longer available (410 Gone)");
                } elseif ($statusCode === 503) {
                    error_log("AI Model $modelConfig[0] is currently loading (503 Service Unavailable)");
                } else {
                    error_log("AI Model $modelConfig[0] returned status code: $statusCode");
                }
            } catch (\Exception $e) {
                error_log("AI Text Error (Model $index): " . $e->getMessage());
                continue;
            }
        }

        // Enhanced fallback templates for more variety
        $fallbacks = [
            "Découvrez '$groupName', votre espace de bien-être dédié au '$theme'. Partagez vos expériences et trouvez l'inspiration mutuelle pour une vie plus saine.",
            "Rejoignez '$groupName' et explorez les bienfaits du '$theme' dans une ambiance bienveillante et solidaire.",
            "Bienvenue dans la communauté '$groupName' centrée sur le '$theme'. Ensemble, cultivons le bien-être et l'harmonie intérieure.",
            "Transformez votre vie avec '$groupName' - un lieu où le '$theme' devient source d'épanouissement et de croissance personnelle.",
            "Partagez vos passions et découvrez de nouvelles expériences avec '$groupName' - un groupe de bien-être axé sur '$theme'.",
            "Épanouissez-vous avec '$groupName' - une communauté de bien-être dédiée à '$theme'."
        ];

        return $fallbacks[array_rand($fallbacks)];
    }

    public function generateImage(string $theme): ?string
    {
        // Method 1: Try HuggingFace models
        $result = $this->tryHuggingFaceImage($theme);
        if ($result && !$this->isTextPlaceholder($result)) {
            return $result;
        }

        // Method 2: Try Unsplash real photos based on theme
        $unsplashResult = $this->getUnsplashImage($theme);
        if ($unsplashResult) {
            return $unsplashResult;
        }

        // Method 3: Fallback to text placeholder
        return $this->generatePlaceholderImage($theme);
    }

    private function isTextPlaceholder(string $base64String): bool
    {
        // Check if it's a text placeholder (starts with our text pattern)
        $textPatterns = [
            '🧘 Yoga & Méditation',
            '💪 Fitness & Sport',
            '🥗 Nutrition Santé',
            '🧠 Santé Mentale',
            '🌟 Bien-être'
        ];
        
        $decoded = base64_decode($base64String);
        return in_array($decoded, $textPatterns);
    }

    private function tryHuggingFaceImage(string $theme): ?string
    {
        $prompts = [
            "A diverse group of people doing wellness activities together, $theme theme, professional photography, warm lighting, realistic style",
            "Wellness group activity, $theme focus, people in circle, supportive atmosphere, natural lighting, high quality photo",
            "Community wellness event, $theme activities, diverse group of people, outdoor setting, bright natural light"
        ];
        
        // Try different image generation models that might be available
        $models = [
            'runwayml/stable-diffusion-v1-5',
            'CompVis/stable-diffusion-v1-4',
            'stabilityai/stable-diffusion-xl-base-1.0',
            'hakurei/waifu-diffusion'  // Alternative model
        ];

        foreach ($models as $model) {
            foreach ($prompts as $prompt) {
                try {
                    $response = $this->httpClient->request('POST', "https://api-inference.huggingface.co/models/$model", [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $this->apiKey,
                            'Content-Type' => 'application/json'
                        ],
                        'json' => [
                            'inputs' => $prompt,
                            'parameters' => [
                                'num_inference_steps' => 20,
                                'guidance_scale' => 7.5,
                                'width' => 512,
                                'height' => 512
                            ]
                        ],
                        'timeout' => 30
                    ]);

                    if ($response->getStatusCode() === 200) {
                        $content = $response->getContent();
                        if (!empty($content) && strlen($content) > 100) {
                            return 'data:image/png;base64,' . base64_encode($content);
                        }
                    }
                } catch (\Exception $e) {
                    error_log("HF Model $model failed: " . $e->getMessage());
                    continue;
                }
            }
        }
        return null;
    }

    private function generatePlaceholderImage(string $theme): ?string
    {
        // Return a simple text-based placeholder instead of image
        $themes = [
            'yoga' => '🧘 Yoga & Méditation',
            'fitness' => '💪 Fitness & Sport',
            'nutrition' => '🥗 Nutrition Santé',
            'mental' => '🧠 Santé Mentale',
            'default' => '🌟 Bien-être'
        ];

        $themeKey = strtolower($theme);
        return $themes[$themeKey] ?? $themes['default'];
    }

    private function getUnsplashImage(string $theme): ?string
    {
        // Theme-based real photos from Unsplash - properly categorized
        $themeImages = [
            'yoga' => [
                'https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=400&h=300&fit=crop&crop=entropy',
                'https://images.unsplash.com/photo-1545205597-3d9d02c29597?w=400&h=300&fit=crop&crop=entropy',
                'https://images.unsplash.com/photo-1545389336-cf090694435e?q=80&w=764&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            ],
            'fitness' => [
                'https://plus.unsplash.com/premium_photo-1664474697070-2678dbfacec1?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'https://images.unsplash.com/photo-1556817411-31ae72fa3ea0?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=300&fit=crop&crop=entropy'
            ],
            'nutrition' => [
                'https://media.istockphoto.com/id/2206638254/fr/photo/produits-alimentaires-recommand%C3%A9s-pour-la-grossesse-alimentation-saine.webp?a=1&b=1&s=612x612&w=0&k=20&c=fw95fpm0fhNaBL6yiOOcp1DRvY--wPawyyMjf8dIUPc=',
                'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=400&h=300&fit=crop&crop=entropy',
                'https://plus.unsplash.com/premium_photo-1675798983878-604c09f6d154?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            ],
            'mental' => [
                'https://plus.unsplash.com/premium_photo-1689177356594-b988a1cc45ff?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?w=400&h=300&fit=crop&crop=entropy',
                'https://images.unsplash.com/photo-1710322144652-bcea73280334?q=80&w=627&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            ]
        ];

        $themeKey = strtolower($theme);
        $images = $themeImages[$themeKey] ?? $themeImages['fitness'];
        
        return $images[array_rand($images)];
    }
}