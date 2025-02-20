<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="ecoride/assets/styles.css">
    <title>EcoRide, mieux covoiturer pour protéger notre environnement.</title>
</head>

<body>
    <section class="container">

<?php

// PDO
require_once "_pdo.php";

// CONSTANTES
define("HOME_PAGE", "http://localhost:8000/");

// SESSION
session_start();
if (isset($_SESSION['username'])) {
    $query = "SELECT role FROM users WHERE email = '" . $_SESSION['username'] . "'";
    $statement = $pdo->query($query);
    $role = $statement->fetchColumn();
    if ($role) { $_SESSION['role'] = $role; }
}

if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = "visitor";
}

?>