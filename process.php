<?php
session_start();
if (empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include 'connection.php'; 

$responses = $_POST;
$scoreIncrement = 10;
$totalScore = 0;

foreach ($responses as $questionKey => $reponseId) {
    $query = $bdd->prepare("SELECT estVraie FROM reponses WHERE id = :id");
    $query->execute(['id' => $reponseId]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['estVraie']) {
        $totalScore += $scoreIncrement;
    }
}

$_SESSION['scoreUser'] += $totalScore;

$updateQuery = $bdd->prepare("UPDATE users SET score = :score WHERE login = :login");
$updateQuery->execute([
    'score' => $_SESSION['scoreUser'],
    'login' => $_SESSION['user']
]);

header("Location: index.php?success=1");
exit();
?>
