<?php

require_once("Manager.php");

class MemberManager extends Manager 
{

    public function connexionUser($pseudo, $pass)
    {
    $db=$this->dbConnect();
    $req = $db->prepare('SELECT per_id, per_mdp, per_type FROM PERSONNE WHERE per_pseudo = ?');
    $req->execute(array($pseudo));
    return $req->fetch();
    }
}