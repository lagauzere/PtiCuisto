<?php
session_start();
require 'controller/Blog.php'; 
require 'controller/Member.php'; 
    try {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'connexion') {
                $member = new Member();
                $member->connexion();
            }

            elseif ($_GET['action']== 'connexionUser') {
                if (isset($_POST['pseudo']) && isset($_POST['pass'])) {
                    $member = new Member();
                    $member->connexionUser($_POST['pseudo'], $_POST['pass']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }

            elseif ($_GET['action'] == 'registration') {
                $member = new Member();
                $member->registration();
            }
             elseif ($_GET['action'] == 'listPosts') {
                $blog = new Blog();
                $blog->listPosts();
            }


            elseif ($_GET['action'] == 'deconnexion') {
                $member = new Member();
                $member->deconnexion();
            }

            elseif ($_GET['action'] == 'mesRecettes') {
               $blog = new Blog();
               $blog->listsUsersRecipes();
            }

             elseif ($_GET['action'] == 'ajouterRecette') {
                $blog = new Blog();
                $blog->addRecipes();
             }

             elseif ($_GET['action'] == 'saveRecipe') {

                
                if (isset($_POST['nameRecipe']) && isset($_POST['contentRecipe']) && isset($_POST['summaryRecipe']) && isset($_POST['CategoryRecipe'])) {
                    $blog = new Blog();
                    $blog->saveRecipe($_POST['nameRecipe'], $_POST['contentRecipe'], $_POST['summaryRecipe'], $_POST['CategoryRecipe']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
             }

        }

        else{
            $blog = new Blog();
            $blog->listPosts();
        }

    } catch(Exception $e){
        Echo 'Erreur : ' . $e->getMessage();
    }
