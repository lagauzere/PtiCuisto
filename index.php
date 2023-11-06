<?php

require 'controller/Blog.php'; 
    try {
        $blog = new Blog();
        $blog->listPosts();
    } catch(Exception $e){
        Echo 'Erreur : ' . $e->getMessage();
    }
