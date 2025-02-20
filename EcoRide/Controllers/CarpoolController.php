<?php

// Initialisation d'un gestionnaire des covoiturages
$carpool_controller = new CarpoolController($pdo);

// Contrôleur des covoiturages
class CarpoolController {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function getCarpoolList(array $args = []) {
        try {
            // Requête de base
            $query = "SELECT * FROM carpools";

            // Argumentation de la requête
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

            // Exécution de requête
            require_once "ecoride/classes/CarpoolClass.php";
            $statement->setFetchMode(PDO::FETCH_CLASS, 'Carpool');
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
            else {
                echo "Aucun covoiturage ne correspond à cette recherche.";
                echo "<a href='carpools.php'>Faire une nouvelle recherche</a>";
            }
        } catch (PDOException $e) {
            echo "Impossible de récupérer la liste des covoiturages.";
            error_log($e->getMessage(), 3, "./errors.log");
        }
    }
}

// Récupération des données du formulaire de recherche d'un covoiturage
$args = [];
if (!empty($departure_date)) { $args['departure_date'] = $departure_date; }
if (!empty($departure_place)) { $args['departure_place'] = $departure_place; }
if (!empty($arrival_place)) { $args['arrival_place'] = $arrival_place; }
$carpool_controller->getCarpoolList($args);