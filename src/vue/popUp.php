<h2>Conteneur Pop-Up</h2>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Pop-up</title>
    <link rel="stylesheet" href="../../ressource/css/navstyle.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
<!-- Contenu HTML ici -->
<div id="popup" class="popup">
    <div class="popup-content">
        <span id="close-popup" class="close-button">&times;</span>
        <img src="../../ressource/img/baleine.png">
    </div>
</div>
<button onclick="showPopup()">Que du love</button>

<script src="../../ressource/js/popUp.js"></script> <!-- Lien vers le fichier JS -->

<div id="chatbox">
    <div id="messages"></div>
    <div id="input-box">
        <input type="text" id="user-input" placeholder="Écrivez votre message...">
        <button onclick="sendMessage()">Envoyer</button>
    </div>
</div>
</body>


