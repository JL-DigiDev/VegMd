<article class="row">
    <?php
        if(@$stat=="true"){
            ?> <div class="alert alert-success col-md-12" role="alert">
                Merci d'avoir proposé votre médecin. Une vérification sera bientôt effectuée.
            </div> <?php
        }else if(@$stat=="false"){
            ?> <div class="alert alert-danger col-md-12" role="alert">
                Un problème a été rencontré lors de l'envoi du formulaire. Veuillez rééssayer.
            </div> <?php
        }
    ?>
    <h1 class="offset-md-1 col-md-10 text-success border-bottom border-success">Ajouter un médecin</h1>
    <form class="offset-md-1 col-md-10" action="index.php?p=add&amp;a=send" method="post">
        <h2 class="col-md-12 text-success border-bottom border-success">Le médecin</h2>
        <label for="lastname" class="col-md-2">Nom: </label><input type="text" name="lastname" class="col-md-3" required />
        <label for="firstname" class="col-md-2">Prénom: </label><input type="text" name="firstname" class="col-md-3" required />
        <label for="street" class="col-md-2">Rue: </label><input type="text" name="street" class="col-md-3" required />
        <label for="house" class="col-md-2">N°: </label><input type="text" name="house" class="col-md-3" />
        <label for="city" class="col-md-2">Ville: </label><input type="text" name="city" class="col-md-3" required />
        <label for="zip" class="col-md-2">Code postal: </label><input type="text" name="zip" class="col-md-3" required />
        <div class="alert alert-secondary col-md-10">
            Cliquer à l'emplacement voulu sur la carte pour compléter automatiquement les coordonnées géographique.<br>
            Pour un meilleur positionnement, veuillez zoomer totalement sur la carte.
            <div class="col-md-12 border border-secondary rounded" id=minimap></div>
        </div>
        <label for="long" class="col-md-2">Longitude: </label><input type="text" name="long" class="col-md-3" id="longi" required />
        <label for="latt" class="col-md-2">Lattitude: </label><input type="text" name="latt" class="col-md-3" id="latti" required />
        <label for="phone" class="col-md-2">Téléphone: </label><input type="text" name="phone" class="col-md-3" />
        <label for="web" class="col-md-2">Site Web: </label><input type="text" name="web" class="col-md-3" />
        <label for="spe" class="col-md-2">Spécialisation: </label>
            <select class="col-md-3" name="spe" required>
                <?php
                    foreach ($spe as $es) {
                        echo "<option value='".$es["ID"]."'>".$es["NameSpe"]."</option>";
                    }
                ?>
            </select>
        <div class="offset-md-12 col-md-12"></div>
        <label for="tol" class="col-md-2">Tolérance: </label>
        <select class="col-md-3" name="tol" required>
            <?php
                foreach ($tol as $et) {
                    echo "<option value='".$et["ID"]."'>".$et["Friendly"]." Friendly</option>";
                }
            ?>
        </select>

        <h2 class="col-md-12 text-success border-bottom border-success">Informations personnelles</h2>
        <div class="alert alert-secondary col-md-10">
            Vos informations sont obligatoires.<br>
            Elles ne sont utilisées qu'en cas de problème avec une information donnée.
        </div>
        <label for="lastnameSend" class="col-md-2">Votre nom: </label><input type="text" name="lastnameSend" class="col-md-3" required />
        <label for="firstnameSend" class="col-md-2">Votre Prénom: </label><input type="text" name="firstnameSend" class="col-md-3" required />
        <label for="email" class="col-md-2">Votre email: </label><input type="email" name="email" class="col-md-3" required />
        <div class="offset-md-12 col-md-12"></div>
        <!-- ReCAPTCHA -->
        <div class="col-md-6 g-recaptcha" data-sitekey="your sitekey"></div>
        <div class="offset-md-12 col-md-12"></div>
        <button type="submit" class="btn btn-success offset-md-3 col-md-2">Envoyer</button>
        <button type="reset" class="btn btn-secondary offset-md-1 col-md-2">Reset</button>

    </form>
    <div class="offset-md-12 col-md-12"><br></div>
    <script src="scripts/coord.js"></script>
</article>
