<?php

// Connexion à la base de données

$dsn = 'mysql:host=localhost;dbname=ecoride';
$username = 'root';
$password = '';
$pdo = new PDO($dsn,$username,$password);

/* TEST - Récupérer les données de la table 'users'

$query = "SELECT * FROM users";

$data = $pdo->query($query, PDO::FETCH_ASSOC);
foreach ($data->fetchAll() as $item) {
    var_dump($item);
}

*/

