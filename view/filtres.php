<?php ob_start(); ?>

<?php include("navbar.php"); ?>

    <form class="text-center" method="post">

        <input class="text-blue-500 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"type="submit" name=Categorie value=Categorie id=catBtn>
        <br>
        <br>
        <input class="text-blue-500 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" type="submit" name=Titre value=Titre id=titreBtn>
        <br>
        <br>
        <input class="text-blue-500 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" type="submit" name=Ingredient value=Ingredient id=ingBtn>
        <br>
        <br>


    </form>


    <?php
    //si bouton catégorie cliqué, affiche les options entree, plat et dessert
    
    if (isset($_POST['Categorie'])): {
            cat();
        } ?>
        <div id="ChoixForm">
            <form class="text-center" action="index.php?action=afficheFiltre" method="post">
                <input type="radio" name=entree value=entree id=filtre>
                <label class="text-blue-500" for="entree" >Entree</label>
                <input type="radio" name=plat value=plat id=filtre>
                <label class="text-blue-500" for="plat">Plat</label>
                <input type="radio" name=dessert value=dessert id=filtre>
                <label class="text-blue-500" for="dessert">Dessert</label>
                <br>
                <input class="text-blue-500" type="submit" name=Filtrer value=filtre id=filtre>
            </form>
        </div>

        <?php
        //si bouton titre cliqué possibilité pour l'utilisateur de renseigner l'objet de sa recherche
    elseif (isset($_POST['Titre'])): {
            titre();
        } ?>
        <div id="ChoixForm">
            <form action="listeRecettes.php" method="post">
                <input type="text" name=titre id="filre">
                <br>
                <input class="text-blue-500 text-center" type="submit" name=Filtrer value=filtre id=filtre>
            </form>
        </div>
        <?php
        //si bouton Ingrédient cliqué possibilité pour l'utilisateur de renseigner l'ingrédient qu'il souhaite pour sa recette
    elseif (isset($_POST['Ingredient'])): {
            ingredient();
        } ?>

        <div id="ChoixForm">
            <form action="listeRecettes.php" method="post">
                <input type="text" id=filtre name=ingredient>
                <br>
                <input class="text-blue-500 text-center" type="submit" name=Filtrer value=filtre id=filtre>
            </form>
        </div>

        <?php
        //fin de boucle
    endif;
    ?>

    <?php
    function cat()
    {
        echo '<div class=text-blue-500 text-center>' . "Choisir une catégorie :" . '</div>';
    }
    function titre()
    {
        echo '<div class=text-blue-500 text-center>' . "Donner un mot :" . '</div>';
    }
    function ingredient()
    {
        echo '<div class=text-blue-500 text-center>' . "Donner un ingrédient :" . '</div>';
    }
    ?>

<?php $content = ob_get_clean();
    include 'template.php';
?>
