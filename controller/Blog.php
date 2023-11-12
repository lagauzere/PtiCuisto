<?php
    require './model/RecipeManager.php'; 
    $categoryRecipeID;
    require './model/EditoManager.php'; 
class Blog 
{
    // Méthode pour afficher les chapitres / page d'accueil
    public function listPosts()
    {
        $EditoManager=new EditoManager();
        $recipeManager = new RecipeManager(); 
        $posts = $recipeManager->getPosts(); 
        $posts2 = $recipeManager->getPosts(); 
        $posts3 = $EditoManager->getEdito();
        require('./view/homeview.php');
    }

    public function listsUsersRecipes(){
        $recipeManager = new RecipeManager();
        $userRecipe = $recipeManager->getUserRecipe($_SESSION['id']);
        require('./view/listeRecettesUser.php');
    }

    public function addRecipes(){
        require('view/ajoutRecette.php');
    }

    public function saveRecipe($nameRecipe, $contentRecipe, $summaryRecipe, $categoryRecipe, $imageRecipe){
        if ($categoryRecipe === 'Entrée') {
            $categoryID = 1;
        } elseif ($categoryRecipe === 'Plat') {
            $categoryID = 2;
        } elseif ($categoryRecipe === 'Dessert') {
            $categoryID = 3;
        }

        if(isset($imageRecipe)){
            $recipeManager = new RecipeManager();
            $recipeManager->sauvegarderRecetteAvecImage($nameRecipe, $contentRecipe, $summaryRecipe, $categoryID, $_SESSION['id'],$imageRecipe);
            header('location: index.php?action=mesRecettes'); 
        } else {
            $recipeManager = new RecipeManager();
            $recipeManager->sauvegarderRecette($nameRecipe, $contentRecipe, $summaryRecipe, $categoryID, $_SESSION['id']);
            header('location: index.php?action=mesRecettes'); 
        }
    }

    public function filtre(){
        require ('./view/filtres.php');
    }

    public function afficheRecettes($filtre){
        $recipeManager = new RecipeManager(); 
        $recipes= $recipeManager->showRecipe($filtre);
        require("./view/listeRecettes.php");
    }


    public function nosRecettes(){
        $recipeManager= new RecipeManager();
        $recipes=$recipeManager->showourrecipes();
        require("./view/nosRecettes.php");
    }

    public function options(){
        $recipeManager= new RecipeManager();
        $recipes=$recipeManager->showourRecipesOnHold();
        require ('./view/options.php');
    }

    public function detail($recette){
        $recipeManager= new RecipeManager();
        $recipes=$recipeManager->showDetails($recette);
        require("./view/detailRecette.php");
    }
    
     
    public function modifierRecette($rec_id) {
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['id'])) {
            header('Location: index.php?action=connexion');
            die();
        }
    
        // Récupérez la recette à modifier depuis la base de données
        $recipeManager = new RecipeManager();
        $recipe = $recipeManager->getRecipeById($rec_id);
    
        // Vérifiez si l'utilisateur connecté est l'auteur de la recette
        if ($_SESSION['id'] == $recipe['REC_AUTEUR'] || isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
            // Affichez le formulaire de modification pré-rempli avec les détails de la recette
            require('view/modifierRecette.php');
        } else {
            // Redirigez l'utilisateur s'il n'est pas autorisé à modifier cette recette
            header('Location: index.php?action=mesRecettes');
        }
    }

    public function updateRecipe($nameRecipe, $contentRecipe, $summaryRecipe, $rec_id) {
       $recipeManager = new RecipeManager();
       if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0){
            $recipeManager->updateRecipeAdmin($nameRecipe, $contentRecipe, $summaryRecipe, $rec_id);
            header('Location: index.php?action=optionsAdmin');
       } else {
            $recipeManager->updateRecipe($nameRecipe, $contentRecipe, $summaryRecipe, $rec_id);
            header('Location: index.php?action=mesRecettes');
       }
       
    }
    
    public function supprimerRecette($rec_id){
        $rec_id = (int)$rec_id;
        $recipeManager = new RecipeManager();
        $recipeManager->deleteRecipe($rec_id);
        header('Location: index.php?action=mesRecettes');
    }
}
