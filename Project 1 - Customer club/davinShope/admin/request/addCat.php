<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['catName']) && $_POST['catName'] != '' &&
        isset($_POST['img']) && $_POST['img'] != ''

    ) {
        $result = $db::RealString($_POST);
        $catName = $result['catName'];
        $img = $result['img'];
        $r = $db::Query("SELECT * FROM category where catName='$catName'", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "دسته بندی تکراری است");
            echo json_encode($call);
            return;
        }
        $nameImage = $db::generateRandomString();

        $db::saveImageBase64($img,'../upload/cat/',$nameImage);

        $id =$db::GenerateId();
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $insert = $db::Query("INSERT INTO category(catId, catName, catRegDate, catRegTime, catAdminId, catImg) 
        VALUES ('$id','$catName','$data','$time','$idAdmin','$nameImage')");
        $call =array("error" => false);
        echo json_encode($call);
        return;
    }else{
        $call = array("error" => true, "MSG" => "تمامی فیلد ها اجباری است");
        echo json_encode($call);
        return;
    }
}
