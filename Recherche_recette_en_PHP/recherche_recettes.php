<?php
try {
    
    $dbh = new PDO('mysql:host=localhost;port=50929;dbname=fofana', 'azure', '6#vWHD_$');

   
    $sql = "SELECT DISTINCT r.* FROM Recette r JOIN Ingredient i ON r.ID_ingredient = i.ID_ingredient WHERE 1";

    // recherche par la saisie de l'utilisateur
    if (!empty($_GET['recherche'])) {
        $recherche = '%' . $_GET['recherche'] . '%';
        $sql .= " AND (r.Nom_recette LIKE :recherche OR r.Instructions_cuisson LIKE :recherche OR i.Nom_ingredient LIKE :recherche)";
    }

    // recherche par temps de préparation maximum
    if (!empty($_GET['temps_preparation_max'])) {
        $sql .= " AND r.Temps_preparation <= :temps_preparation_max";
    }

    // recherche par temps de cuisson maximum
    if (!empty($_GET['temps_cuisson_max'])) {
        $sql .= " AND r.Temps_cuisson <= :temps_cuisson_max";
    }


    $stmt = $dbh->prepare($sql);
    if (!empty($_GET['recherche'])) {
        $stmt->bindParam(':recherche', $recherche, PDO::PARAM_STR);
    }
    if (!empty($_GET['temps_preparation_max'])) {
        $stmt->bindParam(':temps_preparation_max', $_GET['temps_preparation_max'], PDO::PARAM_INT);
    }
    if (!empty($_GET['temps_cuisson_max'])) {
        $stmt->bindParam(':temps_cuisson_max', $_GET['temps_cuisson_max'], PDO::PARAM_INT);
    }
    $stmt->execute();
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($resultats);
} catch (PDOException $e) {
    die("Erreur lors de l'exécution de la requête: " . $e->getMessage());
}
?>
