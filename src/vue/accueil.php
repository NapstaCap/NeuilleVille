<article id="artAcc">
    <h1 class="titreImage">Titre</h1>
</article>
<div id="eaubg">
    <!-- Les poissons seront générés dynamiquement -->
</div>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        const container = document.getElementById("eaubg");

        // Liste des images de poissons
        const fishImages = [
            '../img/poisson1.png',
            '../img/poisson2.png',
            '../img/poisson3.png',
            '../img/poisson4.png'
        ];

        // Liste des messages
        const fishMessages = [
            "Je suis un poisson clown !",
            "Hello, je nage ici !",
            "Tu m'as trouvé !",
            "Je suis le roi des mers !",
            "Attrape-moi si tu peux !"
        ];

        // Nombre de poissons à générer
        const fishCount = 20;

        for (let i = 0; i < fishCount; i++) {
            // Créer un élément poisson
            const fish = document.createElement('div');
            fish.classList.add('fish');

            // Assigner une image aléatoire
            const randomImage = fishImages[Math.floor(Math.random() * fishImages.length)];
            fish.style.backgroundImage = `url(${randomImage})`;

            // Assigner un message aléatoire
            const randomMessage = fishMessages[Math.floor(Math.random() * fishMessages.length)];
            fish.setAttribute('data-text', randomMessage);

            // Positionner aléatoirement le poisson
            const x = Math.random() * (container.offsetWidth - 50);
            const y = Math.random() * (container.offsetHeight - 50);
            fish.style.left = `${x}px`;
            fish.style.top = `${y}px`;

            // Ajouter le poisson au conteneur
            container.appendChild(fish);
        }
    });


</script>