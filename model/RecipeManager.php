<?php

require_once("Manager.php");

class RecipeManager extends Manager {

    /**
     * Do a query to database to have 3 latest recipes added
     *  
     * @return void
     */
    public function getPosts()
    {
        $pdo = $this->dbConnect();
        $req = $pdo->query('SELECT * FROM RECETTE creation_date  order by rec_date_creation desc LIMIT 0,3');
        return $req;
    }

    
    /**
     * Do a query to database to have all user's recipes. 
     * 
     * @param [int] $id
     * @return void
     */
    public function getUserRecipe($id)
    {
        $pdo = $this->dbConnect();
        $req = $pdo->query('SELECT * FROM RECETTE WHERE REC_AUTEUR = '.$id );
        return $req;
    }

    


    public function showRecipe($filtre){
        $sqlQuery; 
        $pdo = $this->dbConnect();

        if($filtre== 'entree'){
            $sqlQuery = 'SELECT distinct REC_ID, REC_IMAGE, CAT_INTITULE, REC_RESUME, REC_TITRE
             FROM RECETTE,CATEGORIE Where RECETTE.CAT_ID in( Select CAT_ID From CATEGORIE where CAT_INTITULE = "entree" ) and CAT_INTITULE = "entree"';
            }
            else if ($filtre== 'plat'){
                $sqlQuery = 'SELECT distinct REC_ID, REC_IMAGE, CAT_INTITULE, REC_RESUME, REC_TITRE
                 FROM RECETTE,CATEGORIE Where RECETTE.CAT_ID in( Select CAT_ID From CATEGORIE where CAT_INTITULE = "plat" ) and CAT_INTITULE = "plat"';
                }
            else if ($filtre== 'dessert'){
                $sqlQuery = 'SELECT distinct REC_ID, REC_IMAGE, CAT_INTITULE, REC_RESUME, REC_TITRE 
                FROM RECETTE,CATEGORIE Where RECETTE.CAT_ID in( Select CAT_ID From CATEGORIE where CAT_INTITULE = "dessert" )
                 and RECETTE.CAT_ID= CATEGORIE.CAT_ID  ; ';
                }
    
            else if ($filtre== 'titre'){
                
                $sqlQuery = 'SELECT * FROM RECETTE Where REC_TITRE like "%'.$_POST['nom'].'%"';
                }
    
            else if ($filtre== 'ingredient'){
                $sqlQuery = 'SELECT DISTINCT(REC_ID),REC_TITRE,REC_IMAGE,CAT_INTITULE,REC_RESUME 
                FROM RECETTE,INGREDIENT,CATEGORIE WHERE lower(ING_INTITULE) 
                like "%'.$_POST['nomIngredient'].'%" and lower(REC_CONTENU) like "%'.$_POST['nomIngredient'].'%" and RECETTE.CAT_ID= CATEGORIE.CAT_ID;';
                //"%'.$_POST['ingredient'].'%" or REC_TITRE like "%'.$_POST['ingredient'].'%"';
                }
       
        $recipesStatement = $pdo->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        return $recipes;
    }


    public function showourrecipes(){
        $sqlQuery; 
        $pdo = $this->dbConnect();
        $sqlQuery = 'SELECT REC_ID, REC_IMAGE, REC_RESUME, REC_TITRE
        FROM RECETTE';
         $recipesStatement = $pdo->prepare($sqlQuery);
         $recipesStatement->execute();
         $recipes = $recipesStatement->fetchAll();
         return $recipes;
    }

    public function showDetails($title){
        $sqlQuery; 
        $pdo = $this->dbConnect();
        $sqlQuery = 'SELECT REC_ID, REC_IMAGE, REC_RESUME, REC_TITRE, REC_CONTENU
        FROM RECETTE WHERE REC_TITRE="'.$title.'"';
         $recipesStatement = $pdo->prepare($sqlQuery);
         $recipesStatement->execute();
         $recipes = $recipesStatement->fetchAll();
         return $recipes;
    }


}