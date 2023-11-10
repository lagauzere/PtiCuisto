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
    public function getUserRecipe($id){
        $pdo = $this->dbConnect();
        $req = $pdo->query('SELECT * FROM RECETTE WHERE REC_AUTEUR = '.$id );
        return $req;
    }

    public function sauvegarderRecette($nameRecipe, $contentRecipe, $summaryRecipe, $categoryRecipe,$id){
        $pdo = $this->dbConnect();
        $req = $pdo->prepare(`INSERT INTO recette(rec_id, cat_id, rec_titre, rec_contenu, rec_resume, rec_date_create, rec_auteur) values ((select max(rec_id)+1 from recette), ?, ?, ?, ?, sysdate, ?)`);
        return $req->execute(array($categoryRecipe, $nameRecipe, $contentRecipe, $summaryRecipe, $id));
    }
}