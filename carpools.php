<?php

require_once "EcoRide/Views/_head.php";
define("HEADER_CONTENT", "Covoiturages");
require_once "EcoRide/Views/_header.php";

// Récupération des variables postées (search_form) + affichage (temp)
if (
    (isset($_POST['carpool_search_form_submit'])) &&
    (
        (!empty($_POST['departure_place'])) ||
        (!empty($_POST['departure_date'])) ||
        (!empty($_POST['arrival_place']))
    )
    ) {
    // Récupération des variables postées
    if ((isset($_POST['departure_place'])) && (!empty($_POST['departure_place']))) {
            $departure_place = htmlspecialchars($_POST['departure_place']);
    }
    if ((isset($_POST['departure_date'])) && (!empty($_POST['departure_date']))) {
        $departure_date = htmlspecialchars($_POST['departure_date']);
    }
    if ((isset($_POST['arrival_place'])) && (!empty($_POST['arrival_place']))) {
        $arrival_place = htmlspecialchars($_POST['arrival_place']);
    }
    define("MAIN_CONTENT", "EcoRide/Controllers/CarpoolController.php");
}
else {
    if ((isset($_SESSION['role'])) &&
    (
        ($_SESSION['role'] == "user") ||
        ($_SESSION['role'] == "employee") ||
        ($_SESSION['role'] == "admin")
    )) {
        define("MAIN_CONTENT", "EcoRide/Forms/CarpoolSearchForm.php|EcoRide/Forms/CarpoolAddForm.php");
    } else {
        define("MAIN_CONTENT", "EcoRide/Forms/CarpoolSearchForm.php");
    }
}

require_once "EcoRide/Views/_main.php";
require_once "EcoRide/Views/_footer.php";