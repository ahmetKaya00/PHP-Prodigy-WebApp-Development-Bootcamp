<?php
include 'db_connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "INSERT INTO users (username, email, age) VALUES ('$username','$email','$age')";

    if($conn->query($sql) === TRUE){
        echo "Yeni kullanıcı başarıyla eklendi.";
    }else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}
?>
