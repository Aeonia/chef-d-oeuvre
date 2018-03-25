<?php ob_start() ; ?> 
    <section>
      <ul>
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
              <?php
              foreach ($articles as $article) { ?>
                <div class="card">
                    <img class="card-img-top" src="./img/img2.jpg" alt="Card image cap">
                    <div class="card-block">
                      <h4 class="card-title"><?php echo $article['title']; ?></h4>
                        <p class="card-text"><?php echo $article['description']; ?></p>
                        <a href="read.php?id=<?php echo $article['id']; ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>  
                    <?php
                    }
                    ?>
            </div>
    </section>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$content = ob_get_clean(); ?>


<?php include 'templateview.php'; ?>