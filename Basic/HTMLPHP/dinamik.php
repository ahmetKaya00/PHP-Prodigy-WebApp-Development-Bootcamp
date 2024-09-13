<?php
$colors = ["Kırmızı","Yeşil","Mavi"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Renkler</h1>
    <?php foreach($colors as $color): ?>
        <li><?php echo $color;?></li>
        <?php endforeach;?>
</body>
</html>