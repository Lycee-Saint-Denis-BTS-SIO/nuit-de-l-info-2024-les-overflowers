<?php 

include 'bdd.php';
connection();
function connection(){
    include 'bdd.php';
    if (isset($_POST['name']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $sqlQuerySelect = $bdd->prepare('SELECT * FROM users WHERE login = :name');
        $sqlQuerySelect->execute(array('name' => $name));
        $user = $sqlQuerySelect->fetch();
        if ($user) {
            if(hash('sha256', $password) == $user['password']){
                $_SESSION['user'] = $user['login'];
                $_SESSION['scoreUser'] = $user['score'];
                header('Location: login.php');
                exit();
            }
            else {
                echo 'Cet utilisateur existe déjà !';
                exit();
            }
        } else {
            $sqlQueryAdd = $bdd->prepare('INSERT INTO users (login, password, score) VALUES (:name, :password, 0)');
            $sqlQueryAdd->execute(array('name' => $name, 'password' => hash('sha256',$password)));
            $_SESSION['user'] = $name;
            $_SESSION['scoreUser'] = 0;
            header('Location: login.php');
            exit();
        }
    }
}