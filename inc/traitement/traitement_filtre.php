<?php
require_once('connexion.php');
$conn = dbconnect();

$cat_sql = "SELECT id_categorie, nom_categorie FROM final_project_categorie_objet";
$cat_result = mysqli_query($conn, $cat_sql);
$categories = [];
if ($cat_result && mysqli_num_rows($cat_result) > 0) {
    while ($row = mysqli_fetch_assoc($cat_result)) {
        $categories[] = $row;
    }
}

$filtre = "";
if (isset($_GET['categorie']) && $_GET['categorie'] != "") {
    $id_categorie = intval($_GET['categorie']);
    $filtre = "WHERE obj.id_categorie = $id_categorie";
}

$sql = "
SELECT 
    cat.nom_categorie,
    obj.nom_objet,
    mem.nom AS nom_membre,
    img.nom_image
FROM final_project_objet obj
JOIN final_project_categorie_objet cat ON obj.id_categorie = cat.id_categorie
JOIN final_project_membre mem ON obj.id_membre = mem.id_membre
LEFT JOIN final_project_images_objet img ON obj.id_objet = img.id_objet
$filtre
ORDER BY obj.nom_objet ASC
";

$res = mysqli_query($conn, $sql);
$objets = [];

if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $objets[] = $row;
    }
}
