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

}
