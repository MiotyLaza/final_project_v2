<?php
require_once('connexion.php');

if (
    isset($_POST['Nom'], $_POST['Mail'], $_POST['Date'], $_POST['Genre'], $_POST['Ville'], $_POST['Mdp']) &&
    isset($_FILES['Image']) && $_FILES['Image']['error'] === 0
) {
    $Nom = $_POST['Nom'];
    $Mail = $_POST['Mail'];
    $Date = $_POST['Date'];
    $Genre = $_POST['Genre'];
    $Ville = $_POST['Ville'];
    $Mdp = $_POST['Mdp'];

    $conn = dbconnect();

    $check = mysqli_prepare($conn, "SELECT id_membre FROM final_project_membre WHERE email = ?");
    mysqli_stmt_bind_param($check, 's', $Mail);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {
        header("Location: ../../pages/inscription.php?erreur=2");
        exit;
    }

    $image_nom = basename($_FILES['Image']['name']);
    $upload_dir = '../../assets/images/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    $chemin_image = $upload_dir . $image_nom;
    move_uploaded_file($_FILES['Image']['tmp_name'], $chemin_image);

    $sql = "INSERT INTO final_project_membre (nom, email, date_naissance, genre, ville, mdp, image_profil)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssss', $Nom, $Mail, $Date, $Genre, $Ville, $Mdp, $image_nom);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("Location: ../../pages/index.php?inscrit=1");
        exit;
    } else {
        header("Location: ../../pages/inscription.php?erreur=1");
        exit;
    }
} else {
    header("Location: ../../pages/inscription.php?erreur=1");
    exit;
}
