<?php
$dbh = new PDO('mysql:host=localhost;port=50765;dbname=fofana', 'azure', '6#vWHD_$');
error_reporting(E_ALL);
ini_set('display_errors', 1);

    if (isset($_POST['update'])) { 

        $id = intval($_GET['id']);
        $username= $_POST['username'];
        $titre= $_POST['titre'];
        $content= $_POST['content'];

        $sql = "UPDATE messages SET utilisateur=:username, titre=:titre, message=:content WHERE id=:id";

        $query= $dbh->prepare($sql);

        $query->bindParam('username',$username,PDO::PARAM_STR);
        $query->bindParam('titre',$titre,PDO::PARAM_STR);
        $query->bindParam('content',$content,PDO::PARAM_STR);
        $query->bindParam('id',$id,PDO::PARAM_STR);

        $query->execute();
        echo "<script>alert('Articles modifiée avec succès!');</script>"; // Correction des guillemets et des parenthèses
        echo "<script>window.location.href='index.php'</script>";
    }

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de l'Article</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM messages WHERE id=:id";
        $query = $dbh->prepare($sql);

        $query->bindParam(':id', $id, PDO::PARAM_STR); // Ajout du deux-points devant 'id'
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($result as $results) { // Correction du nom de la variable ici
        ?>
                <form action="modifier_message.php?id=<?php echo $id; ?>" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <b>Pseudonyme</b>
                            <input type="text" name="username" value="<?php echo htmlentities($results->utilisateur); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <b>Titre du Contenu</b>
                            <input type="text" name="titre" value="<?php echo htmlentities($results->titre); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <b>Contenu du Blog</b>
                            <textarea name="content" class="form-control" required><?php echo htmlentities($results->message); ?></textarea>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="row" style="margin-top:1%">
                <div class="col-md-8">
                    <input type="submit" name="update" class="btn btn-success" value="Modifier le Contenu">
                    <a href="index.php" class="btn btn-danger">Retour à l'Accueil</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
