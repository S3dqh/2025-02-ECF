<body>

<?php

// PDO
require_once "_pdo.php";

// CONSTANTES
define("HOME_PAGE", "http://localhost:8000/");

// SESSION
session_start();
if (isset($_SESSION['username'])) {
    echo "Vous êtes connecté en tant que : " . $_SESSION['username'] . "<br>";
    $query = "SELECT role FROM users WHERE email = '" . $_SESSION['username'] . "'";
    $statement = $pdo->query($query);
    $role = $statement->fetchColumn();
    if ($role) { $_SESSION['role'] = $role; }
}

if (!isset($_SESSION['role'])) {
    $_SESSION['role'] == "visitor";
}
echo "Vous êtes connecté en tant que : " . $_SESSION['role'];
// $_SESSION['role'] = ""; // Forcer $_SESSION['role']

?>

<div class="header">
    <div class="header_div">
        <img id="header_logo" src="ecoride/assets/images/image1.jpg" />
    </div>
    <div class="header_div">
        <?php if (defined("HEADER_CONTENT")) { echo HEADER_CONTENT; } ?>
    </div>

<?php require_once "EcoRide/Views/_navbar.php"; ?>