<?php
function afficher_messages() {
    if (isset($_GET['inscrit'])) {
        echo '<p style="color:green;">Merci pour votre inscription, veuillez vous connecter.</p>';
    }

    if (isset($_GET['erreur'])) {
        echo '<p style="color:red;">Erreur, veuillez vérifier vos identifiants.</p>';
    }

    if (isset($_GET['deco'])) {
        echo '<p style="color:blue;">Vous êtes déconnecté.</p>';
    }
}
?>
