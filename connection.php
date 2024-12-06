<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include 'bdd.php';
session_start(); 

if (isset($_POST['name'], $_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sqlQuerySelect = $bdd->prepare('SELECT * FROM users WHERE login = :name');
    $sqlQuerySelect->execute(array('name' => $name));
    $user = $sqlQuerySelect->fetch();

    if ($user) {
        if (hash('sha256', $password) == $user['password']) {
            $_SESSION['user'] = $user['login'];
            $_SESSION['scoreUser'] = $user['score'];

            header('Location: view/index.php');
            exit();
        } else {
            echo 'Mot de passe incorrect.';
            header('Location: login.php');
            exit();
        }
    } else {
        $sqlQueryAdd = $bdd->prepare('INSERT INTO users (login, password, score) VALUES (:name, :password, 0)');
        $sqlQueryAdd->execute(array('name' => $name, 'password' => hash('sha256', $password)));
        $_SESSION['user'] = $name;
        $_SESSION['scoreUser'] = 0;

        header('Location: index.php');
        exit();
    }
}

echo $_SESSION['user'];
echo $_SESSION['scoreUser'];
?>
