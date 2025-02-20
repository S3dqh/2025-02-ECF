<?php

class User {
    // Déclaration des variables
    private PDO $pdo;
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private string $telephone_number;
    private string $address;
    private string $date_of_birth;
    private string $picture;
    private string $pseudo;
    private int $credits;

    // Getters
    public function getId() {
        if (isset($this->id)) { return $this->id; }
    }
    public function getFirstName(): string {
        return $this->first_name;
    }
    public function getLastName(): string {
        return $this->last_name;
    }
    public function getEmail(): string {
        return $this->email;
    }
    public function getPassword(): string{
        return $this->password;
    }
    public function getTelephoneNumber(): string {
        return $this->telephone_number;
    }
    public function getAddress(): string {
        return $this->address;
    }
    public function getDateOfBirth(): string {
        return $this->date_of_birth;
    }
    public function getPicture() {
        return $this->picture;
    }
    public function getPseudo(): string {
        return $this->pseudo;
    }
    public function getCredits(): int {
        return $this->credits;
    }

    // Setters
    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }
    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setTelephoneNumber($telephone_number) {
        $this->telephone_number = $telephone_number;
    }
    public function setAddress($address) {
        $this->address = $address;
    }
    public function setDateOfBirth($date_of_birth) {
        $this->date_of_birth = $date_of_birth;
    }
    public function setPicture($picture) {
        $this->picture = $picture;
    }
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }
    public function setCredits($credits) {
        $this->credits = $credits;
    }

    // Ajouter un utilisateur
    public function addUser() {
        try {
            global $pdo;
            $this->pdo = $pdo;
            $statement = $this->pdo->prepare("
                INSERT INTO users
                    (first_name, last_name, email, password, telephone_number, address, date_of_birth, picture, pseudo, credits)
                VALUES
                    (:first_name, :last_name, :email, :password, :telephone_number, :address, :date_of_birth, :picture, :pseudo, :credits)
                ");
            $statement->bindValue('first_name', $this->first_name, PDO::PARAM_STR);
            $statement->bindValue('last_name', $this->last_name, PDO::PARAM_STR);
            $statement->bindValue('email', $this->email, PDO::PARAM_STR);
            $statement->bindValue('password', $this->password, PDO::PARAM_STR);
            $statement->bindValue('telephone_number', $this->telephone_number, PDO::PARAM_STR);
            $statement->bindValue('address', $this->address, PDO::PARAM_STR);
            $statement->bindValue('date_of_birth', $this->date_of_birth, PDO::PARAM_STR);
            $statement->bindValue('picture', $this->picture, PDO::PARAM_STR);
            $statement->bindValue('pseudo', $this->pseudo, PDO::PARAM_STR);
            $statement->bindValue('credits', $this->credits, PDO::PARAM_STR);
            if ($statement->execute()) {
                echo "Inscription réussie.";
                $_SESSION['username'] = $this->email; // Raccourci à revoir;
                header("Location: " . HOME_PAGE);
                exit;

            } else {
                echo "Une erreur est survenue. Merci de rééssayer.";
            }
        } catch (PDOException $e) {
            echo "Le covoiturage n'a pas pu être ajouté. Merci de rééssayer plus tard.";
            error_log($e->getMessage(), 3, "./errors.log");
        }
    }
}