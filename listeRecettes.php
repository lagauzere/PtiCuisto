<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeRecetteFiltrees</title>

</head>

<header>
    <h1>Voici les recettes correspondantes à vos critères :</h1>
    <?php require_once 'connexion.php'; ?>
</header>

<body>

    <?php


        if(isset($_POST['entree'])){
        $sqlQuery = 'SELECT * FROM RECETTE,CATEGORIE Where CAT_ID in( Select CAT_ID From CATEGORIE where CAT_INTITULE = "entree" )';
        }
        else if (isset($_POST['plat'])){
            $sqlQuery = 'SELECT * FROM RECETTE,CATEGORIE Where CAT_ID in( Select CAT_ID From CATEGORIE where CAT_INTITULE = "plat" )';
            }
        else if (isset($_POST['dessert'])){
            $sqlQuery = 'SELECT * FROM RECETTE,CATEGORIE Where CAT_ID in( Select CAT_ID From CATEGORIE where CAT_INTITULE = "dessert" )';
            }

        else if (isset($_POST['titre'])){
            $sqlQuery = 'SELECT * FROM RECETTE,CATEGORIE Where REC_TITRE like "%'.$_POST['titre'].'%"';
            }

        else if (isset($_POST['ingredient'])){
            $sqlQuery = 'SELECT DISTINCT(REC_ID),REC_TITRE,REC_IMAGE,CAT_INTITULE,REC_RESUME 
            FROM RECETTE,INGREDIENT,CATEGORIE WHERE lower(ING_INTITULE) 
            like "%'.$_POST['ingredient'].'%" and REC_CONTENU like "%'.$_POST['ingredient'].'%" and RECETTE.CAT_ID= CATEGORIE.CAT_ID;';
            //"%'.$_POST['ingredient'].'%" or REC_TITRE like "%'.$_POST['ingredient'].'%"';
            }

        $recipesStatement = $pdo->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        

// On affiche chaque recette une à une
    foreach ($recipes as $recipe) {
    ?>
    <p><?php echo $recipe['REC_TITRE']."\n".
            $recipe['REC_IMAGE']."<br>".
            $recipe['CAT_INTITULE']."<br>".
            $recipe['REC_RESUME'];
     ?></p>
    <?php
    }
    ?>
</body>
</html>