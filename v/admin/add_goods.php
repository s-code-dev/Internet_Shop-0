<?php
include_once "../models/db_goods.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Админка</title>
    <link rel="stylesheet" href="../public/css/styles.css" type="text/css" media="all">
</head>
<body>
<div id="container">
    <div class="leftblock">
        <nav>
            <div class="menu"> 	
                <ul>
                    <li><a href="index.php" class="active">Главная</a></li>
                    <li><a href="add_goods.php">Добавить товар</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="content">
        <form method="post" action="../models/core_goods.php" enctype="multipart/form-data">
            <p><strong>Добавить товар:</strong></p>
            <p>Введите наименование: <br><input type="text" name="name" maxlength="100" required></p>
            <p>Введите описание: <br><textarea name="description" rows="10" required></textarea></p>
            <p>Введите цену: <br><input type="number" name="price" maxlength="20" required></p>
            <p><strong>Загрузите картинку в формате JPEG, PNG или GIF</strong></p>
            <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif" required></p>
            <p><input type="submit" name="submit"></p>
        </form>
    </div>
</div>
</body>
</html>
