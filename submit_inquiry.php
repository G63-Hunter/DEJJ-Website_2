<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    // Prepend subject to message for easier reading in admin
    $full_message = "Subject: $subject\n\n$message";

    try {
        $stmt = $pdo->prepare("INSERT INTO inquiries (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $full_message]);

        // Redirect back with success (in a real app, maybe a session message)
        header("Location: index.php?status=sent#contact");
        exit;
    } catch (PDOException $e) {
        die("Error sending inquiry: " . $e->getMessage());
    }
}
?>