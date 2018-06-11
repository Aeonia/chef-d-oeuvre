<?php ob_start() ; ?>  
    <section>
<div class="contact">
<!--Section heading-->
<h2 class="section-heading h1 pt-4">Contactez-nous !</h2>
<!--Section description-->
<p class="section-description">Pour toute demande d'information merci de remplir ce formulaire</p>

<div class="row">

    <!--Grid column-->
    <div class="col-md-8 col-xl-9">
        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="name" class="form">Nom</label>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="email" class="form">Adresse mail</label>
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form">
                        <input type="text" id="subject" name="subject" class="form-control">
                        <label for="subject" class="form">Sujet</label>
                    </div>
                </div>
            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12">

                    <div class="md-form">
                        <textarea type="text" id="message" name="message" rows="2" class="form form-control md-textarea"></textarea>
                        <label for="message" class="form">Message</label>
                    </div>

                </div>
            </div>
            <!--Grid row-->

        </form>

        <div class="center-on-small-only">
            <a class="btn btn-primary check" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
        </div>
        <div class="status"></div>
    </div>
    <!--Grid column-->


</div>
    </div>
</section>
<!--Section: Contact v.2-->

</body>
</html>

<?php
$content = ob_get_clean(); ?>


<?php include 'templateview.php'; ?>


