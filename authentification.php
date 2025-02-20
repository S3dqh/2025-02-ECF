<?php

if (isset($_POST['login_submit'])) {
    // Vérifications à ajouter !!!
    if (
        (isset($_POST['username'])) &&
        (!empty($_POST['username'])) &&
        (isset($_POST['password'])) &&
        (!empty($_POST['password']))
    ) {
        // Récupération des données username et password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Requête PDO
        try {
            global $pdo;
            $query = "SELECT password FROM users WHERE email = '{$username}'";
            $statement = $pdo->query($query);
            $data = $statement->fetch();
            if ($data) {
                if (password_verify($password, $data['password'])) {
                    $_SESSION['username'] = $username;
                    header("Location: " . HOME_PAGE);
                    exit;
                }
                else {
                    echo "Mot de passe incorrect.<br><br>";
                }
            } else {
                echo "Identifiant inconnu.<br><br>";
            }
        } catch (PDOException $e) {
            echo "Une erreur est survenue.";
            error_log($e->getMessage(), 3, "./errors.log");
        }
    } 
}

?>