const logo = document.querySelector('.ball');
const bulle = document.querySelector('.infobulle');
const texte = document.querySelector('.info');
const infos = [
    "Les courants marins fonctionnent comme le système circulatoire humain : ils distribuent chaleur, nutriments et énergie à travers le globe.",
    "Plus de 50 % de l'oxygène que nous respirons provient de l’océan, grâce au phytoplancton. L’océan est vraiment notre deuxième poumon.",
    "Tout comme nos poumons capturent et expulsent le CO2, l’océan en absorbe plus d’un quart chaque année, jouant un rôle essentiel dans la régulation climatique.",
    "Le phytoplancton est à l’océan ce que le sang est à notre corps : il nourrit et soutient l’écosystème marin.",
    "L’océan régule la température de la planète, tout comme notre corps maintient une température constante pour fonctionner correctement.",
    "La pollution plastique agit comme un poison pour l’océan, tout comme des toxines peuvent nuire à notre corps.",
    "Les récifs coralliens agissent comme les alvéoles de nos poumons, soutenant des milliers d’espèces marines grâce à leurs structures complexes.",
    "Lorsque l’océan absorbe trop de CO2, il devient acide, tout comme un déséquilibre dans notre corps peut causer des maladies graves.",
    "La circulation thermohaline, souvent appelée 'le tapis roulant de l’océan', est essentielle à la régulation de la température mondiale, tout comme le cœur humain l'est pour le sang.",
    "Tout comme notre corps a besoin d’un équilibre en sels minéraux, l’océan maintient un équilibre salin crucial pour la vie marine."
];
const animations = ["ballLeft", "ballRight"];
const randAnim = animations[Math.floor(Math.random() * animations.length)]
logo.classList.toggle(randAnim);
logo.addEventListener('click', () => {
    const i = Math.floor(Math.random() * infos.length);
    texte.textContent = infos[i];
    bulle.classList.toggle('infobulleShow');
    console.log("Texte choisi :", infos[i]);
});

bulle.addEventListener('click', () => {
    bulle.classList.toggle('infobulleShow');
});