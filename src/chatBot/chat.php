<?php
include  __DIR__ . '/../huggingface_api.php';

// Gestion des requêtes du chatbot
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessage = $_POST['message'] ?? '';

    if (!empty($userMessage)) {
        $response = getHuggingFaceResponse($userMessage);

        if (isset($response[0]['generated_text'])) {
            echo htmlspecialchars($response[0]['generated_text']);
        } else {
            echo 'Une erreur est survenue avec l\'API Hugging Face.';
        }
    } else {
        echo 'Message vide.';
    }
}
?>
