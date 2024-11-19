<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Affichage des données de la base</title>
		<meta charset="utf-8">
	</head>
	<body>

Affichage des données dans la Base <BR>

<?php
try {
	$dbh = new PDO('mysql:host=localhost;port=50765;dbname=nwaeffler', 'azure', '6#vWHD_$');
	$requete = "SELECT * FROM formulaire";
	/*echo $requete;*/
	$reponse = $dbh->query($requete);
    $dbh = null;
    while($ligne = $reponse->fetch()){
        $nom = $ligne["nom"];
        $mail = $ligne["email"];
        $message = $ligne["message"];
        echo $nom." - ".$mail."<BR>";
        echo $message."<BR>";
        echo "+++++++++++++++++++++++++++++++++++++<BR>";
    }
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>

	</body>
</html>