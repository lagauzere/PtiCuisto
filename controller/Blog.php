<?php
    require './model/RecipeManager.php'; 
    $categoryRecipeID;
class Blog 
{
    // Méthode pour afficher les chapitres / page d'accueil
    public function listPosts()
    {
        $recipeManager = new RecipeManager(); 
        $posts = $recipeManager->getPosts(); 
        $posts2 = $recipeManager->getPosts(); 
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

    public function saveRecipe($nameRecipe, $contentRecipe, $summaryRecipe, $categoryRecipe){
        if ($categoryRecipe === 'Entrée') {
            $categoryID = 1;
        } elseif ($categoryRecipe === 'Plat') {
            $categoryID = 2;
        } elseif ($categoryRecipe === 'Dessert') {
            $categoryID = 3;
        }
        $recipeManager = new RecipeManager();
        $recipeManager->sauvegarderRecette($nameRecipe, $contentRecipe, $summaryRecipe, $categoryID, $_SESSION['id']);
        header('location: index.php?action=mesRecettes'); 
    }

}
