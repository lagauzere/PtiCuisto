<?php
session_start();
require 'controller/Blog.php'; 
require 'controller/Member.php'; 
require 'controller/Admin.php'; 
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

            elseif ($_GET['action'] == 'mesRecettes') {
                $blog = new Blog();
                $blog->listsUsersRecipes();
             }

            elseif ($_GET['action'] == 'ajouterRecette') {
                 $blog = new Blog();
                 $blog->addRecipes();
              }

            elseif ($_GET['action'] == 'registration') {
                $member = new Member();
                $member->registration();
            }

            elseif ($_GET['action'] == 'nosRecettes') {
                $blog = new blog();
                $blog->nosRecettes();
            }

            elseif ($_GET['action'] == 'optionsAdmin') {
                $blog = new blog();
                $blog->options();
            }

            elseif ($_GET['action'] == 'saveEdito') {
                if (isset($_POST['contentEdito'])){    
                    $Admin = new Admin();
                    $Admin->Enregistrer($_POST['contentEdito']);
                } else {
                    throw new Exception('Vous devez écrire un edito');
                }
            }

            elseif ($_GET['action'] == 'detailRecette') {
                $blog = new blog();
                $blog->detail($_GET['recette']);
            }           

            elseif ($_GET['action'] == 'saveRecipe') {
                if (isset($_POST['nameRecipe']) && isset($_POST['contentRecipe']) && isset($_POST['summaryRecipe']) && isset($_POST['CategoryRecipe'])) {
                    $blog = new Blog();
                    $blog->saveRecipe($_POST['nameRecipe'], $_POST['contentRecipe'], $_POST['summaryRecipe'], $_POST['CategoryRecipe'], $_POST['imageRecipe']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
             }

            elseif ($_GET['action'] == 'supprimerRecette') {
                $blog = new Blog();
                // echo $_GET['rec_id'];
                $blog->supprimerRecette($_GET['rec_id']);
            }

            elseif ($_GET['action'] == 'modifierRecette') {
                $blog = new Blog();
                $blog->modifierRecette($_GET['rec_id']);
            }

            elseif ($_GET['action'] == 'updateRecette') {
                if (isset($_POST['nameRecipe']) && isset($_POST['contentRecipe']) && isset($_POST['summaryRecipe'])) {
                    $blog = new Blog();
                    $blog->updateRecipe($_POST['nameRecipe'], $_POST['contentRecipe'], $_POST['summaryRecipe'], $_POST['recetteID']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }

            elseif ($_GET['action'] == 'accepter') {
                $Admin= new Admin();
                $Admin->accepter($_GET['id']);

            }
             
            elseif ($_GET['action'] == 'refuser') {
                $Admin= new Admin();
                $Admin->refuser($_GET['id']);
            }

            elseif ($_GET['action'] == 'modifierRecetteAdmin') {
                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
                    $blog = new Blog();
                    $blog->modifierRecette($_GET['rec_id']);
                } else {
                    $blog = new Blog();
                    $blog->listPosts();
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
