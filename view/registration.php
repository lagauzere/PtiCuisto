
<?php ob_start(); ?>
<div class="container pb-4">
        <div class="row mt-5 justify-content-center text-danger font-weight-light border border-danger">
            <div class="col-12 col-md-6 col-lg-4 py-5">
                <h3 class="font-weight-light">Inscrivez-vous</h3>
                <hr class="border border-info"><br/>
                
                <form action="index.php?action=saveUser" method="post">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input class="form-control border border-info" type="text" id="pseudo" name="pseudo">
                    </div>
                    <div class="form-group">
                        <label for="pass">Mot de passe</label>
                        <input class="form-control border border-info" type="password" id="pass" name="pass">
                        <div class="font-weight-light font-italic text-info"><?= $errorPassword ?? "";?></div>
                    </div>
                    <div class="form-group">
                        <label for="pass2">Confirmation du mot de passe</label>
                        <input class="form-control border border-info" type="password" id="pass2" name="pass2">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control border border-info" type="text" id="email" name="email">
                        <div class="font-weight-light font-italic text-info"><?= $errorEmail ?? "";?></div>
                    </div>
                    <button type="submit" class="text-white btn-info btn-sm shadow">Confirmer</button>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('template.php'); ?>