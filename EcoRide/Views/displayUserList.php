<?php

/* Afficheur des utilisateurs */
function displayUserList(array $user_array) {
    // Ouverture d'un tableau
    echo "<table class='user_table'>";
    // Affichage première ligne (en-tête)
    echo "
        <tr class='user_table'>
            <th class='user_table'>Id</td>
            <th class='user_table'>Nom</td>
            <th class='user_table'>Prénom</td>
            <th class='user_table'>E-mail</td>
            <th class='user_table'>Téléphone</td>
            <th class='user_table'>Adresse</td>
            <th class='user_table'>Date de naissance</td>
            <th class='user_table'>Photo</td>
            <th class='user_table'>Pseudo</td>
            <th class='user_table'>Crédits</td>
        </tr>";
    // Affichage du contenu
    foreach ($user_array AS $user) {
        echo "<tr class='user_table'>";
        echo "<td class='user_table'>" . $user->getId() . "</td>";
        echo "<td class='user_table'>" . $user->getFirstName() . "</td>";
        echo "<td class='user_table'>" . $user->getLastName() . "</td>";
        echo "<td class='user_table'>" . $user->getEmail() . "</td>";
        echo "<td class='user_table'>" . $user->getTelephoneNumber() . "</td>";
        echo "<td class='user_table'>" . $user->getAddress() . "</td>";
        echo "<td class='user_table'>" . $user->getDateOfBirth() . "</td>";
        echo "<td class='user_table'>" . $user->getPicture() . "</td>";
        echo "<td class='user_table'>" . $user->getPseudo() . "</td>";
        echo "<td class='user_table'>" . $user->getCredits() . "</td>";
        echo "</tr>";
    }
    // Fermeture du tableau
    echo "</table>";
}