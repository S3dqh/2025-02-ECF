<?php

// Données de connexion PDO
$host = "localhost";
$dbname = "ecoride";
$dsn = "mysql:host=$host;dbname=$dbname";
$username = "root";
$password = "";

// Initialisation d'un objet PDO
$pdo = new PDO($dsn, $username, $password);