<article class="row">
    <?php
        if(@$stat=="true"){
            ?> <div class="alert alert-success col-md-12" role="alert">
                Votre message a bien été envoyé.
            </div> <?php
        }else if(@$stat=="false"){
            ?> <div class="alert alert-danger col-md-12" role="alert">
                Un problème a été rencontré lors de l'envoi du message. Veuillez rééssayer.
            </div> <?php
        }
    ?>
    <h1 class="offset-md-1 col-md-10 text-success border-bottom border-success">Contact</h1>

    <form class="offset-md-1 col-md-10" action="index.php?p=contact&amp;a=send" method="post">
        <label for="lastname" class="col-md-2">Nom: </label><input type="text" name="lastname" class="col-md-3" required />
        <label for="firstname" class="col-md-2">Prénom: </label><input type="text" name="firstname" class="col-md-3" required />
        <label for="mail" class="col-md-2">Email: </label><input type="text" name="mail" class="col-md-3" required /><br>
        <label for="obj" class="col-md-2">Objet: </label><input type="text" name="obj" class="col-md-8" required /><br>
        <label for="message">Message</label><br>
        <textarea class="col-md-12" name="message" rows="5" required ></textarea>

        <div class="offset-md-12 col-md-12"></div>
        <!-- ReCAPTCHA -->
        <div class="col-md-6 g-recaptcha" data-sitekey="your sitekey"></div>
        <div class="offset-md-12 col-md-12"></div>
        <button type="submit" class="btn btn-success offset-md-3 col-md-2">Envoyer</button>
        <button type="reset" class="btn btn-secondary offset-md-1 col-md-2">Reset</button>
        <div class="offset-md-12 col-md-12"></div>

    </form>
    <div class="offset-md-12 col-md-12"></div>
</article>
