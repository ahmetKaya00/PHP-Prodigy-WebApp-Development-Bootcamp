<?php
session_start();
include './includes/config.php';

$category_id = isset($_GET['category']) ? (int)$_GET['category']:0;
$limit = 4;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$query = "SELECT * FROM blogs WHERE is_active = 1";

$params = [];

if($category_id){
    $query .= " AND category_id = ?";
    $params[] = $category_id;
}

$query .= " ORDER BY created_at DESC LIMIT $limit OFFSET $offset";

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$blogs = $stmt->fetchAll();

$totalQuery = "SELECT COUNT(*) FROM blogs WHERE is_active = 1";
if($category_id){
    $totalQuery .= " AND category_id = ?";
    $totalParam = [$category_id];
}else{
    $totalParam = [];
}
$totalStmt = $pdo->prepare($totalQuery);
$totalStmt->execute($totalParam);
$totalBlogs = $totalStmt->fetchColumn();
$totalPages = ceil($totalBlogs / $limit);

include './includes/header.php';
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
            <?php include './includes/sidebar.php';?>
        <div class="col-md-9">
            <?php foreach($blogs as $blog):?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php if($blog['image']):?>
                                <img src="../uploads/<?php echo htmlspecialchars($blog['image']);?>" class="img-fluid rounded" alt="">
                                <?php endif;?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($blog['title']) ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($blog['description']),0,100 ?>...</p>
                                <a href="blog_detail.php?id=<?php echo $blog['id'];?>" class="btn btn-primary">Devamını Oku</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <nav aria-label="Page Navigation">
                    <ul class="pagination">
                        <?php if($page > 1): ?>
                            <li class="page-item">
                                <a href="?page=<?php echo $page -1;?><?php echo $category_id ? '&category=' . $category_id : '';?>" aria-label="Previous" class="page-link">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php endif;?>
                            <?php for($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">

                                <a href="?page=<?php echo $i; ?><?php echo $category_id ? '&category=' . $category_id : ''; ?>" class="page-link"><?php echo $i; ?></a>
                                </li>
                                <?php endfor;?>

                                <?php if($page < $totalPages):?>
                                    <li class="page-item">
                                        <a href="?page=<?php echo $page + 1;?><?php echo $category_id ? '&category=' . $category_id : ''; ?>" aria-label="Next" class="page-link">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                    </ul>
                </nav>
        </div>
        </div>
    </div>
</body>
</html>