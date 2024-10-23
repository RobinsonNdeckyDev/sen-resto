<?php

session_start();
require_once "../config/config.php";

if (!$pdo) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

// Vérification des champs du formulaire
if (
    !isset($_POST['user_id'], $_POST['recipe_id'], $_POST['comment']) ||
    !is_numeric($_POST['user_id']) ||
    empty(trim(strip_tags($_POST['comment'])))
) {

    echo "Il manque des informations pour ajouter le commentaire. Veuillez vérifier le formulaire.";
    var_dump($_POST); // Affiche le contenu de $_POST pour débogage
    exit;
}

// Récupération et nettoyage des données du formulaire
$userId = $_POST['user_id'];
$recipeId = $_POST['recipe_id'];
$comment = trim(strip_tags($_POST['comment']));

// Insertion du commentaire dans la base de données
$requete = $pdo->prepare("INSERT INTO comments(comment, recipe_id, user_id) VALUES(:comment, :recipe_id, :user_id)");

// Exécution de la requête avec les valeurs nettoyées
$commentAddedSuccessfully = $requete->execute([
    'comment' => $comment,
    'recipe_id' => $recipeId,
    'user_id' => $userId
]);

if ($commentAddedSuccessfully) {
    // Redirige vers la page de détails de la recette avec un paramètre de succès
    header("Location: detailRecette.php?id=" . $_POST['recipe_id'] . "&toast=success");
    exit;
} else {
    // Gérer l'erreur (facultatif)
    header("Location: detailRecette.php?id=" . $_POST['recipe_id'] . "&toast=error");
    exit;
}


