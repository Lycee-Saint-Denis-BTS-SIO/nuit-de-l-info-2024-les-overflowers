<?php
session_start();
$_SESSION['user'] = '';
$_SESSION['scoreUser'] = '';
include 'connection.php';
var_dump($_SESSION);
echo 'user : ' . $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="connection.php" method="post">
        <input type="text" name="name" placeholder="Nom d'utilisateur">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" name="connection" value="Connexion">
    </form>
    <form action="deconnection.php" method="post">
        <input type="submit" name="deconnection" value="Déconnexion">
    </form>
</body>
</html>