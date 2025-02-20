<?php

class Carpool {
    private string $departure_date;
    private string $departure_time;
    private string $departure_place;
    private string $arrival_date;
    private string $arrival_time;
    private string $arrival_place;
    private bool $status;
    private int $number_of_places;
    private float $price_of_a_place;

    // Getters
    public function getDepartureDate(): string {
        return $this->departure_date;
    }
    public function getDepartureTime(): string {
        return $this->departure_time;
    }
    public function getDeparturePlace(): string {
        return $this->departure_place;
    }
    public function getArrivalDate(): string {
        return $this->arrival_date;
    }
    public function getArrivalTime(): string {
        return $this->arrival_time;
    }
    public function getArrivalPlace(): string {
        return $this->arrival_place;
    }
    public function getStatus(): bool {
        return $this->status;
    }
    public function getNumberOfPlaces(): int {
        return $this->number_of_places;
    }
    public function getPriceOfAPlace(): float {
        return $this->price_of_a_place;
    }

    // Setters
    public function setDepartureDate($departure_date) {
        $this->departure_date = $departure_date;
    }
    public function setDepartureTime($departure_time) {
        $this->departure_time = $departure_time;
    }
    public function setDeparturePlace($departure_place) {
        $this->departure_place = $departure_place;
    }
    public function setArrivalDate($arrival_date) {
        $this->arrival_date = $arrival_date;
    }
    public function setArrivalTime($arrival_time) {
        $this->arrival_time = $arrival_time;
    }
    public function setArrivalPlace($arrival_place) {
        $this->arrival_place = $arrival_place;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setNumberOfPlaces($number_of_places) {
        $this->number_of_places = $number_of_places;
    }
    public function setPriceOfAPlace($price_of_a_place) {
        $this->price_of_a_place = $price_of_a_place;
    }

    // Ajouter le covoiturage à la BDD
    public function addCarpool() {
        try {
            global $pdo;
            $query = "INSERT INTO carpools (
                departure_date,
                departure_time,
                departure_place,
                arrival_date,
                arrival_time,
                arrival_place,
                status,
                number_of_places,
                price_of_a_place
            )
            VALUES (
                '$this->departure_date',
                '$this->departure_time',
                '$this->departure_place',
                '$this->arrival_date',
                '$this->arrival_time',
                '$this->arrival_place',
                '$this->status',
                $this->number_of_places,
                $this->price_of_a_place
            )";
            $statement = $pdo->prepare($query);
            if ($statement->execute()) {
                echo "Le covoiturage a bien été ajouté.";
            } else {
                // Échec ?
            }
        } catch (PDOException $e) {
            echo "Le covoiturage n'a pas pu être ajouté. Merci de rééssayer plus tard.";
            error_log($e->getMessage(), 3, "./errors.log");
        }

    }
}