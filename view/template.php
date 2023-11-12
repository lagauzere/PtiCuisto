<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pticuisto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/stylesListeRecettes.css">
</head>

<body>
    <!-- Navbar -->
    <?php
        include 'navbar.php';
    ?>



    <!-- Contenu -->
        <?= $content?>
    <!-- Fin Contenu -->



    <!-- Footer -->
    <?php
       //  include 'footer.php';
    ?>
</body>

</html>