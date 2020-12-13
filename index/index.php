<?php
session_start();

if (isset($_SESSION['id']) and 'id' == TRUE) {
    echo '
    <header>
    <nav class="navbar">
        <a class="navlink" href="../index/index.php">Accueil</a>
        <a class="navlink" href="../discussion/discussion.php">Discussion</a>
        <a class="navlink" href="../profil/profil.php">Profil</a>
    </nav>
</header>';
} else {
    echo '    <header>
    <nav class="navbar">
        <a class="navlink" href="../index/index.php">Accueil</a>
        <a class="navlink" href="../discussion/discussion.php">Discussion</a>
        <a class="navlink" href="../connexion/connexion.php">Connexion</a>
    </nav>
</header>';
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/discussion-index.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Accueil</title>
</head>

<body>
    <main>
        <div class="imgheader">
            <img src="../images/nutella.jpg" alt="persomsn">
        </div>

        <div id="blocnutella">

            <div class="imgnutella">
                <p>
                    <img src="../images/nutellapot.jpg" alt="nutellapot">
                </p>
            </div>

            <div class="textnutella">
                <h2>
                    UN PRODUIT MYTHIQUE
                </h2>

                <p>
                    Plus de 50 ans d’histoire et de plaisir. Depuis sa création, NUTELLA ® a su conquérir un à un le cœur des français et devenir une des marques alimentaires préférée des français.

                    *Tracking Ipsos 2014-2015, critère « brand I love », 2ème marque la plus appréciée parmi les Hommes/Femmes de 25-55 ans et les mères d’enfants de moins de 15 ans.

                </p><br />
            </div>

        </div>
        <div class="nutellavideo">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/DGLUqeFGI9Y" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div><br />


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
if (isset($_POST['deco'])) {
    session_destroy();
    echo ' Vous êtes déconnecté';
    header('locationhttp://localhost/discussion/index/index.php');
}


?>