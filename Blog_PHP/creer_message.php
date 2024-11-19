<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    try {
        $dbh = new PDO('mysql:host=localhost;port=50765;dbname=fofana', 'azure', '6#vWHD_$');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "formulaire soumis<BR>";

        $username = $_POST['username'];
        $titre = $_POST['titre'];
        $message = $_POST['content'];

        echo "user :" . $username . " et titre :" . $titre . " et message :" . $message . "<BR>";

        $sql = "INSERT INTO messages(utilisateur, titre, message) VALUES (:username, :titre, :message)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);

        $stmt->execute();

        echo "insertion ok?<BR>";

        $lastInsertId = $dbh->lastInsertId();

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Articles Publiée avec succès');</script>";
            echo "<script>window.location.href='creer_message.php'</script>";
            header("location:index.php");
        } else {
            echo "<script>alert('Error: Insertion failed');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un Message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="creer_message.php" method="post">
            <div class="row">
                <div class="col-md-4">
                    <b>Pseudonyme</b>
                    <input type="text" name="username" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <b>Titre du Contenu</b>
                    <input type="text" name="titre" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <b>Contenu du Blog</b>
                    <textarea name="content" class="form-control" required></textarea>
                </div>
            </div>
            <div class="row" style="margin-top:1%">
                <div class="col-md-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Publier le Contenu">
                    <a href="index.php" class="btn btn-danger">Retour à l'Accueil</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
