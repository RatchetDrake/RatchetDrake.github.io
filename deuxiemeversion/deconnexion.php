<?php
session_start();

// Vérifier si le dernier temps d'activité est défini
if (isset($_SESSION['last_activity'])) {
    $inactive_timeout = 300;  // Temps d'inactivité en secondes (300 secondes = 5 minutes)

    // Vérifier si le temps d'inactivité a été dépassé
    if (time() - $_SESSION['last_activity'] > $inactive_timeout) {
        // La session a dépassé le temps d'inactivité, déconnexion de l'utilisateur
        session_unset();
        session_destroy();
        $_SESSION['erreur_inactivite'] = "Vous avez été déconnecté en raison d'une inactivité prolongée.";
        header("Location: connexion.php");  // Rediriger vers la page de connexion
        exit();
    }
}

// Mettre à jour le temps de dernière activité
$_SESSION['last_activity'] = time();

// Rediriger vers la page d'accueil ou autre après déconnexion
header("Location: connexion.php");  // Mettez ici votre URL de redirection après déconnexion
exit();
?>
