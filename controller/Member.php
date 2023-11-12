<?php
require './model/MemberManager.php'; 

class Member 
{
    // Méthode / page de connexion
    public function connexion()
    {
        require('./view/connexion.php');
    }

    public function connexionUser($pseudo, $pass)
    {
        $MemberManager= new MemberManager(); 

        $resultat= $MemberManager->connexionUser($pseudo, $pass);

        if (!$resultat) { // Le membre est informé si le pseudo n'est pas enregisté
            $errorPseudo = 'Erreur d\'identifiant ';
            require('view/connexion.php');
        } 


        else { // Vérification membre existe
            //$isPasswordCorrect = password_verify($pass, $resultat['per_mdp']);

            
            //if (!$isPasswordCorrect) { // Le membre est informé si le mdp n'est pas enregisté
            if($pass!=$resultat['per_mdp']){
                $errorPassword = 'Erreur d\'mot de passe';
                require('view/connexion.php');
            } 
            else { // Sinon la connexion est validée
                $_SESSION['id'] = $resultat['per_id']; 
                $_SESSION['pseudo'] = $_POST['pass'];
                $_SESSION['admin'] = $resultat['per_type'];
                header('location: index.php?action=listPosts');
            }
        }
    }

    public function registration(){
        require('view/registration.php');
    }

    public function deconnexion(){
        $_SESSION = array();
        session_destroy();
        header('location: index.php?action=listPosts');
    }


}