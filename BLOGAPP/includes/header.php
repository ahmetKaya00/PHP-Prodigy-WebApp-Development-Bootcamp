<?php
require 'config.php';

$user_logged_in = isset($_SESSION['user_id']);
$username = null;
$user_role = null;

if($user_logged_in){
    $username = $_SESSION['username'];
    $user_role = $_SESSION['user_role'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Blog Sitesi</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="../public/index.php" class="navbar-brand">Blog Sitesi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collepse" id="navbarNav">
        <ul class="navbar-nav mr-auto" >
            <?php if($user_logged_in):?>
                <li class="nav-item">
                    <a href="../public/index.php" class="nav-link">Ana Sayfa</a>
                </li>
            <?php endif;?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if($user_logged_in):?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo htmlspecialchars($username);?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-lalebledby="userDropdown">
                        <?php if($user_role === 'admin'): ?>
                            <a href="./admin/admin_dashboard.php" class="dropdown-item">Admin Panel</a>
                            <?php endif;?>
                            <a href="./user/logout.php" class="dropdown-item">Çıkış Yap</a>
                    </div>
                </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="./user/login.php" class="nav-link">Giriş Yap</a>
                    </li>
                    <li class="nav-item">
                        <a href="./user/register.php" class="nav-link">Kayıt Ol</a>
                    </li>
                    <?php endif;?>
        </ul>
    </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>