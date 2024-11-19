<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Affichage des données de la base</title>
    <meta charset="utf-8">
</head>

<body>

    <h1>Affichage des données dans la Base</h1>

    <?php
    try {
        // Connexion à la base de données
        $dbh = new PDO('mysql:host=localhost;port=50929;dbname=fofana', 'azure', '6#vWHD_$');

        // Affichage des données de la table Recette
        $requete_recette = "SELECT * FROM Recette";
        $reponse_recette = $dbh->query($requete_recette);

        echo '<h2>Recettes</h2>';
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Nom</th><th>Temps de préparation</th><th>Temps de cuisson</th><th>Instructions</th><th>ID Livre</th><th>ID ingredient</th><th>Numéro de page</th></tr>';

        while ($ligne = $reponse_recette->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $ligne["ID_recette"] . '</td>';
            echo '<td>' . $ligne["Nom_recette"] . '</td>';
            echo '<td>' . $ligne["Temps_preparation"] . '</td>';
            echo '<td>' . $ligne["Temps_cuisson"] . '</td>';
            echo '<td>' . $ligne["Instructions_cuisson"] . '</td>';
            echo '<td>' . $ligne["ID_livre"] . '</td>';
            echo '<td>' . $ligne["ID_ingredient"] . '</td>';
            echo '<td>' . $ligne["Numero_page"] . '</td>';
            echo '</tr>';
        }

        echo '</table>';

        // Affichage des données de la table Livre
        $requete_livre = "SELECT * FROM Livre";
        $reponse_livre = $dbh->query($requete_livre);

        echo '<h2>Livres</h2>';
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Titre</th></tr>';

        while ($ligne = $reponse_livre->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $ligne["ID_livre"] . '</td>';
            echo '<td>' . $ligne["Titre_livre"] . '</td>';
            echo '</tr>';
        }

        echo '</table>';

        // Affichage des données de la table Ingredient
        $requete_ingredient = "SELECT * FROM Ingredient";
        $reponse_ingredient = $dbh->query($requete_ingredient);

        echo '<h2>Ingrédients</h2>';
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Nom</th></tr>';

        while ($ligne = $reponse_ingredient->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $ligne["ID_ingredient"] . '</td>';
            echo '<td>' . $ligne["Nom_ingredient"] . '</td>';
            echo '</tr>';
        }

        echo '</table>';

        // Fermeture de la connexion à la base de données
        $dbh = null;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    ?>
</body>

</html>
