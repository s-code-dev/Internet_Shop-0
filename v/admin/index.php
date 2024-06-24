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
    <h1>Админка</h1>
<?
$goods = goods_all($link);
if($goods){
    foreach ($goods as $good){?>
        <div class="item">
            <img src="../public/<?=$good['small_src']?>" alt="<?=$good['name']?>" title="<?=$good[name]?>">
            <h3 class="item-name"><?=$good['name']?></h3>
            <p class="add-to-basket"><a href="edit_goods.php?id=<?=$good[id]?>" title="Редактировать">Редактировать</a></p><br>
            <p class="add-to-basket"><a href="delete_goods.php?id=<?=$good[id]?>" title="Удалить">Удалить</a></p>
        </div>
    <?}
}
?>
    </div>
</div>
</body>
</html>
