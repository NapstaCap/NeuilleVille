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
</head>
<body>
<main>
    <?php
    /**
     * @var string $cheminCorpsVue
     */
    require __DIR__ . "/{$cheminCorpsVue}";
    ?>
</main>
<footer>
    <p>Site de NeuilleVille-sur-Seine</p>
</footer>
</body>
</html>