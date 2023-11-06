<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
    <!-- Se connecter -->
    
                
                <form action="index.php?action=connexionUser" method="post">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label><br/>
                        <input class="form-control border border-info" type="text" id="pseudo" name="pseudo">
                        <div class="font-weight-light font-italic text-info"><?php echo $errorPseudo ?? "";?></div>
                    </div>
                    <div class="form-group">
                        <label for="pass">Mot de passe</label>
                        <input class="form-control border border-info" type="password" id="pass" name="pass">
                        <div class="font-weight-light font-italic text-info"><?php echo $errorPassword ?? "";?></div>
                    </div>
                    <button type="submit" class="text-white btn-info btn-sm shadow">Se connecter</button><br/><br/>
                    <a class="font-italic text-info" href="index.php?action=registration">Vous souhaitez vous inscrire ?</a>
                </form>

                
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?