<?php
session_start();
require_once __DIR__ . '/config/config.php';

// Fonction pour rediriger et arrêter le script
function redirect($url)
{
    header("Location: $url");
    exit();
}

// Redirection vers la page de connexion si l'utilisateur n'est pas connecté
if (!isset($_SESSION['LOGGED_USER'])) {
    redirect('auth/login.php');
}

// Si l'utilisateur est connecté, redirigez-le vers l'accueil
redirect('pages/accueil.php');
