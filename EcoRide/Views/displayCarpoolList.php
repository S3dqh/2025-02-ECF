<?php

/* Afficheur des covoiturages */
function displayCarpoolList(array $carpool_array) {
    // Ouverture d'un tableau
    echo "<table class='carpool_table'>";
    // Affichage première ligne (en-tête)
    echo "
        <tr class='carpool_table'>
            <th class='carpool_table'>Date de départ</td>
            <th class='carpool_table'>Heure de départ</td>
            <th class='carpool_table'>Lieu de départ</td>
            <th class='carpool_table'>Date d'arrivée</td>
            <th class='carpool_table'>Heure d'arrivée</td>
            <th class='carpool_table'>Lieu d'arrivée</td>
            <th class='carpool_table'>Statut</td>
            <th class='carpool_table'>Nombre de places restantes</td>
            <th class='carpool_table'>Prix de la place</td>
            <th class='carpool_table'></td>
        </tr>";
    // Affichage du contenu
    foreach ($carpool_array AS $carpool) {
        echo "<tr class='carpool_table'>";
        echo "<td class='carpool_table'>" . $carpool->getDepartureDate() . "</td>";
        echo "<td class='carpool_table'>" . $carpool->getDepartureTime() . "</td>";
        echo "<td class='carpool_table'>" . $carpool->getDeparturePlace() . "</td>";
        echo "<td class='carpool_table'>" . $carpool->getArrivalDate() . "</td>";
        echo "<td class='carpool_table'>" . $carpool->getArrivalTime() . "</td>";
        echo "<td class='carpool_table'>" . $carpool->getArrivalPlace() . "</td>";
        echo "<td class='carpool_table'>" . $carpool->getStatus() . "</td>";
        echo "<td class='carpool_table'>" . $carpool->getNumberOfPlaces() . "</td>";
        echo "<td class='carpool_table'>" . $carpool->getPriceOfAPlace() . "</td>";
        echo "<td class='carpool_table'>
        <label for='carpool_join'>
        <input type='button' id='carpool_join' name='' value='Rejoindre' />
        </label>";
        echo "</tr>";
    }
    // Fermeture du tableau
    echo "</table>";
}