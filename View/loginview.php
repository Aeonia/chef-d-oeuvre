<?php ob_start() ; ?> 
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

<?php
$content = ob_get_clean(); ?>


<?php include 'templateview.php'; ?>
