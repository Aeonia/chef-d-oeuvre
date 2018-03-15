<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title>Modification de l'activité</title>
  </head>

  <body class="background_color">
    <nav>
      <header class="banner">
        <h1 class="title">Modifier un article</h1>
      </header>
       <form action="edit.php" method="post">
        <div>
          <label>
            Nom de l'article :
            <input type="text" name="title" value="<?php echo $article['title']; ?>">
          </label>
        </div>
        <div>
          <label>
            Corps de l'article:
            <textarea name="body"><?php echo $article['body']; ?>
            </textarea>
          </label>
        </div>
        <div>
          <label>
            Description de l'article:
            <textarea name="description"><?php echo $article['description']; ?>
            </textarea>
          </label>
        </div>
        <div>
          <input type="submit" value="envoyer">
        </div>
      </form>
      <ul class="font_color">
        <li><a href="read.php?id=<?php echo $article['id']; ?>">annuler</a></li>
        <li><a href="browse.php">retour à la liste</a></li>
      </ul>
    </nav>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
