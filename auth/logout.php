<?php

session_start(); // Démarre la session

require_once '../config/config.php';

// Détruire la session
session_unset();
session_destroy();

// Enregistrer le toast de succès dans la session
$_SESSION['toast'] = array(
    'type' => 'success',
    'message' => 'Deconnexion réussie !'
);



// Redirection immédiate vers la page de login
header('Location: ' . BASE_URL . 'login.php');
exit(); // Terminer le script ici
