<?php

function getHuggingFaceResponse($userInput)
{
    $apiToken = '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'; // Remplacez par votre token
    $model = 'gpt2'; // Remplacez par le modèle que vous souhaitez utiliser
    $url = "https://api-inference.huggingface.co/models/$model";

    $headers = [
        "Authorization: Bearer $apiToken",
        "Content-Type: application/json"
    ];

    $data = json_encode([
        "inputs" => $userInput
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}
