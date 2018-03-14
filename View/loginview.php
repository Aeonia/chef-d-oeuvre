<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title>Ajouter une nouvelle activité</title>
</head><!-- Login Form -->
<div class="col-sm-12 col-md-6 col-lg-6">
<?php if(!isset($connected)) {
   echo '<h2 class="title">Login</h2>
    <form action="login.php" method="post">
        <label>Votre nom d\'utilisateur :</label>
        <input type="text" name="login">
        <br />
        <br />
        <label>Votre mot de passe :</label>
        <input type="password" name="pwd"><br />
        <input type="submit" name="connect" value="Connexion">
    </form>';
} else {
    echo '<h2 class="title">Se deconnecter</h2>
    <form action="logout.php" method="post">
    <input type="submit" name="connect" value="Déconnexion">
    </form>';
}?>
</div>
</html>
