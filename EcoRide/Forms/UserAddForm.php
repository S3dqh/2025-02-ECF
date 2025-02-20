<?php

if (isset($_POST['add_user_submit'])) {

    require_once "EcoRide/Classes/UserClass.php";

    $user = new User();

    $user->setFirstName(strtoupper(htmlspecialchars($_POST['first_name'])));
    $user->setLastName(ucfirst(htmlspecialchars($_POST['last_name'])));
    $user->setEmail(htmlspecialchars($_POST['email']));
    $user->setPassword(password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT));
    $user->setTelephoneNumber(htmlspecialchars($_POST['telephone_number']));
    $user->setAddress(htmlspecialchars($_POST['address']));
    $user->setDateOfBirth(htmlspecialchars($_POST['date_of_birth']));
    $user->setPicture($_FILES['picture']['tmp_name']);
    $user->setPseudo(htmlspecialchars($_POST['pseudo']));
    $user->setCredits((int)htmlspecialchars($_POST['credits']));

    $user->addUser();
}

?>

<div id="user_add_form">
    <p>Créer un compte utilisateur</p>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="last_name">Nom : </label>
        <input type="text" id="last_name" name="last_name" required />
        <br><br>

        <label for="first_name">Prénom : </label>
        <input type="text" id="first_name" name="first_name" required />
        <br><br>

        <label for="email">E-mail : </label>
        <input type="email" id="email" name="email" size="50" placeholder="@" required />
        <br><br>

        <label for="password">Mot de passe : </label>
        <input type="password" id="password" name="password" required />
        <br><br>

        <label for="telephone_number">Téléphone : </label>
        <input type="tel" pattern="[0-9]{10}" placeholder="0xxxxxxxxx" minlength="10" maxlength="10" id="telephone_number" name="telephone_number" required />
        <br><br>
        
        <label for="address">Adresse : </label>
        <textarea id="address" name="address" cols="30" rows="3" required></textarea>
        <br><br>

        <label for="date_of_birth">Date de naissance : </label>
        <input type="date" id="date_of_birth" name="date_of_birth" required />
        <br><br>

        <label for="picture">Photo : </label>
        <input type="file" id="picture" name="picture" required />
        <br><br>

        <label for="pseudo">Pseudo : </label>
        <input type="text" id="pseudo" name="pseudo" />
        <br><br>

        <input type="hidden" id="credits" name="credits" value="20" />
        
        <input type="submit" name="add_user_submit" value="S'inscrire" />
    </form>
</div>