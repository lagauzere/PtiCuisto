<?php


// Spécifiez le chemin complet de votre fichier .env
$envFilePath = __DIR__ . '/.env';

// Vérifiez si le fichier .env existe
if (file_exists($envFilePath)) {
    // Chargez le fichier .env et parcourez chaque ligne
    $lines = file($envFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines !== false) {
        foreach ($lines as $line) {
            // Divisez chaque ligne en nom de variable et valeur
            list($name, $value) = explode('=', $line, 2);
            // Définissez les variables d'environnement
            putenv("$name=$value");
        }
    }
} else {
    die(".env file not found. Please create it with your database configuration.");
}

// Récupérez les variables d'environnement pour la connexion PDO
$dbHost = getenv('DB_HOST');
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPass = getenv('DB_PASS');

// Connexion à la base de données en utilisant PDO
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    // Le reste de votre code pour interagir avec la base de données...
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

?>