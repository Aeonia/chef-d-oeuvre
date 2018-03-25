<?php ob_start() ; ?> 
    <section>
      <header class="banner">
        <h1><?php echo $event['title']; ?></h1>
      </header>
      <p class="font_color"><?php echo $event['description']; ?></p>
      <?php if ((isset($user)) && $user == 1) {
          echo '
      <ul class="font_color">
        <li><a href="editevents.php?id='. $event['id'].'">modifier cet article</a></li>
        <li><a href="deleteevents.php?id='. $event['id'].'">supprimer cet article</a></li>
        <li><a href="browseevents.php">retour à la liste</a></li>
      </ul>';
      }
      ?>
    </section>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$content = ob_get_clean(); ?>


<?php include 'templateview.php'; ?>