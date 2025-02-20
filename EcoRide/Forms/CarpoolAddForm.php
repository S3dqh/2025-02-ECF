<?php

// Récupération des données postées + affichage (temp)
if ((isset($_POST['carpool_add_submit'])) && (!empty($_POST['carpool_add_submit']))) {
    if ((!isset($_POST['departure_date'])) || (empty($_POST['departure_date']))) {
        echo "Date de départ manquante. <br>";
    }
    if ((!isset($_POST['departure_time'])) || (empty($_POST['departure_time']))) {
        echo "Heure de départ manquante. <br>";
    }
    if ((!isset($_POST['departure_place'])) || (empty($_POST['departure_place']))) {
        echo "Lieu de départ manquant. <br>";
    }
    if ((!isset($_POST['arrival_date'])) || (empty($_POST['arrival_date']))) {
        echo "Date d'arrivée manquante. <br>";
    }
    if ((!isset($_POST['arrival_time'])) || (empty($_POST['arrival_time']))) {
        echo "Heure d'arrivée manquante. <br>";
    }
    if ((!isset($_POST['arrival_place'])) || (empty($_POST['arrival_place']))) {
        echo "Lieu d'arrivée manquant. <br>";
    }
    if ((!isset($_POST['number_of_places'])) || (empty($_POST['number_of_places']))) {
        echo "Nombre de places manquant. <br>";
    }
    if ((!isset($_POST['price_of_a_place'])) || (empty($_POST['price_of_a_place']))) {
        echo "Prix de la place manquant. <br>";
    }
    // Ajout du covoiturage à la BDD
    else {
        require_once "EcoRide/Classes/CarpoolClass.php";

        $new_carpool = new Carpool();

        $new_carpool->setDepartureDate(htmlspecialchars($_POST['departure_date']));
        $new_carpool->setDepartureTime(htmlspecialchars($_POST['departure_time']));
        $new_carpool->setDeparturePlace(htmlspecialchars($_POST['departure_place']));
        $new_carpool->setArrivalDate(htmlspecialchars($_POST['arrival_date']));
        $new_carpool->setArrivalTime(htmlspecialchars($_POST['arrival_time']));
        $new_carpool->setArrivalPlace(htmlspecialchars($_POST['arrival_place']));
        $new_carpool->setStatus(false);
        $new_carpool->setNumberOfPlaces((int) htmlspecialchars($_POST['number_of_places']));
        $new_carpool->setPriceOfAPlace(htmlspecialchars($_POST['price_of_a_place']));

        $new_carpool->addCarpool();
    }
    exit;
}

?>

<!-- Formulaire d'ajout d'un covoiturage -->
<div id="carpool_add_container">

    <p>Proposer un trajet</p>
    <form id="carpool_add_form" action="" method="POST">

        <div class="carpool_add_form_column">
                <legend>Départ</legend>
                <br>

                <label for="departure_date">Date : </label>
                <input type="date" name="departure_date" id="departure_date" required />
                <br><br>

                <label for="departure_time">Heure : </label>
                <input type="time" name="departure_time" id="departure_time" required />
                <br><br>

                <label for="departure_place">Lieu : </label>
                <input type="text" name="departure_place" id="departure_place" required />
        </div>

        <div class="carpool_add_form_column">
                <legend>Arrivée</legend>
                <br>

                <label for="arrival_date">Date : </label>
                <input type="date" name="arrival_date" id="arrival_date" required />
                <br><br>

                <label for="arrival_time">Heure : </label>
                <input type="time" name="arrival_time" id="arrival_time" required />
                <br><br>

                <label for="arrival_place">Lieu : </label>
                <input type="text" name="arrival_place" id="arrival_place" required />
        </div>

        <div class="carpool_add_form_column">
                <label for="number_of_places">Nombre de places disponibles : </label>
                <select id="number_of_places" name="number_of_places">
                    <option value="1_place">1</option>
                    <option value="1_place">2</option>
                    <option value="1_place">3</option>
                    <option value="1_place">4</option>
                    <option value="1_place">5</option>
                    <option value="1_place">6</option>
                    <option value="1_place">7</option>
                </select>
                <br><br>

                <label for="price_of_a_place">Prix de la place (en €) : </label>
                <input type="number" min="0.1" max="1000.00" step="0.1" name="price_of_a_place" id="price_of_a_place" />
        </div>

        <div class="carpool_add_form_button">
                <label for="carpool_add_submit"></label>
                <input type="submit" name="carpool_add_submit" id="carpool_add_submit" value="Proposer" />
        </div>
    </form>
</div>
