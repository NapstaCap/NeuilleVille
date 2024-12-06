
<main>
    <section class="interactive-map">
        <h2>Choisissez une partie du corps</h2>
        <div id="body-map">
            <!-- Image avec zones cliquables -->
            <map name="bodymap">
                <area shape="circle" coords="150,200,50" alt="Coeur" href="#" data-target="heart">
                <area shape="circle" coords="150,400,50" alt="Poumons" href="#" data-target="lungs">
                <area shape="circle" coords="150,600,50" alt="Reins" href="#" data-target="kidneys">
            </map>
        </div>
    </section>

    <section id="details" class="hidden">
        <h2 id="part-title">Titre de la Partie</h2>
        <p id="part-description">Description détaillée.</p>
        <div id="effects">
            <h3>Effets d'un bon fonctionnement</h3>
            <p id="positive-effects">...</p>
            <h3>Conséquences des dysfonctionnements</h3>
            <p id="negative-effects">...</p>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2024 Parallèles Nature-Homme</p>
</footer>

<script src="../../../ressources/retro.js"></script>

