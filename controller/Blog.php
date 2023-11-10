<?php
    require './model/RecipeManager.php'; 
    require './model/ListeRecettesManager.php'; 
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

    public function filtre(){
        require ('./view/filtres.php');
    }

    public function afficheRecettes($filtre){
        $recipeManager = new RecipeManager(); 
        $recipes= $recipeManager->showRecipe($filtre);
        require("./view/listeRecettes.php");
    }



}
