<?php
namespace App\NDI\Controleur;
class ControleurCaptcha extends ControleurGenerique
{

    public static function afficherCaptcha()
    {
        self::afficherVue('vueGenerale.php', [
            "titre" => "Captcha",
            "cheminCorpsVue" => "VueCaptcha.php",
            "cheminCSS"=> "../src/ressources/css/captcha.css"
        ]);
    }
}