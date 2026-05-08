<?php

namespace App\Service;

class CaloriePredictionService
{
    public function predict(array $profilSante, array $exercice): array
    {
        $scriptPath = dirname(__DIR__, 2) . '/ml/predict.py';

        if (!file_exists($scriptPath)) {
            return [
                'status'  => 'error',
                'message' => 'Modèle ML non trouvé. Lance python ml/train_model.py'
            ];
        }

        // Écrire les données dans un fichier temporaire (évite les problèmes de quotes Windows)
        $tempFile = sys_get_temp_dir() . '/biosync_predict_' . uniqid() . '.json';

        $input = json_encode([
            'age'                => (int)   $profilSante['age'],
            'poids'              => (int)   $profilSante['poids'],
            'intensite'          => strtoupper((string) $exercice['intensite']),
            'duree'              => (int)   ($exercice['duree'] ?? 30),
            'calorie_par_minute' => (float) $exercice['calorie_par_minute'],
        ]);

        file_put_contents($tempFile, $input);

        // Passe le chemin du fichier JSON au lieu du JSON directement
        $command = sprintf('python %s --file %s 2>&1',
            escapeshellarg($scriptPath),
            escapeshellarg($tempFile)
        );

        $output = shell_exec($command);

        // Nettoyage
        if (file_exists($tempFile)) {
            unlink($tempFile);
        }

        if (!$output) {
            return ['status' => 'error', 'message' => 'Erreur Python - aucune réponse'];
        }

        $result = json_decode(trim($output), true);

        if (!$result || $result['status'] !== 'success') {
            return ['status' => 'error', 'message' => $result['message'] ?? 'Prédiction échouée : ' . $output];
        }

        return $result;
    }
}
