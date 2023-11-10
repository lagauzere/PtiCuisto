<?php
    require './model/RecipeManager.php'; 
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
        $recipeManager = new RecipeManager();
        $recipeManager->sauvegarderRecette($nameRecipe, $contentRecipe, $summaryRecipe, $categoryRecipe, $_SESSION['id']);
        header('location: index.php?action=mesRecettes'); 
    }

}
