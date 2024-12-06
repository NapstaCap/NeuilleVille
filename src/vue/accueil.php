<article id="artAcc">
    <h1 class="titreImage">Le Monde Sous-Marin</h1>
</article>
<div id="eaubg">
</div>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        const container = document.getElementById("eaubg");
        const textDisplay = document.createElement("div");
        textDisplay.id = "textDisplay";
        textDisplay.innerHTML = "Survolez un poisson pour voir son message.";
        container.appendChild(textDisplay);

        // Les données des poissons
        const data = {
            heart: {
                title: "Le Cœur et les Courants Marins",
                description: "Le cœur pompe le sang à travers le corps, tout comme les courants marins transportent les nutriments et régulent les températures dans l'océan.",
                positive: "Un cœur en bonne santé permet une circulation efficace, distribuant l'oxygène et les nutriments dans le corps. De même, les courants marins équilibrés maintiennent la santé des écosystèmes océaniques et régulent le climat mondial.",
                negative: "Un dysfonctionnement cardiaque peut entraîner une mauvaise circulation, privant les organes d'oxygène. Dans l'océan, un affaiblissement des courants peut provoquer des zones mortes, où la vie marine ne peut survivre en raison du manque d'oxygène."
            },
            lungs: {
                title: "Les Poumons et l'Oxygénation Océanique",
                description: "Les poumons fournissent de l'oxygène au corps, tout comme les océans produisent 50 % de l'oxygène de la planète grâce aux organismes photosynthétiques comme le phytoplancton.",
                positive: "Des poumons en bonne santé permettent une respiration efficace, essentielle à la vie. De la même manière, des océans en équilibre assurent la production constante d'oxygène, bénéfique pour toutes les formes de vie sur Terre.",
                negative: "Les maladies pulmonaires comme l'asthme ou la bronchite peuvent réduire la capacité respiratoire. Dans les océans, la pollution et le réchauffement climatique peuvent réduire la population de phytoplancton, menaçant la production globale d'oxygène."
            },
            kidneys: {
                title: "Les Reins et les Écosystèmes Filtrants",
                description: "Les reins éliminent les toxines et maintiennent l'équilibre hydrique, tout comme les mangroves, les récifs coralliens et les marais filtrent les polluants et stabilisent les écosystèmes côtiers.",
                positive: "Des reins fonctionnels maintiennent un corps en bonne santé en filtrant les déchets et en équilibrant les fluides corporels. Les écosystèmes marins sains filtrent naturellement les polluants, protégeant la biodiversité et fournissant de l'eau propre.",
                negative: "Une insuffisance rénale entraîne une accumulation de toxines dangereuses. La destruction des écosystèmes filtrants, comme les mangroves, laisse les océans vulnérables à la pollution et aggrave les inondations et l'érosion des côtes."
            },
            brain: {
                title: "Le Cerveau et les Réseaux Écosystémiques",
                description: "Le cerveau coordonne toutes les fonctions corporelles, tout comme les écosystèmes océaniques interconnectés assurent la stabilité de la planète.",
                positive: "Un cerveau sain garantit la coordination et l'efficacité du corps. Dans les océans, des écosystèmes interconnectés (coraux, poissons, algues) favorisent la biodiversité et la résilience face aux changements environnementaux.",
                negative: "Les lésions cérébrales ou les troubles neurologiques désorganisent le corps. Dans les océans, la perturbation d’un écosystème, comme la disparition des récifs coralliens, entraîne un effondrement des chaînes alimentaires marines."
            },
            skin: {
                title: "La Peau et la Surface de l'Océan",
                description: "La peau protège le corps et régule la température, tout comme la surface des océans agit comme un échangeur thermique entre l'atmosphère et l'eau.",
                positive: "Une peau saine protège contre les infections et aide à réguler la température corporelle. Une surface océanique propre et saine absorbe efficacement le dioxyde de carbone et redistribue la chaleur, atténuant les effets du réchauffement climatique.",
                negative: "Des maladies de la peau comme l'eczéma compromettent la barrière protectrice du corps. Une surface océanique polluée réduit la capacité de l'océan à absorber le CO₂, aggravant le réchauffement climatique et affectant les écosystèmes marins."
            }
        };

        // Les images des poissons
        const fishImages = [
            'https://i.imgur.com/97WN07I.png',
            'https://i.imgur.com/XPPovr2.png'
        ];

        // Les clés des données
        const fishKeys = Object.keys(data);

        // Taille des poissons
        const fishSize = 50;

        // Nombre de poissons à générer
        const fishCount = fishKeys.length;

        for (let i = 0; i < fishCount; i++) {
            // Créer un élément poisson
            const fish = document.createElement('div');
            fish.classList.add('fish');

            // Assigner une image
            const randomImage = fishImages[i % fishImages.length];
            fish.style.backgroundImage = `url(${randomImage})`;

            // Associer les données du poisson
            const fishKey = fishKeys[i];
            const fishData = data[fishKey];

            // Calculer les limites pour positionner le poisson sans déborder
            const maxX = container.offsetWidth - fishSize;
            const maxY = container.offsetHeight - fishSize;

            // Positionner aléatoirement le poisson
            let x = Math.random() * maxX;
            let y = Math.random() * maxY;

            // Vérifier s'il chevauche le message
            const textBounds = textDisplay.getBoundingClientRect();
            const fishBounds = { left: x, top: y, right: x + fishSize, bottom: y + fishSize };

            if (
                fishBounds.left < textBounds.right &&
                fishBounds.right > textBounds.left &&
                fishBounds.top < textBounds.bottom &&
                fishBounds.bottom > textBounds.top
            ) {
                // Repositionner le poisson pour qu'il ne chevauche pas le message
                x = Math.random() * (maxX - 100);
                y = Math.random() * (maxY - 100);
            }

            fish.style.left = `${x}px`;
            fish.style.top = `${y}px`;

            // Ajouter un événement pour afficher les détails du poisson
            fish.addEventListener('mouseenter', () => {
                fish.style.opacity = "0.5";
                textDisplay.innerHTML = `
                <h2>${fishData.title}</h2>
                <p>${fishData.description}</p>
                <p><strong>Aspect positif :</strong> ${fishData.positive}</p>
                <p><strong>Aspect négatif :</strong> ${fishData.negative}</p>
            `;
            });

            // Réinitialiser le message de base lors du retrait du curseur
            fish.addEventListener('mouseleave', () => {
                fish.style.opacity = "1";
                textDisplay.innerHTML = "Survolez un poisson pour voir son message.";
            });

            // Ajouter le poisson au conteneur
            container.appendChild(fish);
        }
    });




</script>