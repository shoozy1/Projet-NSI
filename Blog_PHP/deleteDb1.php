<?php

// Db connection
$DB = new PDO('mysql:host=localhost;port=50765;dbname=fofana', 'azure', '6#vWHD_$');

$tables = array("messages", "utilisateur", "likes");

foreach ($tables as $table) {
    $sql = "DROP TABLE IF EXISTS $table";
    $requete = $DB->query($sql);
    echo "Table '$table' has been dropped (if it existed).<br>";
}

?>
