<?php
    require('derRecette.php');
    $posts = getPosts();
    

    while ($data = $posts->fetch()) {
     //   var_dump($data);
    }

    require('indexView.php');
?>