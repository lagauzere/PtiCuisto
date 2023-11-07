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
        
             elseif ($_GET['action'] == 'listPosts') {
                $blog = new Blog();
                $blog->listPosts();
            }


            elseif ($_GET['action'] == 'deconnexion') {
                $member = new Member();
                $member->deconnexion();
            }

            elseif ($_GET['action'] == 'filtre') {
                $blog = new Blog();
                $blog->filtre();
            }
            elseif ($_GET['action'] == 'afficheFiltre') {
                $blog = new Blog();
                $blog->afficheRecettes($_POST['filtre']);
            }
        }

        else{
            $blog = new Blog();
            $blog->listPosts();
        }
    } catch(Exception $e){
        Echo 'Erreur : ' . $e->getMessage();
    }
