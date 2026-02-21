<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';
require_login();

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    // Basic validation
    if (!in_array($status, ['pending', 'replied'])) {
        die("Invalid status");
    }

    try {
        $stmt = $pdo->prepare("UPDATE inquiries SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);

        header("Location: admin-inquiries.php?updated=1");
        exit;
    } catch (PDOException $e) {
        die("Error updating inquiry: " . $e->getMessage());
    }
} else {
    header("Location: admin-inquiries.php");
    exit;
}
?>