<?php
   
class Admin {

    public function Enregistrer($edito){
        $EditoManager=new EditoManager();
        $EditoManager->save($edito);
        header('location: index.php'); 
    }


    public function accepter($id){
        $recipeManager= new RecipeManager();
        $recipeManager->accept($id);
        header('location: index.php'); 
    }

    public function refuser($id){
    $recipeManager= new RecipeManager();
    $recipeManager->refuse($id);
    header('location: index.php'); 
    }

}