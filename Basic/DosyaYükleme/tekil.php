<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tekil.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <input type="submit" value="Dosyayı Yükle" name="submit">
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $target_dir = "uploads/";

            $uploadOk = 1;

            $imageFilesType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

            $newFileName = uniqid() . '_' . time() . '.' . $imageFilesType;

            $target_file = $target_dir . $newFileName;

            if(file_exists($target_file)){
                echo "Üzgünüz, bu dosya zaten mevcut. <br>";
                $uploadOk = 0;
            }

            if($_FILES["fileToUpload"]["size"] > 5000000){
                echo "Üzgünüz, bu dosya boyutu 5MB büyük olamaz <br>";
                $uploadOk = 0;
            }

            if($imageFilesType != "jpg" && $imageFilesType != "png" && $imageFilesType != "jpeg"){
                echo "Üzgünüz, sadece JPG, PNG ve JPEG türüne izin vardır! <br>";
                $uploadOk = 0;
            }

            if($uploadOk == 0){
                echo "Üzgünüz, dosyanız yüklenemedi. <br>";
            }else{
                if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){
                    echo "Dosya ". htmlspecialchars(basename($newFileName)). "başarılı bir şekilde yüklendi";
                }
                else{
                    echo "Dosya yüklenirken bir hata oluştu.";
                }
            }
        }
    ?>
</body>
</html>