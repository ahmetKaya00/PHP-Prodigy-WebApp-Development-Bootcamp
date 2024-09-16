<?php
include 'db_connect.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
    }else{
        echo "Kullanıcı Bulunamadı.";
        exit();
    }
}else{
    echo "Geçersiz İstek.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Detay</title>
</head>
<body>
    <h1>Kullanıcı Detayları</h1>
    <table>
        <tr>
            <th>ID:</th>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
        </tr>
        <tr>
            <th>Kullanıcı Adı:</th>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
        </tr>
        <tr>
            <th>E-Posta:</th>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
        </tr>
        <tr>
            <th>Yaş:</th>
            <td><?php echo htmlspecialchars($user['age']); ?></td>
        </tr>
        <tr>
            <th>Kayıt Tarihi:</th>
            <td><?php echo htmlspecialchars($user['reg_date']); ?></td>
        </tr>
    </table>
    <a href="lists_users.php">Geri Dön</a>
</body>
</html>