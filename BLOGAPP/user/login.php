<?php
session_start();
include '../includes/config.php';
include '../includes/function.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = authenticatedUser($pdo, $email, $password);
    
    if($user){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        
        header('Location: ../index.php');
        exit();
    }else{
        $error = "Geçersiz e-posta ve şifre";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Giriş Yap</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Giriş Yap</h2>
        <?php if(isset($error)):?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="post">
            <div class="form-group mb-3">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
            <p class="mt-3">Bir hesabınız yok mu ?<a href="register.php">Kayıt Olun!</a></p>
            <a href="register.php"></a>
        </form>
    </div>
</body>
</html>