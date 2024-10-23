<?php

session_start();

require_once '../config/config.php';

if ($pdo === null) {
    die('Erreur : la connexion à la base de données a échoué.');
}

$postData = $_POST;
if (isset($postData['email']) && isset($postData['password'])) {

    $email = filter_var($postData['email'], FILTER_SANITIZE_EMAIL);
    $password = $postData['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['toast'] = array(
            'type' => 'error',
            'message' => 'Il faut un email valide pour soumettre le formulaire.'
        );
    } else {
        try {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['LOGGED_USER'] = [
                        'email' => $user['email'],
                        'user_id' => $user['user_id'],
                        'prenom' => $user['prenom'],
                        'nom' => $user['nom'],
                        'image_path' => $user['image_path'] ? BASE_URL . ltrim($user['image_path'], '../') : null, 
                    ];

                    // Enregistrer le toast de succès dans la session
                    $_SESSION['toast'] = array(
                        'type' => 'success',
                        'message' => 'Connexion réussie !'
                    );

                    // Redirection après la connexion réussie
                    header("Location: " . BASE_URL . "login.php");
                    exit();
                } else {
                    $_SESSION['toast'] = array(
                        'type' => 'error',
                        'message' => 'Mot de passe incorrect.'
                    );
                }
            } else {
                $_SESSION['toast'] = array(
                    'type' => 'error',
                    'message' => 'Utilisateur non trouvé.'
                );
            }
        } catch (PDOException $e) {
            $_SESSION['toast'] = array(
                'type' => 'error',
                'message' => 'Erreur lors de la connexion à la base de données.'
            );
        }
    }

    // Redirection après échec de la connexion
    header("Location: login.php");
    exit();
}
