<?php
require_once('connexion.php');

$conn = dbconnect();

$sql = "
SELECT 
    cat.nom_categorie,
    obj.nom_objet,
    mem.nom AS nom_membre,
    emp.date_emprunt,
    emp.date_retour,
    img.nom_image
FROM final_project_emprunt emp
JOIN final_project_objet obj ON emp.id_objet = obj.id_objet
JOIN final_project_membre mem ON emp.id_membre = mem.id_membre
JOIN final_project_categorie_objet cat ON obj.id_categorie = cat.id_categorie
LEFT JOIN final_project_images_objet img ON obj.id_objet = img.id_objet
ORDER BY emp.date_emprunt DESC
";

$result = mysqli_query($conn, $sql);

$liste_objets = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $liste_objets[] = $row;
    }
}

mysqli_free_result($result);
