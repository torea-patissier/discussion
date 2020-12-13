<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "discussion"); // Connexion à la Db
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
    <div class="nutellaimg">
    <p> <img src="../images/nutella1.png" alt="imgnutella"></p>
</div>
        <h2 class="h2discussion">Vous pouvez chatter avec d\'autres fan du Nutella ici</h2>
        ' ?>
            <?php
            foreach ($all as $key) { // Afficher le fil de la conversation
                echo '<section class = "tableaucommentaire">' . '<h5>'  . $key['date'] . ' de '  . $key['login'] . ':<br/>' . $key['message'] . '<br/></h5>' . '</section>';
            }
            ?>
            <?php echo '
            <div class="discussion">
                    <form action ="discussion.php" method="POST">
                    <textarea id="message" name="message" rows="6" cols="55" placeholder="Ecrire un message" required></textarea><br/><br/>
                    <input class="submit1" type="submit" name="envoyer" placeholder="Envoyer">
                    </form>
        </div>

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
</html>';
        } else { //Sinon avec CONNEXION
            echo '
            <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/discussion-index.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Discussion</title>
</head>
            <header>
            <nav class="navbar">
                <a class="navlink" href="../index/index.php">Accueil</a>
                <a class="navlink" href="../discussion/discussion.php">Discussion</a>
                <a class="navlink" href="../connexion/connexion.php">Connexion</a>
            </nav>
        </header>
        <main>
        <div class="nutellaimg">
        <p> <img src="../images/nutella1.png" alt="imgnutella"></p>
    </div>
        <p class="adiscussion1"> Vous devez vous connecter pour pouvoir discuter</p>
             <a class= "adiscussion" href="../connexion/connexion.php"><br /><br />Je me connecte</a>
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
         
         </footer>  '
             ;
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
    header('location:http://localhost/discussion/discussion/discussion.php');
}

?>