<?php
session_start();

require './includes/config.php';
require './includes/function.php';

$blog_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$blog = getBlog($pdo,$blog_id);

if(!$blog){
    echo "Blog Bulunamadı";
    exit();

}
include './includes/header.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <?php include './includes/sidebar.php'?>
        
        <div class="col-md-9">
            <h1><?php echo htmlspecialchars($blog['title']); ?></h1><?php if($blog['image']): ?>
            <img src="../uploads/<?php echo htmlspecialchars($blog['image']); ?>" class="img-fluid" alt="">
            <?php endif; ?>
            <p><?php echo htmlspecialchars($blog['description']);?></p>
            <div><?php echo htmlspecialchars($blog['content']); ?></div>
        </div>
        </div>
    </div>
</body>
</html>