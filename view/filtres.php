<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtres</title>
</head>

<body>

    <?php require("navbar.php"); ?>

    <form method="post">

        <input type="submit" name=Categorie value=Categorie id=catBtn>
        <br>
        <br>
        <input type="submit" name=Titre value=Titre id=titreBtn>
        <br>
        <br>
        <input type="submit" name=Ingredient value=Ingredient id=ingBtn>
        <br>
        <br>


    </form>


    <?php
    //si bouton catégorie cliqué, affiche les options entree, plat et dessert
    
    if (isset($_POST['Categorie'])): {
            cat();
        } ?>
        <div id="ChoixForm">
            <form action="listeRecettes.php" method="post">
                <input type="radio" name=entree value=entree id=entree>
                <label for="entree">Entree</label>
                <input type="radio" name=plat value=plat id=plat>
                <label for="plat">Plat</label>
                <input type="radio" name=dessert value=dessert id=dessert>
                <label for="dessert">Dessert</label>
                <br>
                <input type="submit" name=Filtrer value=filtre id=filtre>
            </form>
        </div>

        <?php
        //si bouton titre cliqué possibilité pour l'utilisateur de renseigner l'objet de sa recherche
    elseif (isset($_POST['Titre'])): {
            titre();
        } ?>
        <div id="ChoixForm">
            <form action="listeRecettes.php" method="post">
                <input type="text" id=titre name=titre>
                <br>
                <input type="submit" name=Filtrer value=filtre id=filtre>
            </form>
        </div>
        <?php
        //si bouton Ingrédient cliqué possibilité pour l'utilisateur de renseigner l'ingrédient qu'il souhaite pour sa recette
    elseif (isset($_POST['Ingredient'])): {
            ingredient();
        } ?>

        <div id="ChoixForm">
            <form action="listeRecettes.php" method="post">
                <input type="text" id=Ingredient name=ingredient>
                <br>
                <input type="submit" name=Filtrer value=filtre id=filtre>
            </form>
        </div>

        <?php
        //fin de boucle
    endif;
    ?>

    <?php
    function cat()
    {
        echo "Choisir une catégorie :";
    }
    function titre()
    {
        echo "Donner un mot :";
    }
    function ingredient()
    {
        echo "Donner un ingrédient :";
    }
    ?>

</body>

</html>