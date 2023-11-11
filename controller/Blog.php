<?php
    require './model/RecipeManager.php'; 
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

    public function saveRecipe(){

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
        require ('./view/options.php');
    }

}
