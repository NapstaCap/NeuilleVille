<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="<?php

/** @var string $cheminCSS */
echo $cheminCSS;
?>">
<head>
    <meta charset="UTF-8">
    <title> <?php
        /**
         * @var string $titre
         */
        echo $titre; ?></title>
    <link rel="stylesheet" href="../ressources/css/logo.css">
</head>
<body>
<main>
    <div class="ball"></div>
    <div class="infobulle">
        <div class="goutte"></div>
        <p class="info"></p>
    </div>
    <?php
    /**
     * @var string $cheminCorpsVue
     */
    require __DIR__ . "/{$cheminCorpsVue}";
    ?>
    <script src="../ressources/js/scriptLogo.js"></script>
</main>
<footer>
    <p>Site de NeuilleVille-sur-Seine</p>
</footer>
</body>
</html>