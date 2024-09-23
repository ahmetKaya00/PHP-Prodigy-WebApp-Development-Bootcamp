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

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])){
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    addComment($pdo, $blog_id, $user_id, $content);

    header("Location: blog_detail.php?id=$blog_id");
    exit();
}

$comments = getComments($pdo, $blog_id);
include './includes/header.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <?php include './includes/sidebar.php'?>
        
        <div class="col-md-9">
            <h1><?php echo htmlspecialchars($blog['title']); ?></h1><?php if($blog['image']): ?>
            <img src="./uploads/<?php echo htmlspecialchars($blog['image']); ?>" class="img-fluid" alt="">
            <?php endif; ?>
            <p><?php echo htmlspecialchars($blog['description']);?></p>
            <div><?php echo htmlspecialchars($blog['content']); ?></div>

            <h3 class="mt-4">Yorumlar</h3>
            <?php if(!empty($comments)):?>
                <ul class="list-unstyled">
                    <?php foreach($comments as $comment):?>
                        <li class="media mb-3">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1"><?php htmlspecialchars($comment['username']);?></h5>
                                <div><?php echo htmlspecialchars($comment['content']); ?></div>
                                <small class="text-muted"><?php echo $comment['created_at']; ?></small>
                            </div>
                        </li>
                        <?php endforeach; ?>
                </ul>
                <?php else: ?>
                    <p>Henüz yorum yapılmamış.</p>
                <?php endif; ?>




            <?php if(isset($_SESSION['user_id'])): ?>
            <form action="blog_detail.php?id=<?php echo $blog_id;?>" method="post">
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="4" required placeholder="Yorumunuzu yazın"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Yorum Gönder</button>
            </form>
            <?php else: ?>
                <p>Yorum yapmak için <a href="./user/login.php">giriş</a>yapınız</p>
            <?php endif;?>
        </div>
        </div>
    </div>
</body>
</html>