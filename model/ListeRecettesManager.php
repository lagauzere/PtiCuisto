<?php
require_once("Manager.php");
class ListeRecettesManager extends Manager { 

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
                             FROM ÊTRE_PRÉSENT
                             JOIN INGREDIENT USING (ING_ID) JOIN RECETTE USING (REC_ID) JOIN CATEGORIE ON RECETTE.CAT_ID = CATEGORIE.CAT_ID
                             WHERE lower(ING_INTITULE) like "%'.$_POST['nomIngredient'].'%" OR lower(REC_RESUME) like "%'.$_POST['nomIngredient'].'%"';
                //"%'.$_POST['ingredient'].'%" or REC_TITRE like "%'.$_POST['ingredient'].'%"';
                }
       
        $recipesStatement = $pdo->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        return $recipes;
    }
}