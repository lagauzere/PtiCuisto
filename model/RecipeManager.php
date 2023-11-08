<?php

require_once("Manager.php");
class RecipeManager extends Manager {
    // Requête pour afficher les chapitres / page d'acceuil + gestion administrateur
    public function getPosts()
    {
        $pdo = $this->dbConnect();
        $req = $pdo->query('SELECT * FROM RECETTE creation_date  order by rec_date_creation desc LIMIT 0,3');
        return $req;
    }
}