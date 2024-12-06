<?php

use App\NDI\Controleur\ControleurCaptcha;

session_start();

require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';

// initialisation en activant l'affichage de débogage
$chargeurDeClasse = new App\NDI\Lib\Psr4AutoloaderClass(false);
$chargeurDeClasse->register();
// enregistrement d'une association "espace de nom" → "dossier"
$chargeurDeClasse->addNamespace('App\NDI', __DIR__ . '/../src');


// Vérifier si l'utilisateur a déjà validé le CAPTCHA
if (!isset($_SESSION['captcha_valide']) || $_SESSION['captcha_valide'] !== true) {
    // Si le CAPTCHA n'a pas encore été validé
    if (!isset($_SESSION['captcha_en_cours']) || $_SESSION['captcha_en_cours'] !== true) {
        // Marquer le début de la résolution du CAPTCHA
        $_SESSION['captcha_en_cours'] = true;

        // Afficher le CAPTCHA via le contrôleur
        ControleurCaptcha::afficherCaptcha();
        exit();
    } else {
        // Si le CAPTCHA est en cours mais non validé, on reste sur la page du CAPTCHA
        ControleurCaptcha::afficherCaptcha();
        exit();
    }
} else {
    // Si le CAPTCHA a déjà été validé
    unset($_SESSION['captcha_en_cours']); // Supprimer l'état "en cours" si nécessaire

    // Ajoutez ici le code pour charger le contenu principal de votre application
     
    \App\NDI\Controleur\ControleurChatBox::afficherChatBox();
    /*
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = "afficherListe";
    }

    if (isset($_GET['controleur'])) {
        $controleur = $_GET['controleur'];
    } else {
        if (isset($_COOKIE['preferenceControleur'])) {
            $controleur = $_COOKIE['preferenceControleur'];
        } else {
            $controleur = "utilisateur";
        }
    }

    $nomDeClasseControleur = ("App\Covoiturage\Controleur\Controleur" . ucfirst($controleur));
    if (class_exists($nomDeClasseControleur)) {
        $methods = get_class_methods($nomDeClasseControleur);
        if (in_array($action, $methods)) {
            $nomDeClasseControleur::$action();
        } else {
            ControleurUtilisateur::afficherErreur("Cette action n'existe pas : $action");
        }
    } else {
        ControleurUtilisateur::afficherErreur("Ce controleur n'existe pas : $controleur");
    }*/
}


