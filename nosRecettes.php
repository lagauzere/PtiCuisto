<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
    <?php
        $sqlQuery = 'SELECT distinct REC_ID, REC_IMAGE, CAT_INTITULE, REC_RESUME, REC_TITRE
        FROM RECETTE,CATEGORIE';

        $recipesStatement = $pdo->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();


        // On affiche chaque recette une à une
        foreach ($recipes as $recipe) {
            ?>
            <div class="recette">
            <p>
                <?php echo '<img src="'. $recipe['REC_IMAGE'] .'"/>'. "\n" .
                    '<div class="titre">' . $recipe['REC_TITRE'] . '</div>' . "<br>" .
                    '<div class="categorie">' . $recipe['CAT_INTITULE'] . '</div>' . "<br>" .
                    '<div class="resume">' . $recipe['REC_RESUME'] . '</div>' . "<br>";
                // $recipe['REC_TAG']
                ?>
            </p>
        </div>
        <?php
    }

    ?>


</body>
</html>