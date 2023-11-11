<?php

require_once("Manager.php");

class RecipeManager extends Manager {

    public function maxRecetteID() {
        $pdo = $this->dbConnect();
        $stmt = $pdo->prepare('SELECT MAX(REC_ID) + 1 FROM RECETTE');
        $stmt->execute();
        return $stmt->fetchColumn();
    }

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

    public function sauvegarderRecette($nameRecipe, $contentRecipe, $summaryRecipe, $categoryRecipeID, $id) {
        try {
            $rec_id = $this->maxRecetteID();

            $pdo = $this->dbConnect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO RECETTE (rec_id, cat_id, rec_titre, rec_contenu, rec_resume, rec_date_creation, rec_auteur) 
                                   VALUES (:rec_id, :cat_id, :rec_titre, :rec_contenu, :rec_resume, CURDATE(), :rec_auteur)");

            $stmt->bindParam(':rec_id', $rec_id, PDO::PARAM_INT);
            $stmt->bindParam(':cat_id', $categoryRecipeID, PDO::PARAM_INT);
            $stmt->bindParam(':rec_titre', $nameRecipe, PDO::PARAM_STR);
            $stmt->bindParam(':rec_contenu', $contentRecipe, PDO::PARAM_STR);
            $stmt->bindParam(':rec_resume', $summaryRecipe, PDO::PARAM_STR);
            $stmt->bindParam(':rec_auteur', $id, PDO::PARAM_INT);

            $stmt->execute();

            $pdo = null;
        } catch (PDOException $e) {
            echo $categoryRecipeID;
            throw new Exception("Erreur d'insertion : " . $e->getMessage());
        }
    }
}