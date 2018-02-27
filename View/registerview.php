<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title>Ajouter une nouvelle activité</title>
</head><!-- Register Form -->
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