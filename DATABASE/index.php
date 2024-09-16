<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Yönetimi</title>
</head>
<body>
    <h1>Kullanıcı Yönetimi</h1>
    <form action="user_add.php" method= "post">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">E-Posta:</label>
        <input type="email" id="email" name="email" required>
        <label for="age">Yaş:</label>
        <input type="number" id="age" name="age" required>

        <input type="submit" value="Kullanıcı Ekle">
    </form>

    <h2>Kullanıcılar</h2>
    <a href="lists_users.php">Kullanıcıları Görüntüle</a>
</body>
</html>