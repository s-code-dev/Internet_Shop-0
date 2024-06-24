<?php
include_once "../models/db_goods.php";
if($_GET[id]){
    $id= (int)($_GET[id]);
    $good = goods_get($link, $id);
}

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
            <p>наименование: <br><input type="text" name="name" maxlength="100" value="<?=$good[name]?>"></p>
            <p>описание: <br><textarea name="description" rows="10"><?=$good[description]?></textarea></p>
            <p>цена: <br><input type="number" name="price" maxlength="20" value="<?=$good[price]?>" ></p>
            <p><strong>Загрузите картинку в формате JPEG, PNG или GIF</strong></p>
            <p><img src="../public/<?=$good[small_src]?>" width="200"></p>
            <p><input type="file" name="img" accept="image/jpeg,image/png,image/gif"></p>
            <input type="hidden" name="src" value="<?=$good[src]?>">
            <input type="hidden" name="edit" value="<?=$good[id]?>">
            <p><input type="submit" name="submit"></p>
        </form>
    </div>
</div>
</body>
</html>
