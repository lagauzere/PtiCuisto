<?php ob_start(); ?>
<div>
      <a href="index.php?action=AjouterRecette">  <button class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Ajouter une recette</button></a>
    </div>
    <?php 
        foreach($userRecipe as $recipe ){?>
            <div class="recette">
            <p>
                <?php echo '<img class="imgR" src="'. $recipe['REC_IMAGE'] .'"/>'. "\n" .
                    '<div class="titre">' . $recipe['REC_TITRE'] . '</div>' . "<br>" .
                    '<div class="resume">' . $recipe['REC_RESUME'] . '</div>' . "<br>";
                // $recipe['REC_TAG']
                ?>
            </p>
        </div>
        <?php
        }
    ?>

    


<?php $content = ob_get_clean();
    include 'template.php';
?>