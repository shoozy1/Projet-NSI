<?php
session_start();
    if (isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        connectDB($email, $password);
}

    function connectDB($email, $password){
        try {
            $dbh = new PDO('mysql:host=localhost;port=50765;dbname=fofana', 'azure', '6#vWHD_$');
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $dbh->query("SELECT * FROM utilisateur");
            $data = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach ($data as $user) {
            	    if ($user["email"] == $email && $user["password"] == $password) {
                        session_start();
                        // Stockage de l'état de connexion dans une variable de session
                        $_SESSION['logged'] = true;
                        $_SESSION['email'] = $email;
                        $_SESSION['id'] = $user['id'];
                        header("Location: index.php");
                        return;
            	    }
                }
            echo "Utilisateur intouvable ou Mot de Passe incorrect ";
            return;

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="connexion.php" method="post">
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email :" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Se connecter">
            </div>
            <div class="links">
                Pas encore de compte?<a href="inscription.php">Inscription</a>
            </div>
        </form>
    </div>
</body>
</html>
