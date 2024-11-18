
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="inscription.php" method="get">
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="age" id="age" placeholder="Age" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="S'inscrire">
            </div>
            <div class="links">
                <p>Déjà un compte?<a href="connexion.php">Connexion</a></p>
            </div>
        </form>
    </div>
</body>

</html>
