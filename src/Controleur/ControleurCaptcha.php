<?php
namespace App\NDI\Controleur;
class ControleurCaptcha
{
    public static function afficherVue(string $cheminVue, array $parametres = []): void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../vue/$cheminVue"; // Charge la vue
    }

    public static function afficherCaptcha()
    {
        self::afficherVue('vueGenerale.php', [
            "titre" => "Captcha",
            "cheminCorpsVue" => "VueCaptcha.php",
            "cheminCSS"=> "../src/ressources/css/captcha.css"
        ]);
    }
}