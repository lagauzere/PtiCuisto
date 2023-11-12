<?php ob_start(); ?>
   
    <?php
    // On affiche chaque recette une à une
    foreach ($recipes as $recipe) {
        ?>
        <div class="recette">
            <p>
                <img src="<?=$recipe['REC_IMAGE'];?>"/> <br>
                <div class="titre"> <?= $recipe['REC_TITRE']; ?> </div> <br>
                <div class="resume"> <?= $recipe['REC_RESUME']; ?> </div> <br>
                <div class="resume"> <?= $recipe['REC_CONTENU']; ?> <div> <br>

            </p>
        </div>
        <?php
    }
    ?>

<?php $content = ob_get_clean();
    include 'template.php';
?>
