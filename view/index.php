<?php
session_start();
include '../bdd.php';
include '../navigation/nav.php';

if (!isset($_SESSION['user'])) {
    // Redirection vers la page de login si l'utilisateur n'est pas connecté
    header('Location: ../login.php');
    exit();
}

// Initialisation des variables
$message = "";
$hasAnswered = isset($_SESSION['quizCompleted']) && $_SESSION['quizCompleted'];

// Récupération des questions et réponses depuis la base de données
try {
    // Préparer et exécuter la requête pour récupérer les questions et leurs réponses
    $query = $bdd->prepare("
        SELECT q.idQuestion, q.question, a.idAnwser, a.lib, a.estVraie
        FROM question q
        LEFT JOIN anwser a ON q.idQuestion = a.idQuestion
        ORDER BY q.idQuestion, a.idAnwser
    ");
    $query->execute();

    // Organisation des données dans un tableau associatif
    $questions = [];
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $idQuestion = $row['idQuestion'];
        if (!isset($questions[$idQuestion])) {
            $questions[$idQuestion] = [
                'question' => $row['question'],
                'answers' => []
            ];
        }
        $questions[$idQuestion]['answers'][] = [
            'idAnwser' => $row['idAnwser'],
            'lib' => $row['lib'],
            'estVraie' => $row['estVraie']
        ];
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Traitement des réponses soumises par l'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'submit_quiz') {
    $score = 0;

    foreach ($_POST as $idQuestion => $idAnwser) {
        if ($idQuestion === 'action') continue;

        // Vérifier si la réponse sélectionnée est correcte
        $query = $bdd->prepare("
            SELECT estVraie
            FROM anwser
            WHERE idAnwser = :idAnwser
        ");
        $query->execute(['idAnwser' => $idAnwser]);
        $isCorrect = $query->fetchColumn();

        if ($isCorrect) {
            $score++;
        }
    }

    // Mise à jour du score de l'utilisateur en base de données
    $query = $bdd->prepare("
        UPDATE users
        SET score = :score
        WHERE login = :login
    ");
    $query->execute(['score' => $score, 'login' => $_SESSION['user']]);

    $_SESSION['scoreUser'] = $score;
    $_SESSION['quizCompleted'] = true; // Marquer le quiz comme complété
    $message = "Votre score est de $score.";
}

// Réinitialisation du quiz
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'reset_quiz') {
    unset($_SESSION['quizCompleted']); // Supprimer l'indicateur de quiz terminé
    $message = "";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="quizz.css" rel="stylesheet">
    <title>Quiz</title>
</head>
<body>
    <h1>Bienvenue !</h1> <!--<?php htmlspecialchars($_SESSION['user']); ?> -->
    <!-- <p>Score actuel : <?php $_SESSION['scoreUser']; ?></p> -->

    <?php if (!empty($message)): ?>
        <p><?= htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <?php if (!$hasAnswered): ?>
        <!-- Affichage du quiz -->
        <form method="post" action="index.php">
            <?php foreach ($questions as $idQuestion => $data): ?>
                <fieldset>
                    <legend><?= htmlspecialchars($data['question']); ?></legend>
                    <?php foreach ($data['answers'] as $answer): ?>
                        <label>
                            <input type="radio" name="<?= $idQuestion; ?>" value="<?= $answer['idAnwser']; ?>" required>
                            <?= htmlspecialchars($answer['lib']); ?>
                        </label><br>
                    <?php endforeach; ?>
                </fieldset>
            <?php endforeach; ?>

            <button class="bouton_envoyer" type="submit" name="action" value="submit_quiz">Envoyer mes réponses</button>
        </form>
    <?php else: ?>
        <!-- Affichage du bouton Réessayer -->
        <form method="post" action="index.php">
            <button class="bouton_retry" type="submit" name="action" value="reset_quiz">Réessayer</button>
        </form>
    <?php endif; ?>

    <form action="deconnection.php" method="post">
        <button class="bouton_deconnexion" type="submit">Déconnexion</button>
    </form>
</body>
</html>
