<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* Style de la NavBar */
.navBar {
    position: fixed;
    top: 0;
    width: 100%;
    height: 120px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.navBar img{
    margin-right: 60%;
    width: 10%;
    margin-top: -10%;
}

.navBar h3 {
    margin: 0 20px;
    font-size: 1.2em;
    color: white; /* Texte blanc pour contraste */
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    cursor: pointer;
    transition: transform 0.3s ease, color 0.3s ease;
    position: relative;
    font-family: 'Lato', sans-serif;
    

}

/* Effet de vague au survol */
.navBar h3:hover {
    color: #ffd700; 
    transform: translateY(-5px); 
}

/* Ajout d'un effet ondulé sous les éléments */
.navBar h3::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -5px;
    width: 100%;
    height: 3px;
    background: linear-gradient(to right, #ffd700, transparent);
    opacity: 0;
    transform: scaleX(0);
    transform-origin: left;
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.navBar h3:hover::after {
    opacity: 1;
    transform: scaleX(1);
}

@media (max-width: 768px) {
    .navBar {
        height: 50px;
    }

    .navBar h3 {
        font-size: 1em;
        margin: 0 10px;
    }
}

    </style>
</head>
<body>
<img src="https://i.ibb.co/xY2Yjpf/logo.png" alt="logo" />    

    <div class="navBar">
         <a href="../index.php"><h3>Accueil</h3></a>
        <a href="../view/index.php"><h3>Quizz</h3></a>
        <a href="../login.php"><h3 >Espace Connexion</h3></a>
        <a href="../PageCredit.php"><h3 >Crédits</h3></a>
    </div>
</body>
</html>