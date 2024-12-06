<?php
session_start();

if (isset($_SESSION['captcha_type']) && isset($_POST['reponse'])) {
    $type = $_SESSION['captcha_type'];
    $reponseAttendue = $_SESSION['captcha_reponse'];
    $utilisateurReponse = $_POST['reponse'];

    if ($type === 'text') {
        if (strtolower(trim($utilisateurReponse)) === strtolower($reponseAttendue)) {
            // Le CAPTCHA est validé
            $_SESSION['captcha_valide'] = true;
            unset($_SESSION['captcha_en_cours']); // Supprimer l'état "en cours"
            header("Location: /NeuilleVille/web/controleurFrontal.php");
            exit();
        } else {
            echo "<div class='error-message'>Mauvaise réponse, essayez encore.</div>";
        }
    } elseif ($type === 'checkbox') {
        sort($reponseAttendue);
        sort($utilisateurReponse);

        if ($reponseAttendue === $utilisateurReponse) {
            // Le CAPTCHA est validé
            $_SESSION['captcha_valide'] = true;
            unset($_SESSION['captcha_en_cours']); // Supprimer l'état "en cours"
            header("Location: /NeuilleVille/web/controleurFrontal.php");
            exit();
        } else {
            echo "<div class='error-message'>Mauvaise combinaison, essayez encore.</div>";
        }
    } else {
        echo "<div class='error-message'>Type de question inconnu.</div>";
    }
} else {
    echo "<div class='error-message'>Erreur : aucune question en cours.</div>";
}
