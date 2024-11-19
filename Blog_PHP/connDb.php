<?php
try {
    $dbh = new PDO('mysql:host=localhost;port=50765;dbname=fofana', 'azure', '6#vWHD_$');
    echo "tout OK";
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>


    </BODY>

</HTML>