<?php
// Database connection configuration
$host = 'localhost';
$db   = 'dejj_engineering';
$user = 'root'; // Usually 'root' on WAMP
$pass = '';     // Usually empty on WAMP
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     // If database doesn't exist, this will fail. 
     // Usually, we want to inform the user to run setup_db.sql first.
     die("Database connection failed. Please ensure MySQL is running and you have imported setup_db.sql.");
}
?>
