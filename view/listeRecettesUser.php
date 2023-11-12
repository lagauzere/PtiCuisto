<?php ob_start(); ?>
<div>
      <a href="index.php?action=ajouterRecette">  <button class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Ajouter une recette</button></a>
    </div>
    <?php 
        foreach($userRecipe as $recipe){?>
            <div class="recette">
                <img class="imgR" src="<?= $recipe['REC_IMAGE'];?>"/>
                <a href="index.php?action=detailRecette&amp;recette=<?=$recipe['REC_TITRE'];?>"><div class="titre"><?= $recipe['REC_TITRE']; ?></div></a>
                <div class="resume"><?=$recipe['REC_RESUME'];?></div>
                
                <?php
                 if ($recipe['REC_STATUT']==1){?>
                    <p>Recette en cours de validation par un administrateur. <p>';
                 <?php}elseif($recipe['REC_REFU']==1){ ?>
                    <p>Recette refusé par un administrateur, veuillez la modfier. <p>'
                <?php
                 }
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