<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot AI</title>
    <link rel="stylesheet" href="../ressource/chatBot.css">
</head>
<body>
<header>
    <h1>Capitaine Océanic - Explorez les mystères des systèmes humains et océaniques</h1>
    <p>Posez une question et laissez le Capitaine vous guider dans les mers du savoir.</p>
</header>
<div id="chatbox">
    <div id="messages"></div>
    <!-- Bulles de proposition de questions -->
    <div id="suggestions" class="suggestions">
        <p><strong>Proposez une question à notre chatbot !</strong></p>
        <div class="suggestion-bubble" onclick="setInput('Comment l’océan aide-t-il à maintenir l’équilibre de notre planète ?')">
            Comment l’océan aide-t-il à maintenir l’équilibre de notre planète ?
        </div>
        <div class="suggestion-bubble" onclick="setInput('Quelles sont les conséquences d’un océan malade sur le corps humain ?')">
            Quelles sont les conséquences d’un océan malade sur le corps humain ?
        </div>
        <div class="suggestion-bubble" onclick="setInput('Pourquoi préserver les océans revient-il à protéger notre santé ?')">
            Pourquoi préserver les océans revient-il à protéger notre santé ?
        </div>
        <div class="suggestion-bubble" onclick="setInput('Le cycle de l’eau et nos poumons sont-ils vraiment liés ?')">
            Le cycle de l’eau et nos poumons sont-ils vraiment liés ?
        </div>
        <div class="suggestion-bubble" onclick="setInput('Quels gestes simples pour aider à sauver les océans ?')">
            Quels gestes simples pour aider à sauver les océans ?
        </div>
    </div>


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

        // Afficher le message utilisateur (transformé en HTML si nécessaire)
        messages.innerHTML += `<div class="user">${convertMarkdownToHtml(userMessage)}</div>`;
        input.value = '';

        // Appeler le backend PHP pour récupérer la réponse du chatbot
        const response = await fetch('chat.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `message=${encodeURIComponent(userMessage)}`
        });

        const data = await response.text();

        // Afficher la réponse du bot (transformée aussi)
        messages.innerHTML += `<div class="bot">${convertMarkdownToHtml(data)}</div>`;
        messages.scrollTop = messages.scrollHeight; // Scroll vers le bas
    });

    // Fonction pour insérer une question dans le champ de texte à partir des bulles de suggestion
    function setInput(text) {
        document.getElementById('user-input').value = text;
    }

    // Fonction pour convertir Markdown en HTML
    function convertMarkdownToHtml(text) {
        // Convertir **gras** en <strong>
        text = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        // Convertir *italique* en <em>
        text = text.replace(/\*(.*?)\*/g, '<em>$1</em>');
        return text;
    }
</script>
</body>
</html>
