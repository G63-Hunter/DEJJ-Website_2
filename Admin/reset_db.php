<?php
/**
 * Dejj Engineering - Database & Tables Creator
 * SECURITY WARNING: DELETE THIS FILE AFTER USE OR MOVE IT OUTSIDE THE WEB ROOT.
 */

$host = 'localhost';
$user = 'root';
$pass = '';

try {
    // 1. Connect to MySQL without specifying a database
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Create the database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS dejj_engineering CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✅ Database 'dejj_engineering' is ready.<br>";

    // 3. Select the database
    $pdo->exec("USE dejj_engineering");

    // 4. Create Tables
    $sql = "
CREATE TABLE IF NOT EXISTS admins (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) UNIQUE NOT NULL,
password VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS projects (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
location VARCHAR(255) NOT NULL,
description TEXT,
category VARCHAR(50),
image_url VARCHAR(255),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS inquiries (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
message TEXT,
status ENUM('pending', 'replied') DEFAULT 'pending',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS project_media (
id INT AUTO_INCREMENT PRIMARY KEY,
project_id INT NOT NULL,
file_url VARCHAR(255) NOT NULL,
file_type ENUM('image', 'video') NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
);";

    $pdo->exec($sql);
    echo "✅ Tables are ready.<br>";

    // 5. Create/Reset Default Admin
    $username = 'admin_dejj';
    $password = 'password123';
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if admin exists
    $stmt = $pdo->prepare("SELECT id FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if (!$admin) {
        $insert = $pdo->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
        $insert->execute([$username, $hashedPassword]);
        echo "✅ Default admin created: <strong>$username</strong> / <strong>$password</strong><br>";
    } else {
        // Force update password to ensure it's hashed correctly
        $update = $pdo->prepare("UPDATE admins SET password = ? WHERE username = ?");
        $update->execute([$hashedPassword, $username]);
        echo "✅ Password for 'admin_dejj' has been reset to: <strong>password123</strong><br>";
    }

    echo "<br><strong>Setup Complete!</strong><br>";
    echo "<a href='admin-login.php'
    style='padding: 10px; background: #1A4A94; color: white; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px;'>Go
    to Login Page</a>";

} catch (PDOException $e) {
    die("❌ Error during setup: " . $e->getMessage());
}
?>