<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesListeRecettes.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <title>Nos Recettes</title>
</head>

<header>
        <?php include("navbar.php"); ?>

        <?php require_once 'connexion.php'; ?>
    </header>
<body>
    <p class = "header" >Voici toutes nos recettes !</p>
  
    <?php
        $sqlQuery = 'SELECT distinct (REC_ID), REC_IMAGE, CAT_INTITULE, REC_RESUME, REC_TITRE
        FROM RECETTE,CATEGORIE WHERE RECETTE.CAT_ID= CATEGORIE.CAT_ID';

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