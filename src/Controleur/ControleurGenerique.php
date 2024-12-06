<?php

namespace App\NDI\Controleur;

class ControleurGenerique
{
    public static function afficherAccueil(array $parametres = []): void
    {
        self::afficherVue('vueGenerale.php', [
            "titre" => "Accueil",
            "cheminCorpsVue" => "accueil.php",
            "cheminCSS"=> "../src/ressources/css/accueil.css"
        ]);
    }
    public static function afficherVue(string $cheminVue, array $parametres = []): void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../vue/$cheminVue"; // Charge la vue
    }
}