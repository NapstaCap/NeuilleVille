

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot AI</title>
    <style>
/* Style basique pour le chatbot */
body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f4; }
        #chatbox { width: 500px; margin: 50px auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        #messages { height: 300px; overflow-y: auto; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
        .user, .bot { margin-bottom: 10px; }
        .user { text-align: right; color: blue; }
        .bot { text-align: left; color: green; }
    </style>
</head>
<body>
    <div id="chatbox">
        <div id="messages"></div>
        <form id="chat-form" method="POST" action="chatBot/chat.php">
            <input type="text" id="user-input" name="message" placeholder="Votre message" required>
            <button type="submit">Envoyer</button>
        </form>
    </div>

    <script>
        // Rafraîchit les messages après envoi
        const form = document.getElementById('chat-form');
        const messages = document.getElementById('messages');

        form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const input = document.getElementById('user-input');
        const userMessage = input.value;

        // Affiche le message utilisateur
        messages.innerHTML += `<div class="user">${userMessage}</div>`;
        input.value = '';

        // Envoi du message à PHP
        const response = await fetch('chat.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `message=${encodeURIComponent(userMessage)}`
            });
            const data = await response.text();

            // Affiche la réponse du bot
            messages.innerHTML += `<div class="bot">${data}</div>`;
            messages.scrollTop = messages.scrollHeight; // Scroll vers le bas
        });
    </script>
</body>
</html>
