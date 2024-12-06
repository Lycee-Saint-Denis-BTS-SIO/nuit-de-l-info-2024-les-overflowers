<?php
session_start();
if (empty($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

include '../connection.php'; 


$query = $bdd->prepare("SELECT q.id AS question_id, q.lib AS question, r.id AS reponse_id, r.lib AS reponse, r.estVraie 
                        FROM questions q 
                        JOIN reponses r ON q.id = r.question_id");
$query->execute();
$data = $query->fetchAll(PDO::FETCH_ASSOC);


$questions = [];
foreach ($data as $row) {
    $questions[$row['question_id']]['lib'] = $row['question'];
    $questions[$row['question_id']]['reponses'][] = [
        'id' => $row['reponse_id'],
        'lib' => $row['reponse'],
        'estVraie' => $row['estVraie']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <h1>Bienvenue <?= htmlspecialchars($_SESSION['user']) ?></h1>
    <h2>Votre score actuel : <?= $_SESSION['scoreUser'] ?></h2>

    <form method="POST" action="process.php">
        <?php foreach ($questions as $questionId => $question): ?>
            <div class="question_container">
                <h2><?= htmlspecialchars($question['lib']) ?></h2>
                <div class="reponse_container">
                    <?php foreach ($question['reponses'] as $reponse): ?>
                        <label>
                            <input type="radio" name="question_<?= $questionId ?>" value="<?= $reponse['id'] ?>">
                            <?= htmlspecialchars($reponse['lib']) ?>
                        </label>
                        <br>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit">Soumettre</button>
    </form>
</body>
</html>

