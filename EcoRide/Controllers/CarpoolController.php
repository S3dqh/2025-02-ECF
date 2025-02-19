<?php

// Données de connexion PDO
$dsn = 'mysql:host=localhost;dbname=ecoride';
$username = 'root';
$password = '';

// Initialisation d'un objet PDO
$pdo = new PDO($dsn, $username, $password);

// Initialisation d'un gestionnaire des covoiturages
$carpool_controller = new CarpoolController($pdo);

// Contrôleur des covoiturages
class CarpoolController {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function getCarpoolList(array $args = []) {

        /* TEMP requête avec simple query
        $statement = $this->pdo->query($query);
        $data = $statement->fetchAll();
        if ($data) {
            foreach ($data AS $item) {
                var_dump($item);
                echo "<br>";
            }
            exit;
        }
        */

        /* TEMP requête préparée
        $query = "SELECT * FROM carpools WHERE departure_place = :departure_place";
        echo $query;
        $statement = $this->pdo->prepare($query);
        $departure_place = 'angers';
        $statement->bindParam(':departure_place', $departure_place);
        $statement->execute();
        $data = $statement->fetchAll();
        var_dump($data);
        exit;
        */

        // Recherche de base
        $query = "SELECT * FROM carpools";

        // Recherche argumentée
        // Écriture de la requête

        /* À revoir */
        if (!empty($args)) {
            $query .= " WHERE ";
            $need_and = 0;
            if (isset($args['departure_date'])) {
                $query .= "departure_date = :departure_date";
                $need_and = 1;
            }
            if (isset($args['departure_place'])) {
                if ($need_and == 1) {
                    $query .= " AND ";
                }
                $query .= "departure_place = :departure_place";
            }
            if (isset($args['arrival_place'])) {
                if ($need_and == 1) {
                    $query .= " AND ";
                }
                $query .= "arrival_place = :arrival_place";
            }
        }
        $statement = $this->pdo->prepare($query);
        /* */

        /*
        $query = "SELECT * FROM carpools WHERE departure_date = :departure_date AND departure_place = :departure_place AND arrival_place = :arrival_place";
        $statement = $this->pdo->prepare($query);
        $departure_date = "0000-00-00";
        $departure_place = "angers";
        $arrival_place = "paris";
        $statement->bindParam(':departure_date', $departure_date, PDO::PARAM_STR);
        $statement->bindParam(':departure_place', $departure_place, PDO::PARAM_STR);
        $statement->bindParam(':arrival_place', $arrival_place, PDO::PARAM_STR);
        */

        // Association des paramètres de la requête
        // /!\ Répétition de code !!! -> à revoir

        /* À revoir */
        if (!empty($args)) {
            if (isset($args['departure_date'])) {
                $statement->bindParam(':departure_date', $args['departure_date'], PDO::PARAM_STR);
            }
            if (isset($args['departure_place'])) {
                $statement->bindParam(':departure_place', $args['departure_place'], PDO::PARAM_STR);
            }
            if (isset($args['arrival_place'])) {
                $statement->bindParam(':arrival_place', $args['arrival_place'], PDO::PARAM_STR);
            }
        }
        /* */

        // Exécution de requête

        /* */
        require_once "ecoride/classes/CarpoolClass.php";
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Carpool');
        /* */

        /* */
        $statement->execute();
        $data = $statement->fetchAll();
        if ($data) {
            foreach ($data AS $carpool) {
                $carpool_array[] = $carpool;
            }
            if (isset($carpool_array)) {
                require_once "ecoride/views/displayCarpoolList.php";
                displayCarpoolList($carpool_array) ;
            }
        }
        /* */
    }
}

// Récupération des données du formulaire de recherche d'un covoiturage
$args = [];
if (!empty($departure_date)) { $args['departure_date'] = $departure_date; }
if (!empty($departure_place)) { $args['departure_place'] = $departure_place; }
if (!empty($arrival_place)) { $args['arrival_place'] = $arrival_place; }
$carpool_controller->getCarpoolList($args);