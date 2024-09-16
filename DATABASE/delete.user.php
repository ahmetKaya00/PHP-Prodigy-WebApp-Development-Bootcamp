<?php
include 'db_connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id='$id'";

    if($conn->query($sql) === TRUE){
        echo "Kullanıcı başarıyla silindi!";
    }else{
        echo "Hata: " . $conn->error;
    }
}else{
    echo "Geçersiz istek.";
    exit();
}

$conn->close();
?>