<?php ob_start(); ?>
   
<div class="container pb-4">
        
        <div class="mt-5 justify-content-center text-danger font-weight-light border border-danger">
            <div class="col-12 col-md-6 col-lg-4 py-5">
                <h3 class="font-weight-light">Ajoutez une recette : </h3>
                <hr class="border border-info"><br/>
                
                <form action="index.php?action=saveEdito" method="post">
                        <label for="contentEdito">Contenu de l'edito : </label>
                        <br>
                        <input class="form-control border border-info" type="text" id="contentEdito" name="contentEdito">
                                    
                    <button type="submit" class="text-gray-900 btn-info btn-sm shadow">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>



    <p class="header">Voici les recettes en attente de validation :</p>
    <?php 
        foreach($recipes as $recipe){?>
            <div class="recette">
                <?= '<img class="imgR" src="'. $recipe['REC_IMAGE'] .'"/>'. "\n" .
                        '<a href="index.php?action=voirRecette"><div class="titre">' . $recipe['REC_TITRE'] . '</div> </a>' . "\n" .
                        '<div class="resume">' . $recipe['REC_RESUME'] . '</div>' . "\n".
                        '<div class="resume">' . $recipe['REC_CONTENU'] . '</div>' . "\n";
                ?>
                  <a class="font-weight-light font-italic text-info" href="index.php?action=accepter&id=<?= $recipe['REC_ID'] ?>">
                  <button class="text-black btn-info btn-sm shadow">Accepter la recette</button>
                 </a>
                 <a class="font-weight-light font-italic text-info" href="index.php?action=refuser&id=<?= $recipe['REC_ID'] ?>">
                  <button class="text-black btn-info btn-sm shadow">Refuser la recette</button>
                 </a>
        </div>
        <?php
        }
    ?>






<?php $content = ob_get_clean();
    include 'template.php';
?>