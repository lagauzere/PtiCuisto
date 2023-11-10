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
}