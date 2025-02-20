<?php

// HEAD
require_once "EcoRide/Views/_head.php";

//BODY

//HEADER
define("HEADER_CONTENT", "Espace administrateur");
require_once "ecoride/views/_header.php";

// MAIN
define("MAIN_CONTENT", "EcoRide/Controllers/UserController.php");
require_once "ecoride/views/_main.php";

// FOOTER
require_once "ecoride/views/_footer.php";