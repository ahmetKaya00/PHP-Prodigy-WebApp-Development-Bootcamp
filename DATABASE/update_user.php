<?php
include 'db_connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    }else{
        echo "Kullanıcı bulunamadı.";
        exit();
    }
}else{
    echo "Geçersiz istek";
    exit();
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $age = (int)$_POST['age'];

    $sql = "UPDATE users SET username='$username', email='$email',age='$age' WHERE id='$id'";

    if($conn->query($sql) === TRUE){
        echo "Kullanıcı başarılı bir şekilde güncellendi!";
    }else{
        "Hata: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanııcı Güncelleme</title>
</head>
<body>
    <h2>Kullanıcı Güncelle</h2>
    <form action="" method="post">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
        <label for="age">Yaş:</label>
        <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>" required>

        <input type="submit" value="Güncelle">
    </form>
</body>
</html>