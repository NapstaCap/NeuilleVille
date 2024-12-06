<?php

// Activer les erreurs pour le développement (à désactiver en production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure le fichier contenant les énigmes
$enigmes = include __DIR__ . '/../captcha/enigmes/reponses.php';

// Vérifier si les énigmes sont définies et non vides
if (empty($enigmes) || !is_array($enigmes)) {
    die("Erreur : aucune énigme n'est définie.");
}

// Sélectionner une énigme aléatoire
$index = array_rand($enigmes);
$enigmeSelectionnee = $enigmes[$index];

// Vérifier l'énigme sélectionnée
if (empty($enigmeSelectionnee)) {
    die("Erreur : l'énigme sélectionnée est vide.");
}

// Stocker les informations dans la session
$_SESSION['captcha_reponse'] = $enigmeSelectionnee['reponse'];
$_SESSION['captcha_type'] = $enigmeSelectionnee['type'];

// HTML avec une inclusion du fichier CSS
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"> <!-- Lien vers le fichier CSS -->
    <title>Captcha</title>
</head>
<body>
<div class="container">
    <?php if ($enigmeSelectionnee['type'] === 'text'): ?>
        <h2>Résolvez l'énigme :</h2>
        <img src="../src/captcha/enigmes/<?= htmlspecialchars($enigmeSelectionnee['question']); ?>" alt="Énigme" class="captcha-image">
        <form method="POST" action="../src/captcha/verifier_captcha.php" class="captcha-form">
            <label for="reponse">Votre réponse :</label>
            <input type="text" name="reponse" id="reponse" required>
            <button type="submit">Valider</button>
        </form>
    <?php elseif ($enigmeSelectionnee['type'] === 'checkbox'): ?>
        <h2>Sélectionnez les bonnes options :</h2>
        <img src="../src/captcha/enigmes/<?= htmlspecialchars($enigmeSelectionnee['question']); ?>" alt="Énigme" class="captcha-image">
        <form method="POST" action="../src/captcha/verifier_captcha.php" class="captcha-form">
            <?php foreach ($enigmeSelectionnee['options'] as $index => $option): ?>
                <div class="checkbox-option">
                    <input type="checkbox" name="reponse[]" value="<?= htmlspecialchars($option); ?>" id="option_<?= $index; ?>">
                    <label for="option_<?= $index; ?>"><?= htmlspecialchars($option); ?></label>
                </div>
            <?php endforeach; ?>
            <button type="submit">Valider</button>
        </form>
    <?php else: ?>
        <p>Type de question inconnu.</p>
    <?php endif; ?>
</div>
</body>
</html>
