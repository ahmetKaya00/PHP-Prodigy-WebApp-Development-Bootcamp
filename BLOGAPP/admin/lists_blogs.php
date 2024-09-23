<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    require '../includes/config.php';
    require_once '../includes/function.php';

    checkAdminAccess();

    $blogs = getAllBlogs($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Blog Listele</title>
</head>
<body>
<div class="container mt-4">
    <h2>Bloglar</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Açıklama</th>
                <th>Kategori</th>
                <th>Tarih</th>
                <th>Aktiflik Durumu</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog): ?>
                <tr>
                    <td><?php echo htmlspecialchars($blog['title']); ?></td>
                    <td><?php echo htmlspecialchars($blog['description']); ?></td>
                    <td><?php echo htmlspecialchars($blog['category_name']); ?></td>
                    <td><?php echo htmlspecialchars($blog['created_at']); ?></td>
                    <td>
                        <?php echo $blog['is_active'] ? '<span class="text-success">Aktif</span>' : '<span class="text-danger">Pasif</span>'; ?>
                    </td>
                    <td>
                        <a href="edit_blog.php?id=<?php echo $blog['id'];?>" class="btn btn-warning btn-sm">Güncelle</a>
                        <a href="delete_blog.php?id=<?php echo $blog['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Bu blogu silmek istediğinizden emin misiniz?');">Sil</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>