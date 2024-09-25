<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require '../includes/config.php';
require_once '../includes/function.php';

checkAdminAccess();

$stmt = $pdo->query(
    "SELECT comments.id, comments.content, comments.created_at, users.username, blogs.title
    FROM comments
    JOIN users ON comments.user_id = users.id
    JOIN blogs ON comments.blog_id = blogs.id
    ORDER BY comments.created_at DESC
    ");

    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
        <h2>Yorumlar</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kullanıcı</th>
                    <th>Blog</th>
                    <th>Yorum</th>
                    <th>Yorum Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($comment['username']); ?></td>
                        <td><?php echo htmlspecialchars($comment['title']); ?></td>
                        <td><?php echo htmlspecialchars($comment['content']); ?></td>
                        <td><?php echo htmlspecialchars($comment['created_at']); ?></td>
                        <td>
                            <a href="delete_comment.php?id=<?php echo $comment['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bu yorumu silmek istediğinizden emin misiniz?');">SİL</a>
                        </td>
                    </tr> 
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>