<!DOCTYPE html>
<html>
<head>
    <title>INSCRIPTION</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Inscription<h1>
    <form method="post" action="inscription.php">
        <p>Username</p>
        <input type="text" name="Username">
        <p>email</p>
        <input type="email" name="email">
        <p>Password</p>
        <input type="password" name="password">
        <p>Répetez votre password</p>
        <input type="password" name="repeatpassword">
        <p>
            <input type="submit" name="submit" value="Valider">
        </p>
    </form>
<?php
    if (isset($_POST['submit'])) {
        $Username = htmlspecialchars(trim($_POST['Username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
        $repeatpassword = htmlspecialchars(trim($_POST['repeatpassword']));

        if ($Nom&&$email&&$password&&$repeatpassword) {
            if (strlen($password)>=6) {
                if ($password==$repeatpassword) {
                    
                    // On crypte le mot de passe
                    // $password = md5($password);
                    // on se connecte à MySQL et on sélectionne la base
                    $matches = [];
                    preg_match('mysql:\/\/([A-Za-z0-9_]+):([A-Za-z0-9_]+)@([A-Za-z0-9_\-\.]+):([0-9]+)\/([A-Za-z0-9_]+)', $_ENV["DATABASE_URL"], $matches);
                    $connexion = new mysqli($matches[3],$_matches[1],$_matches[2],$_matches[5],$_matchs[4]);
                    
                    //On créé la requête
                    $sql = "CREATE TABLE IF NOT EXISTS USER (
                        'id INT PRIMARY KEY NOT NULL auto_increment',
                        '$Username VARCHAR(50)',
                        '$Email VARCHAR(50)',
                        '$Password VARCHAR(255)'
                    )";
                    
                    // On envoie la requête
                    $res = $connexion->query($sql);
                    
                    // on ferme la connexion
                    mysqli_close($connexion);
                
                } else echo "Les mots de passe ne sont pas identiques"; 
            } else echo "Le mot de passe est trop court !";
        } else echo "Veuillez saisir tous les champs !";
    }
?>
    </body>
</html>