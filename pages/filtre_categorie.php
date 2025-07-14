<?php
session_start();
require_once('../inc/traitement/traitement_filtre.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Filtrer par catégorie</title>
    <link href="../assets/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="mb-4">Filtrer les objets par catégorie</h3>

    <form method="GET" action="filtre_categorie.php" class="mb-4 row g-2 align-items-center">
        <div class="col-auto">
            <select name="categorie" class="form-select">
                <option value="">-- Toutes les catégories --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id_categorie'] ?>" 
                        <?= (isset($_GET['categorie']) && $_GET['categorie'] == $cat['id_categorie']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['nom_categorie']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filtrer</button>         
            <a href="liste_objet.php" class="btn btn-primary">retour</a>            
            <a href="index.php?logout=true" class="btn btn-danger">Déconnexion</a>    
        </div>
    </form>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Catégorie</th>
                <th>Nom de l'objet</th>
                <th>Nom du membre</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($objets)): ?>
                <?php foreach ($objets as $obj): ?>
                    <tr>
                        <td><?= htmlspecialchars($obj['nom_categorie']) ?></td>
                        <td><?= htmlspecialchars($obj['nom_objet']) ?></td>
                        <td><?= htmlspecialchars($obj['nom_membre']) ?></td>
                        <td>
                            <img src="../asset/image/<?= htmlspecialchars($obj['nom_image']) ?>" alt="objet" width="80">
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" class="text-center">Aucun objet trouvé pour cette catégorie.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
