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
    <header class="banner">
        <h1 class="title">Musée</h1>
    </header>

    <nav class="container-fluid">
      <nav class="row">
        <a href="register.php"><button type="button" class="btn btn-outline-primary">Register</button></a>
        <a href="login.php"><button type="button" class="btn btn-primary">Login</button></a>
        <a href="browse.php"><button type="button" class="btn btn-primary">Le blog</button></a>
        <a href="browseevents.php"><button type="button" class="btn btn-primary">Les événements</button></a>
        <a href="contact.php"><button type="button" class="btn btn-primary">Contact</button></a>
        <a href="browseaccountevents.php"><button type="button" class="btn btn-primary">Mes événements</button></a>
        <?php if ($user == 1) {
          echo '<a href="add.php"><button type="button" class="btn btn-primary">Ajouter un article</button></a>
        <a href="addevent.php"><button type="button" class="btn btn-primary">Ajouter un événement</button></a>';
        }    
        ?>
      </nav>
    </nav>
<?php if ($user) {

    echo '<section>
    <div class="card-columns">';
      foreach ($events_of_account as $event_of_account) { 
        echo '<div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-block">
            <h4 class="card-title">'.$event_of_account['title'] .'</h4>
              <p class="card-text">'.$event_of_account['description'] .'</p>
              <a href="read.php?id='.$event_of_account['id'] .'" class="btn btn-primary">Lire</a>
          </div>
        </div>'; 
      }
      
    '</div> 
    </section>';
    } else {
      echo 'vous devez être connecté pour accéder à vos événements';
    }
   ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>