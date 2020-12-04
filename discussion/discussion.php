<?php
session_start();

$db = mysqli_connect("localhost", "root", "root", "discussion"); // Connexion à la Db
$requete = "SELECT date, login, message  FROM utilisateurs INNER JOIN messages ON messages.id_utilisateur = utilisateurs.id ORDER BY date DESC"; //Preparation SQL
$query1 = mysqli_query($db, $requete); // Requete SQL
$all = mysqli_fetch_all($query1, MYSQLI_ASSOC); // $ récup toute les lignes de la requete SQL (MYSQLI ASSOC)

if (isset($_SESSION['id']) and 'id' == TRUE) { // Si on est connecté affiché la NAV avec l'onglet profil
    echo '

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/discussion-index.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Discussion</title>
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
        <h1>Discussion</h1>
        <div class="discussion">' ?>
            <?php
            foreach ($all as $key) { // Afficher le fil de la conversation
                echo '<section class = "tableaucommentaire">' . '<h5>'  . $key['date'] . ' de '  . $key['login'] . ':<br/>' . $key['message'] . '<br/></h5>' . '</section>';
            }
            ?>
            <?php echo '
        </div>
        <form action ="discussion.php" method="POST">
        <textarea id="message" name="message" rows="5" cols="35" placeholder="Ecrire un message" required></textarea><br/><br/>
        <input class="submit" type="submit" name="envoyer" placeholder="Envoyer">
        </form>
    </main>
    
</body>
</html>';
        } else { //Sinon avec CONNEXION
            echo '
            <header>
            <nav class="navbar">
                <a class="navlink" href="../index/index.php">Accueil</a>
                <a class="navlink" href="../discussion/discussion.php">Discussion</a>
                <a class="navlink" href="../connexion/connexion.php">Connexion</a>
            </nav>
        </header>
        
        Vous devez vous connecter pour pouvoir discuter
             <a href="../connexion/connexion.php">Je me connecte</a>';
        }

            ?>

<?php

if (isset($_POST['envoyer'])) {
    $message = htmlspecialchars($_POST['message']);
    $message = addslashes($message);
    $date = date("Y-m-d H:i:s");
    $id = $_SESSION['id'];

    $requete2 = "INSERT INTO messages (message,id_utilisateur, date) VALUES ('$message','$id', '$date')";
    $query2 = mysqli_query($db, $requete2);
    header('location:http://localhost:8888/discussion/discussion/discussion.php');
}

?>