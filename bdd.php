<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$host = 'mysql-overflowers.alwaysdata.net';
$dbname = 'overflowers_bddnuitinfo';
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", '389492', 'EPanthoIC&', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

