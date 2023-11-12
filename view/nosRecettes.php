<?php ob_start(); ?>
   
    <?php
    // On affiche chaque recette une à une
    foreach ($recipes as $recipe) {
        ?>
        <div class="recette">
            <p>
                <?php
                if($recipe['REC_STATUT']==0 && $recipe['REC_REFU']==0){
                echo '
                <a href="index.php?action=detailRecette&recette='. $recipe['REC_TITRE'] .'">
                <img  src="'. $recipe['REC_IMAGE'] .'"/></a>'. "\n" .
                    '<a href="index.php?action=detailRecette&recette='. $recipe['REC_TITRE'] .'">
                    <div class="titre">' . $recipe['REC_TITRE'] . '</div></a>' . "<br>" .
                    '<div class="resume">' . $recipe['REC_RESUME'] . '</div>' . "<br>";
                }
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
