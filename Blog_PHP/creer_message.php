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
