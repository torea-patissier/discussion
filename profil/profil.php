<?php
session_start();
$db = mysqli_connect("localhost", "root", "root", "discussion");
$requete = "SELECT * FROM utilisateurs where id = '" . $_SESSION['id'] . "' ";
$query = mysqli_query($db, $requete);
$user = mysqli_fetch_assoc($query);

if (isset($_SESSION['id']) and 'id' == TRUE) {
    echo '


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/discussion-index.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Profil</title>
</head>
<header>
<nav class="navbar">
    <a class="navlink" href="../index/index.php">Accueil</a>
    <a class="navlink" href="../discussion/discussion.php">Discussion</a>
    <a class="navlink" href="../profil/profil.php">Profil</a>
</nav>
<body>

</header>
<main>
        <div class="msgprofil">' ?>
            <?php echo "Bonjour " . $user["login"]; ?> <?php echo '
        </div>
        <div class="formulaire">

            <h1 class="h1profil">Profil</h1>

            <form action="profil.php" method="POST">

                <label>Identifiant</label><br />
                <input class="login" type="text" name="login" required><br />

                <label>Modifiez votre mot de passe</label><br />
                <input class="password" type="password" name="password" required><br />

                <label>Confirmez la modification</label><br />
                <input class="password" type="password" name="confpass" required><br /><br />

                <input class="submit" type="submit" name="modifier" value="Modifier" onclick="alert("Informations modifiés")">                
            </form>

            <form action="profil.php" method="GET">
            <input class="submit" type="submit" name="deco" value="Déconnexion" onclick="alert("Vous êtes déconnecté")">
            </form>
            <p>Vous devez renseignez vos identifiants pour pouvoir modifier vos informations</p>

        </div>
    </main>    
</body>
</html>';

     } else {
     header('location:http://localhost:8888/discussion/index/index.php');
    }

  ?>


<?php

if (isset($_POST['modifier'])) {
    $login = htmlspecialchars($_POST['login']);
    $mdp = htmlspecialchars($_POST['password']);
    $conf =  htmlspecialchars($_POST['confpass']);
    $options = ['cost' => 12,];
    $hash = password_hash($mdp, PASSWORD_BCRYPT, $options);

    if ($mdp != $conf) {
        exit('Mot de passe incorrecte');
    } else {
        $requete2 = "UPDATE utilisateurs SET login='$login', password='$hash' WHERE id = '" . $_SESSION['id'] . "' "; // Important to put $ between '' and not " "
        $query = mysqli_query($db, $requete2);
        header('location:http://localhost:8888/discussion/profil/profil.php');
    }
}

if (isset($_GET['deco'])) {
    session_destroy();
    header('location:http://localhost:8888/discussion/index/index.php');

}
?>