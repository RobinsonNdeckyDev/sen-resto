<?php

function showToastWithRedirect($message, $type = 'success', $duration = 3000, $redirectUrl = '')
{
    // Déterminer la classe de couleur basée sur le type
    $typeClass = '';

    // Assigner une classe CSS selon le type
    switch ($type) {
        case 'success':
            $typeClass = '#28a745'; // Vert pour succès
            break;
        case 'error':
            $typeClass = '#dc3545'; // Rouge pour erreur
            break;
        case 'info':
            $typeClass = '#17a2b8'; // Bleu pour information
            break;
        case 'warning':
            $typeClass = '#ffc107'; // Jaune pour avertissement
            break;
    }

    // Générer le script de notification avec Toastify
    echo '
    <script>
        Toastify({
            text: "' . $message . '",
            duration: ' . $duration . ',
            gravity: "top",
            position: "right",
            style: {
                background: "' . $typeClass . '",
            }
        }).showToast();
    ';

    // Ajouter la redirection si une URL est fournie
    if (!empty($redirectUrl)) {
        echo '
        setTimeout(function() {
            window.location.href = "' . $redirectUrl . '";
        }, ' . $duration . ');
        ';
    }

    // Fermer le script
    echo '</script>';
}
