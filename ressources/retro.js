// Données des parallèles
const data = {
    heart: {
        title: "Le Cœur et les Courants Marins",
        description: "Le cœur pompe le sang à travers le corps, tout comme les courants marins transportent les nutriments et régulent les températures dans l'océan.",
        positive: "Un bon fonctionnement favorise une bonne circulation et un écosystème marin sain.",
        negative: "Une mauvaise circulation entraîne des zones mortes dans les océans, comme un cœur défaillant cause des crises cardiaques."
    },
    lungs: {
        title: "Les Poumons et l'Oxygénation Océanique",
        description: "Les poumons fournissent de l'oxygène au corps, tout comme les océans produisent 50 % de l'oxygène de la planète.",
        positive: "Des poumons sains et des océans non pollués soutiennent la vie.",
        negative: "Des maladies pulmonaires ou la destruction des écosystèmes marins réduisent la production d'oxygène."
    },
    kidneys: {
        title: "Les Reins et les Écosystèmes Filtrants",
        description: "Les reins éliminent les toxines, tout comme les mangroves et récifs filtrent l'eau et protègent contre la pollution.",
        positive: "Un système filtrant efficace maintient la santé globale.",
        negative: "Les dysfonctionnements entraînent une accumulation de déchets toxiques dans les corps et les océans."
    }
};

// Gestion des clics sur la carte
document.querySelectorAll("area").forEach(area => {
    area.addEventListener("click", function (e) {
        e.preventDefault();
        const target = this.getAttribute("data-target");
        displayDetails(target);
    });
});

// Afficher les détails
function displayDetails(part) {
    const details = data[part];
    document.getElementById("part-title").textContent = details.title;
    document.getElementById("part-description").textContent = details.description;
    document.getElementById("positive-effects").textContent = details.positive;
    document.getElementById("negative-effects").textContent = details.negative;

    document.getElementById("details").classList.remove("hidden");
}
