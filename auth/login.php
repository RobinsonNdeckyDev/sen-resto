<?php
session_start();
require_once '../config/config.php';
require_once '../functions/message.php'; 


// Vérifier si un message toast est stocké dans la session
if (isset($_SESSION['toast'])) {
    $toastMessage = $_SESSION['toast']['message'];
    $toastType = $_SESSION['toast']['type'];

    // Appeler la fonction pour afficher le toast et rediriger
    showToastWithRedirect($toastMessage, $toastType, 3000);

    // Supprimer le message de la session pour qu'il ne soit pas réaffiché
    unset($_SESSION['toast']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet">
    <!-- Inclure Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Inclure Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <link rel="stylesheet" href="../styles/main.css">
    <title>Sen recette</title>
</head>

<body style="height: 100vh; display:flex; justify-content:center; align-items:center;">

    <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
        <form class="login mx-auto border rounded px-4 py-5" action="<?php echo BASE_URL; ?>auth/post_login.php" method="POST">

            <h3 class="my-5 text-center">Connectez-vous</h3>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" />
                <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre adresse e-mail.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" />
            </div>
            <div class="mt-5 text-center">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
            <p class="mt-10 text-center text-sm ">
                Vous n'avez pas de compte?
                <a href="<?php echo BASE_URL; ?>auth/register.php">Inscrivez-vous !</a>
            </p>
        </form>
    <?php else : ?>
        <!-- Rediriger si l'utilisateur est déjà connecté -->
        <?php header("Location: pages/accueil.php");
        exit(); ?>
    <?php endif; ?>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>