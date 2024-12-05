<?php
$host = 'localhost';
$dbname = 'bddnuitinfo';
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>