<?php
require 'vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$apiKey = $_ENV['HUGGINGFACE_API_KEY'] ?? getenv('HUGGINGFACE_API_KEY');
echo "API Key starts with: " . substr($apiKey, 0, 5) . "\n";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api-inference.huggingface.co/models/openai/whisper-large-v3");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "test audio data");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $apiKey,
    "Content-Type: application/octet-stream"
]);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: " . $httpCode . "\n";
echo "Response: " . substr($result, 0, 500) . "\n";
