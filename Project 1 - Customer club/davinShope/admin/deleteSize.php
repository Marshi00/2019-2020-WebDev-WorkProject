<?php
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    include "class/dataBase.php";

    $db=new dataBase();
    $real=$db::RealString($_GET);

    $id = '';
    $id = $real['sizeId'];

    $query = $db::Query("delete from size where sizeId='$id'");
    $query = $db::Query("delete from sizeproduct where siPrSizeId='$id'");

    header("location:sizeList.php");
}
?>
