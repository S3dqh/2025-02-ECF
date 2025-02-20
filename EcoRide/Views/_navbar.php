<div class="header_div">
        <div class="navbar">
            <a href="/">Accueil</a>
            <a href="/carpools.php">Covoiturages</a>

            <?php
            if ($_SESSION['role'] == "admin") {
                echo "<a href='/admin.php'>Espace administrateur</a>/<a href='/disconnection.php'>Se déconnecter</a>";
            } elseif ($_SESSION['role'] == "employee") {
                echo "<a href='/employee.php'>Espace employé</a>/<a href='/disconnection.php'>Se déconnecter</a>";
            } elseif ($_SESSION['role'] == "user") {
                echo "<a href='/user.php'>Espace utilisateur</a>/<a href='/disconnection.php'>Se déconnecter</a>";
            } else {
                echo "
                    <a href='/login.php'>Connexion</a>/<a href='/signup.php'>Inscription</a>";
            }
            ?>

            <a href="mailto:contact@ecoride.com">Contact</a>
        </div>
    </div>
</div>