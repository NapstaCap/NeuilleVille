<?php

require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';

// initialisation en activant l'affichage de débogage
$chargeurDeClasse = new App\NDI\Lib\Psr4AutoloaderClass(false);
$chargeurDeClasse->register();
// enregistrement d'une association "espace de nom" → "dossier"
$chargeurDeClasse->addNamespace('App\NDI', __DIR__ . '/../src');

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

$nomDeClasseControleur = ("App\NDI\Controleur\Controleur" . ucfirst($controleur));
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

