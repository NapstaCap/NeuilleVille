<?php

namespace App\NDI\Controleur;

class ControleurChatBox extends ControleurGenerique
{
    public static function afficherChatBox()
    {
        self::afficherVue('vueGenerale.php', [
            "titre" => "ChatBox",
            "cheminCorpsVue" => "chatBox.php",
            "cheminCSS" => "../src/ressources/css/chatBot.css"
        ]);
    }
}