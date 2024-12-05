// Sélectionner les éléments
const popup = document.getElementById('popup');
const closePopup = document.getElementById('close-popup');

// Fonction pour afficher le pop-up avec animation
function showPopup() {
    popup.classList.add('show'); // Ajoute la classe "show"
}

// Fonction pour cacher le pop-up avec animation
function hidePopup() {
    popup.classList.remove('show'); // Retire la classe "show"
}

// Ajouter un événement au bouton de fermeture
closePopup.addEventListener('click', hidePopup);

async function sendMessage() {
    const input = document.getElementById('user-input');
    const message = input.value.trim();
    if (!message) return;

    // Afficher le message de l'utilisateur
    const messagesDiv = document.getElementById('messages');
    messagesDiv.innerHTML += `<div class="message user">${message}</div>`;
    input.value = '';

    // Envoyer le message au backend
    const response = await fetch('chatbot.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message }),
    });
    const data = await response.json();

    // Afficher la réponse du bot
    messagesDiv.innerHTML += `<div class="message bot">${data.reply}</div>`;
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}