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

    public function supprimerRecette($id){
        if(!isset($_SESSION['id'])) { // Sécurité si ce n'est pas un membre redirection vers la page de connexion
            header('Location: index.php?action=connexion');
            die();
        }
        
        if (isset($_SESSION['id'])) { // Vérification si l'utilisateur est connecté
            $recipeManager = new RecipeManager();
            $recipeManager->deleteRecipe($id);
            header('location: index.php?action=mesRecettes'); 
        }
    }
    

}
