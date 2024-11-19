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
        $dbh = new PDO('mysql:host=localhost;port=50929;dbname=fofana', 'azure', '6#vWHD_$');
        $requete = "SELECT ID_recette, Nom_recette, Temps_preparation, Temps_cuisson, Instructions_cuisson, ID_livre FROM Recette";
        $reponse = $dbh->query($requete);

        $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);

        if (count($donnees) > 0) {
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Nom_recette</th><th>Temps de preparation</th><th>Temps de cuisson</th><th>Instructions de cuisson</th><th>ID_livre</th></tr>';

            foreach ($donnees as $ligne) {
                echo '<tr>';
                echo '<td>' . $ligne["ID_recette"] . '</td>';
                echo '<td>' . $ligne["Nom_recette"] . '</td>';
                echo '<td>' . $ligne["Temps_preparation"] . '</td>';
                echo '<td>' . $ligne["Temps_cuisson"] . '</td>';
                echo '<td>' . $ligne["Instructions_cuisson"] . '</td>';
                echo '<td>' . $ligne["ID_livre"] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>Aucune donnée à afficher pour la table "Recette".</p>';
        }

        // Fermeture de la première connexion
        $dbh = null;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

    try {
        $dbh = new PDO('mysql:host=localhost;port=50929;dbname=fofana', 'azure', '6#vWHD_$');
        $requete = "SELECT ID_livre, Titre_livre, Numero_page FROM Livre";
        $reponse = $dbh->query($requete);

        $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);

        if (count($donnees) > 0) {
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Titre</th><th>Numero_page</th></tr>';

            foreach ($donnees as $ligne) {
                echo '<tr>';
                echo '<td>' . $ligne["ID_livre"] . '</td>';
                echo '<td>' . $ligne["Titre_livre"] . '</td>';
                echo '<td>' . $ligne["Numero_page"] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>Aucune donnée à afficher pour la table "Livre".</p>';
        }

        // Fermeture de la deuxième connexion
        $dbh = null;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    
    try {
        $dbh = new PDO('mysql:host=localhost;port=50929;dbname=fofana', 'azure', '6#vWHD_$');
        $requete = "SELECT ID_ingredient, Nom_ingredient FROM Ingredient";
        $reponse = $dbh->query($requete);

        $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);

        if (count($donnees) > 0) {
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Nom ingrédient</th></tr>';

            foreach ($donnees as $ligne) {
                echo '<tr>';
                echo '<td>' . $ligne["ID_ingredient"] . '</td>';
                echo '<td>' . $ligne["Nom_ingredient"] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>Aucune donnée à afficher pour la table "Ingredient".</p>'; 
        }

        // Fermeture de la connexion
        $dbh = null;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }    
    
    try {
        $dbh = new PDO('mysql:host=localhost;port=50929;dbname=fofana', 'azure', '6#vWHD_$');
        
        // Requête d'insertion pour ajouter un livre
        $insert_livre = "INSERT INTO Livre (Titre_livre, Numero_page) VALUES ('Cuisine française', 50)";
        
        // Exécution de la requête
        $dbh->exec($insert_livre);
        
        echo "Livre ajouté avec succès.";
        
        // Fermeture de la connexion
        $dbh = null;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
       
    ?>
</body>

</html>
