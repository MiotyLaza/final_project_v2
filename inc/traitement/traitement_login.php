<?php
require_once('connexion.php');
session_start();

$Mail = isset($_POST['Mail']) ? trim($_POST['Mail']) : '';
$Mdp  = isset($_POST['Mdp']) ? trim($_POST['Mdp']) : '';

$conn = dbconnect(); 

$sql = "SELECT * FROM final_project_membre WHERE email = ? AND mdp = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'ss', $Mail, $Mdp);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 1) {
    $donnees = mysqli_fetch_assoc($result);
    $_SESSION['Email'] = $Mail;
    $_SESSION['Nom'] = $donnees['nom'];
    $_SESSION['id'] = $donnees['id_membre'];

    header('Location: ../../pages/liste_objet.php');
    exit;
} else {
    header('Location: ../..//pages/index.php?erreur=2');
    exit;
}
?>
