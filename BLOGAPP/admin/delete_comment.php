<?php
session_start();

require '../includes/config.php';
require_once '../includes/function.php';

checkAdminAccess();

$comment_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

try {
    $stmt = $pdo->prepare("DELETE FROM comments WHERE id = ?");
    $stmt->execute([$comment_id]);

    header('Location: admin_dashboard.php?page=lists_comments');
    exit();
} catch (Exception $e) {
    echo "Yorum silinirken bir hata oluştu: " . $e->getMessage();
}
?>