<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';
require_login();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $pdo->beginTransaction();

        // 1. Get all media files to delete them from server
        $stmt = $pdo->prepare("SELECT file_url FROM project_media WHERE project_id = ?");
        $stmt->execute([$id]);
        $media = $stmt->fetchAll();

        foreach ($media as $item) {
            $file_path = '../' . $item['file_url'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        // 2. Delete from database (project_media will be deleted by ON DELETE CASCADE if configured, 
        // but let's be explicit if it's not or to be safe)
        $stmt = $pdo->prepare("DELETE FROM project_media WHERE project_id = ?");
        $stmt->execute([$id]);

        $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->execute([$id]);

        $pdo->commit();
        header("Location: admin-projects.php?deleted=1");
        exit;
    } catch (PDOException $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        die("Error deleting project: " . $e->getMessage());
    }
} else {
    header("Location: admin-projects.php");
    exit;
}
?>