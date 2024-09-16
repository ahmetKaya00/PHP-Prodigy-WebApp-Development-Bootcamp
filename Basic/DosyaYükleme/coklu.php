<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coklu Dosya Yükleme</title>
</head>
<body>
    <form action="coklu.php" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" id="files" multiple>  <br><br>
        <input type="submit" name="submit" value="Dosyaları Yükle">
    </form>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $target_dir = "uploads/";

    $uploadOk = 1;

    $total = count($_FILES['files']['name']);

    for($i = 0; $i < $total; $i++){

        $imageFileType = strtolower(pathinfo($_FILES['files']['name'][$i],PATHINFO_EXTENSION));

        $newFileName = uniqid() . '_' . time() . '_' . $i . '.'. $imageFileType;

        $target_file = $target_dir . $newFileName;

        if(file_exists($target_file)){
            echo "Üzgünüz, dosya " . htmlspecialchars(basename($newFileName)) . "zaten mevcut. <br>";
        }

        if($_FILES["files"]["size"][$i] > 5000000){
            echo "Üzgünüz, dosya " . htmlspecialchars(basename($newFileName)) . "5 MB büyük olamaz. <br>";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
            echo "Üzgünüz, dosya " . htmlspecialchars(basename($newFileName)) . "türü geçersiz. <br>";
            $uploadOk = 0;
        }
        if($uploadOk == 0){
            echo "Dosya " . htmlspecialchars(basename($newFileName)) . "yüklenemedi. <br>";
        }else{
            if(move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file)){
                echo "Dosya " . htmlspecialchars(basename($newFileName)) . "başarılı bilr şekilde yüklendi. <br>";
            }else{
                echo "Dosya " . htmlspecialchars(basename($newFileName)) . "yüklenirken bir hata oluştu. <br>";
            }
        }        
    }
}
?>