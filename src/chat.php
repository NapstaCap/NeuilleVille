<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = $_POST['message'] ?? '';


    // Si le message n'est pas vide
    if (!empty($userMessage)) {
        if ($userMessage === 'Tu te bats comme une vache !') {
            echo 'C\'est normal, tu as l\'odorat d\'un porc-épic !';
        }
        if ($userMessage === 'Quel est le secret de Monkey Island ?') {
            echo 'C\'est une recette de grog ultra-secrète... mais tu dois promettre de ne jamais le dire à LeChuck !';
        }
        if ($userMessage === 'Grog') {
            echo 'Ah, le Grog ! Un mélange savoureux de kérosène, propylène glycol, huile pour batterie, et d\'autres ingrédients impossibles à prononcer. À consommer avec modération (ou pas) !';
        }
        if ($userMessage === 'Qui es-tu ?" ou "Quel est ton nom ?') {
            echo 'Je suis Guybrush Threepwood, un puissant pirate !';
        }
        if ($userMessage === 'ouvrir le coffre') {
            echo 'Le coffre est verrouillé. La clé ? Elle est probablement coincée dans une grotte hantée, derrière un singe à trois têtes.';
        }
        if ($userMessage === 'danse') {
            echo 'Tu ne peux pas prendre la clé, elle est derrière le sing';
        }
        else {
            $response = getHuggingFaceResponse($userMessage);
            echo $response['choices'][0]['message']['content'];
        }
    }
//        $response = getHuggingFaceResponse($userMessage);
//        if (isset($response['choices'][0]['message']['content'])) {
//            // Retourner la réponse du chatbot
//            echo $response['choices'][0]['message']['content'];
//        }
//        else {
//            // Si aucune réponse n'est reçue ou erreur dans l'API
//            echo 'Une erreur est survenue avec l\'API Hugging Face.';
//        }
//    }

    else {
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
