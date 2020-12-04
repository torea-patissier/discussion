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
        <h1>Connexion</h1>
        <form action="connexion.php" method="POST">
            <label>Identifiants</label><br />
            <input class="text" type="text" name="login" required><br />
            <label>Mot de passe</label><br />
            <input class="password" type="password" name="password" required><br /><br />
            <input class="submit" type="submit" name="connecter" value="Se connecter">
        </form>
    </main>

</body>

</html>

<?php
$db = mysqli_connect("localhost", "root", "root", "discussion"); // Connexion Db
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
    }

    if ($login == $logcheck and $password == password_verify($password, $passcheck)) { // Si Login et MDP est égal aux valeurs dans le tableau alors connexion + Verify pass 
        $_SESSION['id'] = $idcheck;
        header('location:http://localhost:8888/discussion/index/index.php');
    } else {
        echo 'Connexion  échoué';
    }

}
?>