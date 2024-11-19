<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['username']) && isset($_GET['email']) && isset($_GET['password']) && isset($_GET['age'])) {
    $username = $_GET['username'];
    $email = $_GET['email'];
    $age = $_GET['age'];
    $password = $_GET['password'];

    if (!is_numeric($age) || $age <= 0) {
        echo "L'âge doit être un nombre supérieur à zéro.";
        return;
    }

    connectDB($username, $email, $age, $password);
}

function connectDB($username, $email, $age, $password)
{
    try {
        $dbh = new PDO('mysql:host=localhost;port=50765;dbname=fofana', 'azure', '6#vWHD_$');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $dbh->prepare("SELECT COUNT(*) FROM utilisateur WHERE username = :username");
        $query->bindParam(':username', $username);
        $query->execute();
        $count = $query->fetchColumn();

        if ($count != 0) {
            echo "Utilisateur existant !";
            return;
        }

        $sqlInsert = "INSERT INTO utilisateur (username, email, age, password) VALUES (:username, :email, :age, :password)";
        $sql = $dbh->prepare($sqlInsert);
        $sql->bindParam(':username', $username);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':age', $age);
        $sql->bindParam(':password', $password);

        $sql->execute();

        header('Location: connexion.php');
        exit();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>

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
