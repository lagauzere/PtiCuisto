<?php ob_start(); ?>
<div>
      <a href="index.php?action=ajouterRecette">  <button class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Ajouter une recette</button></a>
    </div>
    <?php 
        foreach($userRecipe as $recipe){?>
            <div class="recette">
                <?= '<img class="imgR" src="'. $recipe['REC_IMAGE'] .'"/>'. "\n" .
                        '<a href="index.php?action=voirRecette"> <h1>' . $recipe['REC_TITRE'] . '</h1> </a>' . "\n" .
                        '<div class="resume">' . $recipe['REC_RESUME'] . '</div>' . "\n";
                ?>

                  <a class="font-weight-light font-italic text-info" href="index.php?action=supprimerRecette&amp;rec_id=<?= $recipe['REC_ID'] ?>">
                  <button class="text-black btn-info btn-sm shadow">Supprimer la recette</button>
                 </a>

                 <a class="font-weight-light font-italic text-info" href="index.php?action=modifierRecette&amp;rec_id=<?= $recipe['REC_ID'] ?>">
                  <button class="text-black btn-info btn-sm shadow">Modifier la recette</button>
                 </a>
        </div>
        <?php
        }
    ?>

<?php $content = ob_get_clean();
    include 'template.php';
?>