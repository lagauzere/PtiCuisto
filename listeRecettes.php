<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeRecetteFiltrees</title>
    <link rel="stylesheet" href="css/stylesListeRecettes.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">


</head>



<body>

    <header>
        <?php include("navbar.php"); ?>

        <?php require_once 'connexion.php'; ?>
    </header>

    <p class="header">Voici les recettes correspondant à vos critères :</p>
    <?php


    if (isset($_POST['entree'])) {
        $sqlQuery = 'SELECT * FROM RECETTE Where CAT_ID in( Select CAT_ID From CATEGORIE where CAT_INTITULE = "entree" )';
    } else if (isset($_POST['plat'])) {
        $sqlQuery = 'SELECT * FROM RECETTE Where CAT_ID in( Select CAT_ID From CATEGORIE where CAT_INTITULE = "plat" )';
    } else if (isset($_POST['dessert'])) {
        $sqlQuery = 'SELECT * FROM RECETTE Where CAT_ID in( Select CAT_ID From CATEGORIE where CAT_INTITULE = "dessert" )';
    } else if (isset($_POST['titre'])) {
        $sqlQuery = 'SELECT * FROM RECETTE Where REC_TITRE like "%' . $_POST['titre'] . '%"';
    } else if (isset($_POST['ingredient'])) {
        $sqlQuery = 'SELECT * FROM RECETTE Where REC_CONTENU like "%' . $_POST['ingredient'] . '%" or REC_TITRE like "%' . $_POST['ingredient'] . '%"';
    }

    $recipesStatement = $pdo->prepare($sqlQuery);
    $recipesStatement->execute();
    $recipes = $recipesStatement->fetchAll();


    // On affiche chaque recette une à une
    foreach ($recipes as $recipe) {
        ?>
        <div class="recette">
            <p>
                <?php echo '<div class="image">' . $recipe['REC_IMAGE'] . '</div>' . "\n" .
                    '<div class="titre">' . $recipe['REC_TITRE'] . '</div>' . "<br>" .
                    //'<div class="categorie">' . $recipe['REC_CATEGORIE'] . '</div>' . "<br>" .
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