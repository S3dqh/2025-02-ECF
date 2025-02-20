<?php

// Initialisation d'un gestionnaire des utilisateurs
$user_controller = new UserController($pdo);

// Contrôleur des utilisateurs
class UserController {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function getUserList() {
        $statement = $this->pdo->prepare("SELECT * FROM users");
        require_once "ecoride/classes/UserClass.php";
        $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
        if ($statement->execute()) {
            while ($user = $statement->fetch()) {
                $user_array[] = $user;
            }
            if ($user_array) {
                require_once "ecoride/views/displayUserList.php";
                displayUserList($user_array) ;
            }
        }
    }
}

$user_controller->getUserList();