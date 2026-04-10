
<?php
// Configuration de la base de donnees
define('DB_HOST', 'localhost');
define('DB_NAME', 'gestion_absences');
define('DB_USER', 'root');
define('DB_PASS', ''); // vide par defaut sur XAMPP
 
function getConnection() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST
            . ";dbname=" . DB_NAME
            . ";charset=utf8mb4",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE
                    => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE
                    => PDO::FETCH_ASSOC
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

