<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register/Login</title>
  </head>
  <!-- Banner -->
  <body class="background_color">
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
     

  <body class="background_color">     
    <div id="banner">
    <div class="btn-group  float-right" id="login">
          <button type="button" class="btn btn-secondary dropdown-toggle btn-nav" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if (isset($user)) { echo "Logout";} else { echo "Login";} ?>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
          <?php if (!isset($user)) {
              echo '<a href="register.php"><button type="button" class="btn btn-outline-primary" id="button-top">Register</button></a>';
            }    
            ?>
              <a href="login.php"><button type="button" class="btn btn-primary" id="button-top"><?php if (isset($user)) { echo "Déconnexion";} else { echo "Connexion";} ?></button></a>

              <?php if ((isset($user)) && $user == 1) {
                
                  echo '<a href="add.php"><button type="button" class="btn btn-primary" id="button-top">Ajouter un article</button></a>
                <a href="addevent.php"><button type="button" class="btn btn-primary" id="button-top">Ajouter un événement</button></a>';
                }
                ?>
          </div>
      </div>  
    <header>
        
    </header>
    <ul class="nav justify-content-left">
    <a href="index.php"><p class="title">Musée</p></a>
    <div class="btn-group-horizontal">
        <a href="browse.php"><button type="button" class="btn btn-primary btn-nav" id="button-top">Le blog</button></a>
        <a href="browseevents.php"><button type="button" class="btn btn-primary btn-nav" id="button-top">Les événements</button></a>
        <a href="contact.php"><button type="button" class="btn btn-primary btn-nav" id="button-top">Contact</button></a>
        <a href="browseaccountevents.php"><button type="button" class="btn btn-primary btn-nav" id="button-top">Mes événements</button></a>  
    </div>
      </ul>
    </div>
    
    </div>

    <?php 
  
            echo $content ; 
            ?>
 <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" data-toggle="tooltip" data-placement="left"><i class="fas fa-angle-double-up"></i></a>
 <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> 
 </html>