<?php ob_start() ; ?> 
    <div class="col-sm-12 col-md-6 col-lg-6">
        <h2 class="title">Register</h2>
        <form action="register.php" method="post">
            <label>Nom d'utilisateur :</label>
            <input type="text" name="login">
            <br />
            <br />
            <label>Mot de passe :</label>
            <input type="password" name="pwd"><br />
            <br />
            <br />
            <label>Confirmation du mot de passe :</label>
            <input type="password" name="confirm_pwd"><br />
            <br />
            <br />
            <label>Adresse mail :</label>
            <input type="mail" name="email"><br />
            <input type="submit" name="register" value="Register">
        </form>
    </div>
</html>

<?php
$content = ob_get_clean(); ?>


<?php include 'templateview.php'; 
?>