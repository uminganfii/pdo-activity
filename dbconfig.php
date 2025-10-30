<?php
// dbconfig.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'pdo_project');
define('DB_USER', 'root');
define('DB_PASS', ''); // Set password to EMPTY if using default XAMPP root user

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>