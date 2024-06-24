<?php
include_once "../models/db_goods.php";
if($_GET[id]){
    $id= $_GET[id];
    goods_delete($link, $id);
    header("Location: ../admin/index.php");
}