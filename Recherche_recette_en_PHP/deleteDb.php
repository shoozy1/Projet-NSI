<?php

// Db connection
$dbh = new PDO('mysql:host=localhost;port=50929;dbname=fofana', 'azure', '6#vWHD_$');

$tables = array("Recette", "Livre", "Ingredient");

foreach ($tables as $table) {
    $sql = "DROP TABLE IF EXISTS $table";
    $requete = $dbh->query($sql);
    echo "Table '$table' has been dropped (if it existed).<br>";
}

?>
