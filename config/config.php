<?php
// Configuration d'inclusion
require_once __DIR__ . '/../db/mysql.php'; // Connexion à la base de données
require_once __DIR__ . '/../db/databaseConnect.php'; // Connexion à la base de données
require_once __DIR__ . '/../functions/message.php'; // Gestion des messages
require_once __DIR__ . '/../config/fonctions.php'; //  Fonctions de configuration
require_once __DIR__ . '/../config/redirect.php';  // Redirections
require_once __DIR__ . '/../config/variables.php';  // Variables de configuration


// Autoloading des classes (si tu utilises des classes)
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});
