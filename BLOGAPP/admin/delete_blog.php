<?php
session_start();
require '../includes/config.php';
require '../includes/function.php';

checkAdminAccess();

$blog_id = isset($_GET['id']) ? (int)$_GET['id'] : 0 ;

$stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
$stmt->execute([$blog_id]);
header('Location: admin_dashboard.php?page=lists_blog');
exit();
?>