<?php
return [
    [
        "question" => "2.png", // Une question classique
        "type" => "text", // Réponse textuelle
        "reponse" => "89",
    ],
    [
        "question" => "1.png", // Une question avec cases à cocher
        "type" => "checkbox", // Réponse par cases à cocher
        "options" => ["8", "12", "13", "14", "16", "17", "25"],
        "reponse" => ["12", "16", "17", "25"], // Combinaison correcte
    ],
];
