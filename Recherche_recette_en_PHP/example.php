<?php

try {
    // Connexion à la base de données
    $dbh = new PDO('mysql:host=localhost;port=50929;dbname=fofana', 'azure', '6#vWHD_$');

    // Ajout de données dans la table Livre
    $sql_livre_insert = "INSERT INTO Livre (Titre_livre) VALUES
    ('La Cuisine Française Traditionnelle'),
    ('Les Délices de la Méditerranée'),
    ('Cuisine du Monde en 80 Recettes')";
    $requete_livre_insert = $dbh->query($sql_livre_insert);

    if ($requete_livre_insert === false) {
        echo "Erreur lors de l'insertion dans la table Livre : " . print_r($dbh->errorInfo(), true);
        die(); // Arrêter l'exécution du script en cas d'erreur
    } else {
        echo 'Données ajoutées avec succès dans la table Livre.<br>';
    }

    // Récupération des IDs des livres insérés
    $livres_insert_ids = $dbh->lastInsertId();

    // Ajout de données dans la table Ingredient
    $sql_ingredient_insert = "INSERT INTO Ingredient (Nom_ingredient) VALUES
    ('Poulet, vin rouge, oignons, poivrons, épices'),
    ('Poisson, citron, ail, herbes aromatiques'),
    ('Pâtes, tomates, basilic, parmesan, huile d\'olive'),
    ('Viande de boeuf, carottes, pommes de terre, vin rouge, bouquet garni'),
    ('Farine, cacao en poudre, sucre, levure chimique, œufs, huile végétale, lait, extrait de vanille'),
    ('Laitue, croûtons, parmesan, mayonnaise, anchois, moutarde, vinaigre'),
    ('Pommes, sucre, cannelle'),
    ('Oignons, bouillon de bœuf, pain, fromage râpé'),
    ('Champignons, riz, bouillon de légumes'),
    ('Chocolat, œufs')";
    
    $requete_ingredient_insert = $dbh->query($sql_ingredient_insert);

    if ($requete_ingredient_insert === false) {
        echo "Erreur lors de l'insertion dans la table Ingredient : " . print_r($dbh->errorInfo(), true);
        die(); // Arrêter l'exécution du script en cas d'erreur
    } else {
        echo 'Données ajoutées avec succès dans la table Ingredient.<br>';
    }

    // Récupération des IDs des ingrédients insérés
    $ingredients_insert_ids = $dbh->lastInsertId();

    // Ajout de données dans la table Recette en utilisant les IDs récupérés
    $sql_recette_insert = "INSERT INTO Recette (Nom_recette, Temps_preparation, Temps_cuisson, Instructions_cuisson, ID_livre, ID_ingredient, Numero_page) VALUES
    ('Coq au Vin', 30, 90, 'Faites dorer le poulet dans une cocotte avec les oignons et les poivrons. Ajoutez le vin rouge et laissez mijoter à feu doux pendant 1 heure.', 1, 1,1),
    ('Poisson Grillé à la Méditerranéenne', 20, 30, 'Assaisonnez le poisson avec de l\'ail, du citron et des herbes aromatiques. Faites-le griller au barbecue ou au four.', 2, 2,24),
    ('Spaghetti à la Tomate Fraîche et Basilic', 15, 20, 'Faites cuire les pâtes al dente. Dans une poêle, faites revenir les tomates avec de l\'huile d\'olive, de l\'ail et du basilic. Ajoutez les pâtes cuites et mélangez bien.', 3, 3,56),
    ('Boeuf Bourguignon', 30, 120, 'Faites revenir la viande dans une cocotte avec les carottes et les oignons. Ajoutez le vin rouge et laissez mijoter pendant 2 heures.', 1, 4, 43),
    ('Gâteau au Chocolat Moelleux', 20, 40, 'Préchauffez le four à 180°C. Mélangez la farine, le cacao, le sucre et la levure. Ajoutez les œufs, l\'huile et le lait. Versez dans un moule et faites cuire pendant 30 minutes.', 2, 5,7),
    ('Salade Caesar', 10, 0, 'Mélangez des feuilles de laitue, des croûtons, du parmesan et une sauce à base de mayonnaise, d\'anchois, de moutarde et de vinaigre.', 3, 6,17),
    ('Tarte aux Pommes', 20, 35, 'Étalez une pâte brisée dans un moule à tarte. Disposez les pommes coupées en tranches sur le fond. Saupoudrez de sucre et de cannelle. Enfournez pendant 35 minutes.', 1, 7,90),
    ('Soupe à l\'Oignon Gratinee', 15, 60, 'Faites revenir les oignons dans du beurre jusqu\'à ce qu\'ils soient caramélisés. Ajoutez le bouillon de bœuf et laissez mijoter pendant 45 minutes. Versez dans des bols, ajoutez du pain grillé et du fromage râpé, puis passez au four jusqu\'à ce que le fromage soit fondu et doré.', 2, 8, 67),
    ('Risotto aux Champignons', 25, 30, 'Faites revenir les champignons avec de l\'ail dans du beurre. Ajoutez le riz et faites-le cuire en ajoutant progressivement du bouillon de légumes jusqu\'à ce qu\'il soit crémeux. Servez chaud avec du parmesan râpé.', 3, 9,5),
    ('Mousse au Chocolat', 10, 0, 'Faites fondre le chocolat au bain-marie. Battez les blancs d\'œufs en neige. Incorporez le chocolat fondu aux blancs en neige. Répartissez dans des ramequins et laissez reposer au réfrigérateur pendant au moins 2 heures.', 1, 10,8)";
    
    $requete_recette_insert = $dbh->query($sql_recette_insert);

    if ($requete_recette_insert === false) {
        echo "Erreur lors de l'insertion dans la table Recette : " . print_r($dbh->errorInfo(), true);
        die(); // Arrêter l'exécution du script en cas d'erreur
    } else {
        echo 'Données ajoutées avec succès dans la table Recette.<br>';
    }

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>
