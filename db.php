<?php
// db.php (example configuration for GitHub)

$host = '127.0.0.1';
$port = '3307'; // Example port
$db   = 'my_app';
$user = 'root';      // Default XAMPP username
$pass = '';          // Default XAMPP password

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
