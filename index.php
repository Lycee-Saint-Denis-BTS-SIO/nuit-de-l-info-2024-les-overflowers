<?php
session_start();
// appelle du header

//function qui verifie si il a bien une session Id.


// verifSession();
//si il n'y a pas de page = alors page est nul (renvoie au default du switch case)
if(!isset($_GET['page'])) $_GET['page'] = '';

//appelle des différentes pages
switch ($_GET['page'])
{
    default:
        require 'templates/login.php';
        require 'models/login.php';
    break;

    case "cookie.php":
        require 'templates/cookie.php';
        require 'models/cookie.php';
    break;

   
}

// appelle du footer
?>