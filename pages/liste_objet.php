<?php
session_start();
require_once('../inc/traitement/traitement_liste_objet.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des objets</title>
    <link href="../assets/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Liste des objets empruntés</h3>
        <a href="filtre_categorie.php" class="btn btn-primary">filtrer</a>        
        <a href="index.php?logout=true" class="btn btn-danger">Déconnexion</a>
    </div>

    <table class="table table-bordered table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th>Catégorie</th>
                <th>Nom de l'objet</th>
                <th>Nom du membre</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($liste_objets)): ?>
                <?php foreach ($liste_objets as $objet): ?>
                    <tr>
                        <td><?= htmlspecialchars($objet['nom_categorie']) ?></td>
                        <td><?= htmlspecialchars($objet['nom_objet']) ?></td>
                        <td><?= htmlspecialchars($objet['nom_membre']) ?></td>
                        <td><?= htmlspecialchars($objet['date_emprunt']) ?></td>
                        <td><?= htmlspecialchars($objet['date_retour']) ?></td>
                        <td>
                            <img src="../asset/image/<?= htmlspecialchars($objet['nom_image']) ?>" alt="image" width="80">
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center">Aucun emprunt en cours</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
