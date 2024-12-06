<nav>
    <div><a href="controleurFrontal.php">Oceaneo</a>

    </div>
    <div><a href="controleurFrontal.php?controleur=ChatBox&action=afficherChatBox">Chat</a>
    </div>
</nav>
<div class="burger">
    <img src="../ressources/img/burger.png" alt="burger" width="50">
    <div id="menu2">
        <div>
            <h2>Oceaneo</h2>
            <img src="../ressources/img/fermer-la-croix-modified.png" alt="burger" width="40" height="40" tabindex="0"
                 onclick="toggleMenu()">
        </div>
        <div>
            <a href="controleurFrontal.php">Accueil</a>
    </div>
</div>
<script>
    function toggleMenu() {
        var menu = document.getElementById('menu2');
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    }

    var burgerImage = document.querySelector('.burger img');
    burgerImage.addEventListener('click', toggleMenu);


    function ToggleAdmin(element) {
        if (element.parentElement.parentElement.parentElement.classList.contains("open")) {
            element.parentElement.parentElement.parentElement.classList.remove("open");

        } else {
            element.parentElement.parentElement.parentElement.classList.add("open");
        }
    }

</script>
