<?php
require_once "authentification.php";
?>

<form action="" method="POST">
    <fieldset class="login_form">
        <legend>Se connecter</legend>

        <label for="username">Nom d'utilisateur : </label>
        <input type="text" id="username" name="username" required />
        <br><br>

        <label for="password">Mot de passe : </label>
        <input type="password" id="password" name="password" required />
        <br><br>

        <input class="login_form" type="submit" name="login_submit" value="Se connecter">
        <br><br>

        <!-- Fonctionnalité "Mot de passe oublié ?" à ajouter ?
        <a class="login_form" href="">Mot de passe oublié ?</a>
        &nbsp;-&nbsp;
        -->
        <a class="login_form" href="/signup.php">Pas encore de compte ?</a>
    </fieldset>
</form>