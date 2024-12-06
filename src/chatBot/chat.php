<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = $_POST['message'] ?? '';
    // Si le message n'est pas vide
    if (!empty($userMessage)) {

        // Réponses personnalisées pour des messages spécifiques
        $predefinedResponses = [
            'Tu te bats comme une vache !' => 'C\'est normal, tu as l\'odorat d\'un porc-épic !',
            'Quel est le secret de Monkey Island ?' => 'C\'est une recette de grog ultra-secrète... mais tu dois promettre de ne jamais le dire à LeChuck !',
            'Grog' => 'Ah, le Grog ! Un mélange savoureux de kérosène, propylène glycol, huile pour batterie, et d\'autres ingrédients impossibles à prononcer. À consommer avec modération (ou pas) !',
            'Qui es-tu ?' => 'Je suis Guybrush Threepwood, un puissant pirate !',
            'ouvrir le coffre' => 'Le coffre est verrouillé. La clé ? Elle est probablement coincée dans une grotte hantée, derrière un singe à trois têtes.',
            'danse' => ' Tu ne peux pas prendre la clé, elle est derrière le singe... mais fais une danse du pirate en attendant ! <div class="dancing-image"><img src="../../ressource/dancingpirate.png" alt="Pirate qui danse" /></div>',
        ];

        if (isset($predefinedResponses[$userMessage])) {
            echo $predefinedResponses[$userMessage];
            exit;
        }

        // Appel à l'API Hugging Face
        $response = getHuggingFaceResponse($userMessage);

        if (isset($response['choices'][0]['message']['content'])) {
            $botResponse = $response['choices'][0]['message']['content'];
            echo $botResponse;
        } else {
            echo 'Une erreur est survenue avec l\'API Hugging Face. Peut-être que LeChuck a encore saboté notre serveur !';
        }
    } else {
        echo 'Un pirate sans message ne trouve jamais le trésor !';
    }
}


/**
 * Fonction pour interroger l'API Hugging Face.
 */
function getHuggingFaceResponse($userInput)
{
    $apiToken = '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'; // Remplacez par votre token
    $model = 'meta-llama/Llama-3.2-3B-Instruct';
    $url = 'https://api-inference.huggingface.co/models/' . $model . '/v1/chat/completions';

    $prompt = "Tu dois répondre uniquement en français, avec un style humoristique et décalé inspiré de Monkey Island, tout en restant pertinent pour sensibiliser à la préservation des océans.";

    $data = [
        'model' => $model,
        'messages' => [
            ['role' => 'system', 'content' => $prompt],
            ['role' => 'user', 'content' => $userInput],
        ],
        'max_tokens' => 200,
        'temperature' => 0.7,
        'stream' => false,
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $apiToken,
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response === false) {
        echo 'Erreur dans la réponse de l\'API.';
        return [];
    }

    return json_decode($response, true);
}
?>
