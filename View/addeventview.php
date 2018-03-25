<?php ob_start() ; ?> 
    <section>
      <header class="banner">
        <h1 class="title">Ajoutez un nouvel événement</h1>
      </header>
      <section>
        <form action="addevent.php" method="post">
          <div>
            <label>
              Titre de l'événement :
              <input type="text" name="title" value="">
            </label>
          </div>
          <div>
            <label>
              Corps de l'événement :
              <textarea name="body"></textarea>
            </label>
          </div>
          <div>
            <label>
              Description :
              <textarea name="description"></textarea>
            </label>
          </div>
          <div>
            <input type="submit" value="envoyer">
          </div>
        </form>
      </section>

      <ul class="font_color">
        <li><a href="browseevents.php">retour à la liste</a></li>
      </ul>
  </section>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$content = ob_get_clean(); ?>


<?php include 'templateview.php'; ?>