<?php 
if (isset($_GET['del'])){
    $dbh = new PDO('mysql:host=localhost;port=50765;dbname=fofana', 'azure', '6#vWHD_$');
    $id=intval($_GET['del']);
    $sql="DELETE FROM messages WHERE id=:id";
    $query=$dbh->prepare($sql);

    $query->bindParam(':id',$id,PDO::PARAM_STR);
    $query->execute();

    echo"<script>alert('article supprimé avec succès avec succès!');</script>";
    echo"<script>window.location.href='index.php'</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
    }

    h1 {
        color: #007bff;
    }

    h3 {
        color: #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    table {
        margin-top: 20px;
        background-color: #ffffff;
    }

    th,
    td {
        text-align: center;
    }

    thead {
        background-color: #007bff;
        color: #ffffff;
    }

    tbody tr:hover {
        background-color: #f2f2f2;
    }

    .table-responsive {
        margin-top: 20px;
    }

    .liked {
        background-color: #28a745;
        border-color: #218838;
    }
    .btn-custom-purple {
    background-color: purple;
    border-color: purple;
    color: #fff; 
    }

    .btn-custom-purple:hover {
        background-color: darkpurple; 
        border-color: darkpurple;
    }
</style>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="container">
    <a href="connexion.php" class="btn btn-secondary" style="float: right; margin-top: 10px;">Déconnexion</a>
    <title>Accueil du Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Page d'Acceuil Blog</h1>

        <div class="row">
            <h3>Articles en Page </h3>
            <a href="creer_message.php" class="btn btn-primary">Ajouter un article</a>

            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Pseudo</th>
                            <th>Titre</th>
                            <th>Articles</th>
                            <th>Date de Publication</th>
                            <th>Edit</th>
                            <th>Supp</th>
                            <th>Like</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $dbh = new PDO('mysql:host=localhost;port=50765;dbname=fofana', 'azure', '6#vWHD_$');
                            $sql = "SELECT * FROM messages";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($result->utilisateur); ?></td>
                                        <td><?php echo htmlentities($result->titre); ?></td>
                                        <td><?php echo htmlentities($result->message); ?></td>
                                        <td><?php echo htmlentities($result->date_creation); ?></td>
                                        <td><a href="modifier_message.php?id=<?php echo htmlentities($result->id); ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                        <td><a href="index.php?del=<?php echo htmlentities($result->id); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Voulez-vous vraiment supprimer votre article?')"><span class="glyphicon glyphicon-trash"></span></a></td>
                                        <td>
                                            <form method="post" action="index.php">
                                                <input type="hidden" name="message_id" value="<?php echo $result->id; ?>">
                                                <?php
                                                // Vérifie si l'utilisateur a aimé cet article
                                                $checkLikeQuery = $dbh->prepare("SELECT * FROM likes WHERE message_id = :message_id");
                                                $checkLikeQuery->bindParam(':message_id', $result->id, PDO::PARAM_INT);
                                                $checkLikeQuery->execute();

                                                if ($checkLikeQuery->rowCount() > 0) {
                                                    // L'utilisateur a aimé, applique un style différent
                                                    ?>
                                                    <button type="submit" class="btn btn-success btn-sm liked"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                                                    <?php
                                                } else {
                                                    // L'utilisateur n'a pas encore aimé
                                                    ?>
                                                    <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                                                    <?php
                                                }
                                                ?>
                                            </form>
                                        </td>
                                    <?php
                                    $cnt++;
                                }
                            }
                        } catch (PDOException $e) {
                            print "Erreur : " . $e->getMessage() . "<br/>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8d+1l6s3tMzU5AkxZuRuIa66MWPOCb3wS/PLv9UzfaF6qcevXD+8HElk4Gg" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let likeButtons = document.querySelectorAll('.btn-success');

            likeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    button.classList.add('liked');
                    alert('J\'aime ajouté avec succès!');
                });
            });
        });
    </script>
</body>
</html>