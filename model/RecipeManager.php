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
    public function getRecipeById($rec_id) {
        $pdo = $this->dbConnect();
        $stmt = $pdo->prepare('SELECT * FROM RECETTE WHERE REC_ID = ?');
        $stmt->execute([$rec_id]);
        return $stmt->fetch();
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
                $sqlQuery = 'SELECT DISTINCT(REC_ID),REC_TITRE,REC_IMAGE,REC_RESUME 
                FROM ÊTRE_PRÉSENT
                JOIN INGREDIENT USING (ING_ID) JOIN RECETTE USING (REC_ID)
                WHERE lower(ING_INTITULE) like "%'.$_POST['nomIngredient'].'%" OR lower(REC_RESUME) like "%'.$_POST['nomIngredient'].'%"';
            }
       
        $recipesStatement = $pdo->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        return $recipes;
    }


    public function showOurRecipes(){
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
        FROM RECETTE WHERE REC_TITRE=:title';
        $recipesStatement = $pdo->prepare($sqlQuery);
        $recipesStatement->bindParam(':title', $title, PDO::PARAM_STR);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        return $recipes;
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

    public function sauvegarderRecetteAvecImage($nameRecipe, $contentRecipe, $summaryRecipe, $categoryRecipeID, $id, $imageRecipe) {
        try {
            $rec_id = $this->maxRecetteID();

            $pdo = $this->dbConnect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO RECETTE (rec_id, cat_id, rec_titre, rec_contenu, rec_resume, rec_image ,rec_date_creation, rec_auteur) 
                                   VALUES (:rec_id, :cat_id, :rec_titre, :rec_contenu, :rec_resume, :rec_image ,CURDATE(), :rec_auteur)");

            $stmt->bindParam(':rec_id', $rec_id, PDO::PARAM_INT);
            $stmt->bindParam(':cat_id', $categoryRecipeID, PDO::PARAM_INT);
            $stmt->bindParam(':rec_titre', $nameRecipe, PDO::PARAM_STR);
            $stmt->bindParam(':rec_contenu', $contentRecipe, PDO::PARAM_STR);
            $stmt->bindParam(':rec_resume', $summaryRecipe, PDO::PARAM_STR);
            $stmt->bindParam(':rec_image', $imageRecipe, PDO::PARAM_STR);
            $stmt->bindParam(':rec_auteur', $id, PDO::PARAM_INT);
            

            $stmt->execute();

            $pdo = null;
        } catch (PDOException $e) {
            echo $categoryRecipeID;
            echo $imageRecipe;
            throw new Exception("Erreur d'insertion : " . $e->getMessage());
        }
    }

    public function deleteRecipe($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM RECETTE WHERE REC_ID = ?');
        $deletedRecipe = $req->execute(array($id));

        return $deletedRecipe;
    }

    public function updateRecipe($nameRecipe, $contentRecipe, $summaryRecipe, $rec_id){
        
        try {
        $pdo = $this->dbConnect();
        $sqlQuery = 'UPDATE RECETTE SET REC_TITRE=:nameRecipe, REC_CONTENU=:contentRecipe, REC_RESUME=:summaryRecipe, REC_DATE_MODIFICATION=CURDATE() WHERE REC_ID=:idRecette';
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->bindParam(':nameRecipe', $nameRecipe, PDO::PARAM_STR);
        $stmt->bindParam(':contentRecipe', $contentRecipe, PDO::PARAM_STR);
        $stmt->bindParam(':summaryRecipe', $summaryRecipe, PDO::PARAM_STR);
        $stmt->bindParam(':idRecette', $rec_id, PDO::PARAM_INT);
        $stmt->execute();
        } catch (PDOException $e) {
            echo $nameRecipe;
            echo $contentRecipe;
            echo $summaryRecipe;
            echo $rec_id;
            throw new Exception("Erreur d'insertion : " . $e->getMessage());
        } 
    }

}