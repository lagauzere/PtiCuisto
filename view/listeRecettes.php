
<?php ob_start(); ?>
   
    <p class="header">Voici les recettes correspondant à vos critères :</p>
    <?php


    // On affiche chaque recette une à une
    foreach ($recipes as $recipe) {
        ?>
        <div class="recette">
            <p>
                <?php if($recipe['REC_STATUT']==0){?>
                
                <a href="index.php?action=detailRecette&recette=<?=$recipe['REC_TITRE'];?>">
                <img  src="<?=$recipe['REC_IMAGE']; ?>"/></a>
                <a href="index.php?action=detailRecette&recette=<?=$recipe['REC_TITRE'];?>">
                    <div class="titre"><?=$recipe['REC_TITRE'];?></div></a><br>
                    '<div class="resume"><?=$recipe['REC_RESUME'];?></div><br>
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
