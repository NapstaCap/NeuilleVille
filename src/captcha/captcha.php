<?php
session_start();

// Charger les réponses
$reponses = include 'enigmes/reponses.php';

// Choisir une énigme au hasard
$images = array_keys($reponses);
$image_choisie = $images[array_rand($images)];

// Stocker la réponse correcte dans la session
$_SESSION['captcha_reponse'] = $reponses[$image_choisie];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>CAPTCHA - Énigme</title>
</head>
<body>
<h1>Résolvez cette énigme pour continuer</h1>
<img src="enigmes/<?php echo $image_choisie; ?>" alt="Énigme">
<form method="POST" action="verifier_captcha.php">
    <label for="reponse">Votre réponse :</label>
    <input type="text" id="reponse" name="reponse" required>
    <button type="submit">Valider</button>
</form>
</body>
</html>
