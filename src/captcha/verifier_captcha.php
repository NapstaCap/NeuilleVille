<?php
session_start();

if (!isset($_POST['reponse'])) {
    header('Location: captcha.php');
    exit();
}

$reponse_utilisateur = strtolower(trim($_POST['reponse']));
$reponse_attendue = strtolower($_SESSION['captcha_reponse'] ?? '');

if ($reponse_utilisateur === $reponse_attendue) {
    // Réponse correcte, passer à la page suivante
    unset($_SESSION['captcha_reponse']); // Nettoyer la session
    echo "CAPTCHA validé ! Vous pouvez accéder au site.";
    // Rediriger vers le site principal
    // header('Location: accueil.php');
} else {
    // Réponse incorrecte, retour au CAPTCHA
    echo "Réponse incorrecte. Veuillez réessayer.";
    echo '<br><a href="captcha.php">Réessayer</a>';
}
