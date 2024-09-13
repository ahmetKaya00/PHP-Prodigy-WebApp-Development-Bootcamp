<?php
$name = $_POST['name'];
$age = $_POST['age'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonuç</title>
</head>
<body>
    <h1>Gelen Veriler</h1>
    <p>İsim: <?php echo htmlspecialchars($name)?></p>
    <p>Yaş: <?php echo htmlspecialchars($age)?></p>
</body>
</html>