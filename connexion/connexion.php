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
    <title>Connexion</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
            <a class="navlink" href="../discussion/discussion.php">Discussion</a>
        </nav>
    </header>

    <main>
    <div class="nutellaimg">
            <p> <img src="../images/nutella1.png" alt="imgnutella"></p>
        </div>
        <form class=formulaire action="connexion.php" method="POST">
            <h1>Connexion</h1><br />
            <label>Identifiants</label><br />
            <input class="text" type="text" name="login" required><br />
            <label>Mot de passe</label><br />
            <input class="password" type="password" name="password" required><br /><br />
            <input class="submit" type="submit" name="connecter" value="Se connecter"><br /><br />
        </form>
        <p class="formulaire2">Vous n'avez pas de comtpe?</p><br />
        <form class = formulaire2 action="connexion.php" method="GET">
            <input class="submit" type="submit" name="inscription" value="S'inscrire">
        </form>
    </main>
    <footer>

<div class="réseaux">
    <p><b>Retrouvez nous sur:</b></p>
</div>

<div id="réseauxspotify">

    <div class="facebook">
        <a target="_blank" href="https://www.facebook.com/nutellafrance">
            <img src="../images/facebook.png" alt="facebookspotify"></a>
    </div>

    <div class="instagram">

        <a target="_blank" href="https://www.instagram.com/nutella/">
            <img src="../images/instagram.png" alt="instagramspotify"></a>
    </div>

    <div class="twitter">

        <a target="_blank" href="https://twitter.com/NutellaFR">
            <img src="../images/twitter.png" alt="twitterspotify"></a>
    </div>

</div>

</footer>

</body>

</html>

<?php
$db = mysqli_connect("localhost", "root", "", "discussion"); // Connexion Db
$requete = "SELECT * FROM utilisateurs"; // Requete SQL

if (isset($_POST['connecter'])) { //Si on appuie sur Connecter

    $login = htmlspecialchars($_POST['login']); // POST devient une $
    $password = htmlspecialchars($_POST['password']); // Idem
    $query = mysqli_query($db, $requete); // Connexion + Requete SQL
    $user = mysqli_fetch_all($query, MYSQLI_ASSOC); //MYSQLI ASSOC pour traiter les données L par L
    // FETCH ALL POUR PRENDRE TOUTES LES VALEURS DU TABLEAU

    for ($i = 0; isset($user[$i]); $i++) { // Boucle for pour parcourir le tableau
        $logcheck = $user[$i]['login']; // On recupère le login dans le tableau parcouru
        $passcheck = $user[$i]['password']; // Et ici le MDP 
        $idcheck = $user[$i]['id'];
        if ($login == $logcheck and $password == password_verify($password, $passcheck)) { // Si Login et MDP est égal aux valeurs dans le tableau alors connexion + Verify pass 
            $_SESSION['id'] = $idcheck;
            header('location:http://localhost/discussion/index/index.php');
        }
    }

    if ($login != $logcheck) {
        exit('Les informations fournis sont incorrecte');
    }
}
// LE IF DANS LE FOR SINON LE TABLEAU PARCOURS LES VALEURS ET RETIENDRA LA DERNIERE VALEUR 
//Connexion échoué à chaque fois car il retiendra la dernière valeur du tableau
if (isset($_GET['inscription'])) {
    header('location:http://localhost/discussion/inscription/inscription.php');
}
?>