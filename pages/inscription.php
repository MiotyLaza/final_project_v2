<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="../assets/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="text-center mb-4">Créer un compte</h3>

                    <?php
                    if (isset($_GET['erreur'])) {
                        echo "<p class='alert alert-danger'>Erreur : tous les champs sont obligatoires.</p>";
                    }
                    ?>
                    <?php
                        if (isset($_GET['erreur'])) {
                            $code = $_GET['erreur'];
                            if ($code == 1) {
                                echo "<p class='alert alert-danger'>Erreur : tous les champs sont obligatoires.</p>";
                            } elseif ($code == 2) {
                                echo "<p class='alert alert-warning'>Cet email est déjà utilisé. Veuillez en choisir un autre.</p>";
                            }
                        }
                    ?>


                    <form action="../inc/traitement/traitement_inscription.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nom :</label>
                            <input type="text" name="Nom" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email :</label>
                            <input type="email" name="Mail" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date de naissance :</label>
                            <input type="date" name="Date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Genre :</label>
                            <select name="Genre" class="form-select" required>
                                <option value="">-- Choisir --</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ville :</label>
                            <input type="text" name="Ville" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe :</label>
                            <input type="password" name="Mdp" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image de profil :</label>
                            <input type="file" name="Image" class="form-control" accept="image/*" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">S’inscrire</button>
                        </div>
                    </form>

                    <hr>
                    <p class="text-center">
                        Déjà un compte ? <a href="index.php">Connectez-vous ici</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
