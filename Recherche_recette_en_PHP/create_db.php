<?php

try {
    // Connexion à la base de données
    $dbh = new PDO('mysql:host=localhost;port=50929;dbname=fofana', 'azure', '6#vWHD_$');

    // Création de la table Livre
    $sql_livre = "CREATE TABLE IF NOT EXISTS Livre (
        ID_livre INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        Titre_livre VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";    
    $requete_livre = $dbh->query($sql_livre);

    if ($requete_livre === false) {
        echo "Erreur lors de la création de la table Livre : " . print_r($dbh->errorInfo(), true);
        die(); // Arrêter l'exécution du script en cas d'erreur
    } else {
        echo 'Table "Livre" créée avec succès.<br>';
    }

    // Création de la table Ingredient
    $sql_ingredient = "CREATE TABLE IF NOT EXISTS Ingredient (
        ID_ingredient INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        Nom_ingredient VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $requete_ingredient = $dbh->query($sql_ingredient);

    if ($requete_ingredient === false) {
        echo "Erreur lors de la création de la table Ingredient : " . print_r($dbh->errorInfo(), true);
        die(); // Arrêter l'exécution du script en cas d'erreur
    } else {
        echo 'Table "Ingredient" créée avec succès.<br>';
    }

    // Création de la table Recette avec contrainte de clé étrangère vers Livre
    $sql_recette = "CREATE TABLE IF NOT EXISTS Recette (
        ID_recette INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        Nom_recette VARCHAR(255) NOT NULL,
        Temps_preparation INT,
        Temps_cuisson INT,
        Instructions_cuisson TEXT,
        ID_livre INT,
        Numero_page INT,
        ID_ingredient INT,
        FOREIGN KEY (ID_ingredient) REFERENCES Ingredient(ID_ingredient)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $requete_recette = $dbh->query($sql_recette);

    if ($requete_recette === false) {
        echo "Erreur lors de la création de la table Recette : " . print_r($dbh->errorInfo(), true);
        die(); // Arrêter l'exécution du script en cas d'erreur
    } else {
        echo 'Table "Recette" créée avec succès.<br>';
    }
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>
