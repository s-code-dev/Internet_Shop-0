<?php
$id=$_GET['id'];
if($_GET['img']){
$img=$_GET['img'];
echo '<img class="product-img" style="width:600px; display:block; 
margin: 150px auto" src="../img/img_big/'.$img.'" alt="">';   
}
?>

<a style="text-decoration: none;
    font-size: 20px;
    text-align: center;
    display: block;" href="../index.php?c=page&act=product&id=<?=$id?>">Вернуться обратно</a>

