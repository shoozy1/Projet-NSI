<?php
// Connexion à la base de données
try {
    $dbh = new PDO('mysql:host=localhost;port=50929;dbname=fofana', 'azure', '6#vWHD_$');
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Vérifiez si un ID de recette est spécifié dans l'URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID de recette non spécifié.");
}

// Récupérez l'ID de la recette depuis l'URL
$id_recette = $_GET['id'];

// Préparation de la requête SQL pour récupérer les détails de la recette
$sql = "SELECT r.*, l.Titre_livre FROM Recette r JOIN Livre l ON r.ID_livre = l.ID_livre WHERE r.ID_recette = :id_recette";

// Exécution de la requête SQL
try {
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id_recette', $id_recette, PDO::PARAM_INT);
    $stmt->execute();
    $details_recette = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de l'exécution de la requête: " . $e->getMessage());
}

// Vérifiez si la recette existe
if (!$details_recette) {
    die("Recette introuvable.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la recette</title>
    <style>
        /* Styles CSS pour la mise en page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #555;
        }

        p {
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= $details_recette['Nom_recette'] ?></h1>
        <p><strong>Livre :</strong> <?= $details_recette['Titre_livre'] ?></p>
        <p><strong>Page :</strong> <?= $details_recette['Numero_page'] ?></p>
        <p><strong>Temps de préparation :</strong> <?= $details_recette['Temps_preparation'] ?> minutes</p>
        <p><strong>Temps de cuisson :</strong> <?= $details_recette['Temps_cuisson'] ?> minutes</p>
        <p><strong>Instructions de cuisson :</strong> <?= $details_recette['Instructions_cuisson'] ?></p>
    </div>
</body>
</html>
