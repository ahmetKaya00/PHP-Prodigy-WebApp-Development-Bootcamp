<?php

function addBlog($pdo,$title,$description, $content, $category_id,$image = ''){
    $stmt = $pdo->prepare("INSERT INTO blogs (title,image, description,content, category_id) VALUES (?,?,?,?,?)");
    return $stmt->execute([$title,$image,$description,$content,$category_id]);
}
function uploadedImage($file, $uploadDir = '../uploads/'){
    $image = $file['name'];
    $imageTmpName = $file['tmp_name'];
    $imagePath = $uploadDir . basename($image);

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $imageExtension = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION)); 

    if (!in_array($imageExtension, $allowedExtensions)) {
        throw new Exception("Geçersiz dosya türü. Sadece jpg, jpeg, png ve gif dosyaları kabul edilir.");
    }

    if ($file['size'] > 2000000) {
        throw new Exception("Resim boyutu 2MB'den büyük olamaz!");
    }

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!move_uploaded_file($imageTmpName, $imagePath)) {
        throw new Exception("Resim yükleme başarısız.");
    }

    return basename($image);
}


function updateBlog($pdo,$blog_id,$title,$description,$category_id,$is_active,$image = NULL){
    $query = "UPDATE blogs SET title = :title, description = :description, category_id = :category_id, is_active = :is_active";
    $params = [
        ':title' => $title,
        ':description' => $description,
        ':category_id' => $category_id,
        ':is_active' => $is_active,
        ':blog_id' => $blog_id
    ];

    if($image !== null){
        $query .= ", image = :image";
        $params[':image'] = $image;
    }

    $query .= " WHERE id = :blog_id";

    $stmt = $pdo->prepare($query);
    return $stmt->execute($params);
}

function authenticatedUser($pdo,$email,$password){
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])){
        return $user;
    }
    return false;
}

function checkAdminAccess(){
    if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin'){
        header('Location: ../user/login.php');
        exit();
    }
}

function addComment($pdo, $blog_id, $user_id, $content){
    $query = "INSERT INTO comments (blog_id, user_id, content, created_at) VALUES (:blog_id, :user_id, :content, NOW())";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':blog_id', $blog_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':content', $content);
    return $stmt->execute();
}

function getBlog($pdo, $blog_id){
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->execute([$blog_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getComments($pdo,$blog_id){
    $stmt = $pdo->prepare("SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id =users.id WHERE blog_id = ? ORDER BY created_at DESC");
    $stmt->execute([$blog_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllBlogs($pdo){
    $stmt = $pdo->prepare("SELECT blogs.*, categories.name as category_name FROM blogs JOIN categories ON blogs.category_id = categories.id ORDER BY blogs.created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>