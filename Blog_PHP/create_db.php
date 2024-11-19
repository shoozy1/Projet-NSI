<?php

// Db connexion
$DB= new PDO('mysql:host=localhost;port=50765;dbname=fofana', 'azure', '6#vWHD_$');

// Create user table
$sql = "CREATE TABLE utilisateur(
    user_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username VARCHAR(128) NOT NULL,
    email VARCHAR(256) NOT NULL,
    password CHAR(128) NOT NULL,
    age INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$requete= $DB->query($sql);
echo 'Table "utilisateur" créée, ';

// Create message table
$sql ="CREATE TABLE messages(
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur VARCHAR(255) NOT NULL,
    titre VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$requete= $DB->query($sql);
echo 'Table "messages" créée, ';

// Create like table
$sql = "CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    message_id INT NOT NULL,
    date_liked TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
$requete= $DB->query($sql);
echo 'Table "likes" créée, ';

?>