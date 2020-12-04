<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/discussion-index.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Inscription</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
            <a class="navlink" href="../discussion/discussion.php">Discussion</a>
            <a class="navlink" href="../profil/profil.php">Profil</a>
        </nav>
    </header>
    <main>

        <form action="inscription.php" method="POST">
            <label>Identifiants</label><br />
            <input class="text" type="text" name='login' required><br /><br />
            <label>Mot de passe</label><br />
            <input class="password" type="password" name='password' required><br /><br />
            <label>Confirmation du mot de passe</label><br />
            <input class="password" type="password" name='confpass' required><br /><br />
            <input class="submit" type="submit" name='envoyer' value="S'inscrire">
        </form>

    </main>
    <footer>

    </footer>

</body>

</html>

<?php

$db = mysqli_connect("localhost", "root", "root", "discussion");
if (isset($_POST["envoyer"])) {
    $login = htmlspecialchars($_POST['login']);
    $mdp = htmlspecialchars($_POST['password']);
    $options = ['cost' => 12,];
    $hash = password_hash($mdp, PASSWORD_BCRYPT, $options);

    $select = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '" . $_POST["login"] . "' "); // On vérifie si un login n'est pas déjà existant en Db
    if (mysqli_num_rows($select)) {
        exit('Login déjà existant'); //Fin de commande
    } elseif ($_POST['password'] != $_POST['confpass']) { // On vérifie si le Mdp est le même
        exit('Vos mots de passe ne correspondent pas'); //Fin de commande
    } else {
        $requete = "INSERT INTO utilisateurs (login, password) VALUES ('$login','$hash')"; // On ajoute le nouvel utilisateurs en Db
        $query = mysqli_query($db, $requete); // Executer la requête
        $_SESSION['id'] = $_POST['id']; // Ouverture de session
        header('location:http://localhost:8888/discussion/connexion/connexion.php');
    }
}

?>