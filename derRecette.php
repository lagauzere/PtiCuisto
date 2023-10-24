

<?php
    function getPosts() {
        require_once 'connexion.php';
        $req = $bdd->query('SELECT * FROM RECETTE creation_date  order by rec_date_creation desc LIMIT 0,3');
        return $req;
    }
?>