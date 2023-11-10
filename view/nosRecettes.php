<?php ob_start(); ?>
   
    <?php
    // On affiche chaque recette une à une
    foreach ($recipes as $recipe) {
        ?>
        <div class="recette">
            <p>
                <?php echo '<img src="'. $recipe['REC_IMAGE'] .'"/>'. "\n" .
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
