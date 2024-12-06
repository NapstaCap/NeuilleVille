<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = $_POST['message'] ?? '';

    // Si le message n'est pas vide
    if (!empty($userMessage)) {
        $response = getHuggingFaceResponse($userMessage);

        if (isset($response['choices'][0]['message']['content'])) {
            // Retourner la réponse du chatbot
            echo $response['choices'][0]['message']['content'];
        } else {
            // Si aucune réponse n'est reçue ou erreur dans l'API
            echo 'Une erreur est survenue avec l\'API Hugging Face.';
        }
    } else {
        echo 'Message vide.';
    }
}


/**
 * Fonction pour interroger l'API Hugging Face.
 */
function getHuggingFaceResponse($userInput)
{
    $apiToken = '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'; // Remplacez par votre token
    $model = 'meta-llama/Llama-3.2-3B-Instruct'; // Le modèle que vous voulez utiliser
    $url = 'https://api-inference.huggingface.co/models/' . $model . '/v1/chat/completions';

    // Données à envoyer à l'API
    $data = [
        'model' => $model,
        'messages' => [
            ['role' => 'user', 'content' => $userInput],
        ],
        'max_tokens' => 500,
        'stream' => false,
    ];

    // Initialiser cURL
    $ch = curl_init($url);

    // Options cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $apiToken,
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Exécuter la requête
    $response = curl_exec($ch);

    // Vérifier les erreurs cURL
    if (curl_errno($ch)) {
        echo 'Erreur cURL: ' . curl_error($ch);
    }

    curl_close($ch);

    // Vérifier la réponse
    if ($response === false) {
        echo 'Erreur dans la réponse de l\'API.';
        return [];
    }

    // Décoder la réponse JSON
    return json_decode($response, true);
}

?>
