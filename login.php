<?php
session_start();
$_SESSION['user'] = '';
$_SESSION['scoreUser'] = '';
include 'connection.php';
include 'navigation/nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Style global */
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(to bottom, #1e3c72, #2a5298); /* Dégradé océan */
    overflow: hidden;
    color: white;
}

/* Effet de vagues */
@keyframes waves {
    0% {
        background-position-x: 0;
    }
    100% {
        background-position-x: 1000px;
    }
}

body::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 200%;
    height: 200%;
    background: url('https://i.imgur.com/91V24Se.png') repeat-x; /* Texture vague */
    opacity: 0.3;
    animation: waves 10s linear infinite;
    pointer-events: none;
    z-index: -1;
    transform: scale(1.5);
}

/* Formulaire */
form {
    background: rgba(255, 255, 255, 0.1); /* Fond transparent */
    border: 2px solid rgba(255, 255, 255, 0.3); /* Bordures subtiles */
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Ombre douce */
    padding: 20px;
    text-align: center;
    width: 300px;
    margin: 10px;
}

/* Champs de texte */
input[type="text"], input[type="password"] {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    outline: none;
    background: rgba(255, 255, 255, 0.8); /* Fond clair */
    font-size: 16px;
    color: #2a5298;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Effet sur les champs */
input[type="text"]:focus, input[type="password"]:focus {
    transform: scale(1.05); /* Zoom léger */
    box-shadow: 0 0 15px #00bcd4; /* Lumière autour */
}

/* Boutons */
input[type="submit"] {
    width: 90%;
    padding: 10px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    background: #00bcd4; /* Couleur océan */
    color: white;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.3s ease;
}

input[type="submit"]:hover {
    background: #008ba3; /* Couleur plus foncée au survol */
    transform: scale(1.05);
}

/* Déconnexion bouton */
input[name="deconnection"] {
    background: #ff7043; /* Couleur orangée */
}

input[name="deconnection"]:hover {
    background: #e64a19;
}

/* Responsiveness */
@media (max-width: 400px) {
    form {
        width: 90%;
    }
}

    </style>
</head>
<body>
    <h2>Espace Connexion</h2>
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