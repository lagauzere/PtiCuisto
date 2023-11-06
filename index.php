<?php

require 'controller/Blog.php'; 
    try {
/*
        if ($_GET['action'] == 'connexion') {
            $member = new Member();
            $member->connexion();
        }
*/

       // else{
            $blog = new Blog();
            $blog->listPosts();
        //}
    } catch(Exception $e){
        Echo 'Erreur : ' . $e->getMessage();
    }
