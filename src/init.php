<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chatbot AI</title>
    <link rel="stylesheet" href="../ressource/chatBot.css">
</head>
<body>
<div id="chatbox">
    <div id="messages"></div>
    <form id="chat-form" method="POST">
        <input type="text" id="user-input" name="message" placeholder="Votre message" required>
        <button type="submit">Envoyer</button>
    </form>
</div>

<script>
    const form = document.getElementById('chat-form');
    const messages = document.getElementById('messages');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const input = document.getElementById('user-input');
        const userMessage = input.value;

        // Afficher le message utilisateur
        messages.innerHTML += `<div class="user">${userMessage}</div>`;
        input.value = '';

        // Appeler le backend PHP pour récupérer la réponse du chatbot
        const response = await fetch('chat.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `message=${encodeURIComponent(userMessage)}`
        });

        const data = await response.text();

        // Afficher la réponse du bot
        messages.innerHTML += `<div class="bot">${data}</div>`;
        messages.scrollTop = messages.scrollHeight; // Scroll vers le bas
    });
</script>
</body>
</html>
