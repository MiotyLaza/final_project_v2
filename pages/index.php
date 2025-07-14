<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="../assets/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="text-center mb-4">Connexion</h3>

                    <?php
                    require_once '../inc/fonction/message.php';
                    afficher_messages();
                    ?>

                    <form action="../inc/traitement/traitement_login.php" method="post">
                        <div class="mb-3">
                            <label for="mail" class="form-label">Email :</label>
                            <input type="email" class="form-control" id="mail" name="Mail" required>
                        </div>

                        <div class="mb-3">
                            <label for="mdp" class="form-label">Mot de passe :</label>
                            <input type="password" class="form-control" id="mdp" name="Mdp" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>

                    <hr>
                    <p class="text-center">
                        Vous n’êtes pas encore inscrit ? <a href="inscription.php">Inscrivez-vous ici</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
