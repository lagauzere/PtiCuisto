<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
    <!-- Se connecter -->
    
                
                <form action="index.php?action=connexionUser" method="post">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label><br/>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm " 
                        type="text" id="pseudo" name="pseudo">
                        <div ><?php echo $errorPseudo ?? "";?></div>
                    </div>
                    <div class="form-group">
                        <label for="pass">Mot de passe</label><br/>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm "
                         type="password" id="pass" name="pass">
                         <div ><?php echo $errorPassword ?? "";?></div>
                    </div>
                    <button type="submit" class= "bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium">Se connecter</button><br/><br/>
                    <a class="  rounded-md px-3 py-2 text-sm font-medium" href="index.php?action=registration">Vous souhaitez vous inscrire ?</a>
                </form>

                
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>