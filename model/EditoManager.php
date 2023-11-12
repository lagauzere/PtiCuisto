<?php

require_once("Manager.php");
class EditoMAnager extends Manager {
    // Requête pour afficher les chapitres / page d'acceuil + gestion administrateur
    public function getEdito()
    {
        $pdo = $this->dbConnect();
        $sqlQuery = 'SELECT content FROM Edito where id=1';
         $EditoStatement = $pdo->prepare($sqlQuery);
         $EditoStatement->execute();
         $Edito = $EditoStatement->fetchAll();
         return $Edito;
        
    }   
    public function save($edito){
        $pdo = $this->dbConnect();
        $sqlQuery = 'UPDATE Edito SET content=:edito WHERE id=1';
        $EditoStatement = $pdo->prepare($sqlQuery);
        $EditoStatement->bindParam(':edito', $edito, PDO::PARAM_STR);
        $EditoStatement->execute();
    }
}