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
        <h1>Accueil</h1>

    </main>
</body>
</html>

<?php 
if(isset($_POST['deco'])){
    session_destroy();
    echo' Vous êtes déconnecté';
    header('locationhttp://localhost:8888/discussion/index/index.php');
    
}


?>