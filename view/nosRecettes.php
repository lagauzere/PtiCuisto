<?php ob_start(); ?>
   
    <?php
    // On affiche chaque recette une à une
    foreach ($recipes as $recipe) {
        ?>
        <div class="recette">
            <p>
                
                <?php
                if($recipe['REC_STATUT']==0 && $recipe['REC_REFU']==0){?>
                    <a href="index.php?action=detailRecette&recette=<?=$recipe['REC_TITRE']; ?>">
                    <img src="<?=$recipe['REC_IMAGE']; ?>"/></a>
                    <a href="index.php?action=detailRecette&recette=<?=$recipe['REC_TITRE'];?>">
                    <div class="titre"><?=$recipe['REC_TITRE']; ?></div></a><br>
                    <div class="resume"><?=$recipe['REC_RESUME']; ?></div><br>
                    <?php 
                    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
                    ?>
                    <a class="font-weight-light font-italic text-info" href="index.php?action=modifierRecetteAdmin&amp;rec_id=<?=$recipe['REC_ID']; ?>">
                    <button class="text-black btn-info btn-sm shadow">Modifier la recette</button>
                    </a>

                    <a class="font-weight-light font-italic text-info" href="index.php?action=supprimerRecette&amp;rec_id=<?=$recipe['REC_ID'];?>">
                    <button class="text-black btn-info btn-sm shadow">Supprimer la recette</button>
                    </a>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </p>
        </div>
        <?php
    }
    ?>

<?php $content = ob_get_clean();
    include 'template.php';
?>
