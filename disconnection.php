<?php

require_once "EcoRide/Views/_head.php";
require_once "EcoRide/Views/_header.php";

$_SESSION['username'] = "";
$_SESSION['role'] = "visitor";
header("Location: " . HOME_PAGE);
exit;