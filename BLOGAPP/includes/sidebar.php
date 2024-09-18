<?php
    require 'config.php';

    $categoriesStmt = $pdo->query("SELECT * from categories");
    $categories = $categoriesStmt->fetchAll();

    $recentBlogsStmt = $pdo->query("SELECT * from blogs ORDER BY created_at DESC LIMIT 5");
    $recentBlogs = $recentBlogsStmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="col-md-3">
        <h2>Kategoriler</h2>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="index.php">Tüm Bloglar</a>
            </li>
            <?php foreach ($categories as $category):?>
                <li class="list-group-item">
                    <a href="index.php?category=<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']);?></a>
                </li>
            <?php endforeach;?>
        </ul>

        <h5 class="mt-4">Son Paylaşılan Bloglar</h5>
        <ul class="list-group">
            <?php foreach ($recentBlogs as $blogItem):?>
                <li class="list-group-item">
                    <a href="blog_detail.php?id=<?php echo $blogItem['id']; ?>"><?php echo htmlspecialchars($blogItem['title']); ?></a>
                </li>
                <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>