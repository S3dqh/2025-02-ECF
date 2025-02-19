<?php

if (isset($_POST['carpool_search_form_submit'])) {
    // Informations sur le départ
    if ((isset($_POST['departure_place'])) && (!empty($_POST['departure_place']))) {
        echo "Lieu de départ choisi : " . $_POST['departure_place'] . "<br>";
    }
    if ((isset($_POST['departure_date'])) && (!empty($_POST['departure_date']))) {
        echo "Date de départ choisie : " . $_POST['departure_date'] . "<br>";
    }
    if ((isset($_POST['departure_time'])) && (!empty($_POST['departure_time']))) {
        echo "Heure de départ choisie : " . $_POST['departure_time'] . "<br>";
    }
    // Informations sur l'arrivée
    if ((isset($_POST['arrival_place'])) && (!empty($_POST['arrival_place']))) {
        echo "Lieu d'arrivée choisi : " . $_POST['arrival_place'] . "<br>";
    }
    if ((isset($_POST['arrival_date'])) && (!empty($_POST['arrival_date']))) {
        echo "Date d'arrivée choisie : " . $_POST['arrival_date'] . "<br>";
    }
    if ((isset($_POST['arrival_time'])) && (!empty($_POST['arrival_time']))) {
        echo "Heure d'arrivée choisie : " . $_POST['arrival_time'] . "<br>";
    }
    exit();
}

?>

<div id="search_form">
    <p>Chercher un trajet :</p>
    <form action="" method="POST">
        <section class="search_form_container">
            <div class="search_form_div">
                <legend><u>Départ</u></legend>
                <br>
                <label for="departure_place">Lieu : </label>
                <input type="text" id="departure_place" name="departure_place" /> <!-- "location" ou "place" ? -->
                <br><br>
                <label for="departure_date">Date : </label>
                <input type="text" id="departure_date" name="departure_date" />
                <br><br>
                <label for="departure_time">Heure : </label>
                <input type="text" id="departure_time" name="departure_time" />
                <br><br>
            </div>

            <div class="search_form_div">
                <legend><u>Arrivée</u></legend>
                <br>
                <label for="arrival_place">Lieu : </label>
                <input type="text" id="arrival_place" name="arrival_place" /> <!-- "location" ou "place" ? -->
                <br><br>
                <label for="arrival_date">Date : </label>
                <input type="text" id="arrival_date" name="arrival_date" />
                <br><br>
                <label for="arrival_time">Heure : </label>
                <input type="text" id="arrival_time" name="arrival_time" />
                <br><br>
            </div>
        </section>


        <input type="submit" name="carpool_search_form_submit" value="Chercher" />
    </form>
</div>