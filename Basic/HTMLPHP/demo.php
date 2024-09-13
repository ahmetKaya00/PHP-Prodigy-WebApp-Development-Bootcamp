<?php
$title = "Hoş Geldiniz";
$content = "Bu bir PHP ve HTML karışımı sayfadır.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
    <h1> <?php echo $title; ?></h1>
    <h1> <?php echo $content; ?></h1>
</body>
</html>