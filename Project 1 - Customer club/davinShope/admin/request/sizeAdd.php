<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['sizeName']) && $_POST['sizeName'] != ''
    ) {
        $result = $db::RealString($_POST);
        $sizeName = $result['sizeName'];
        $r = $db::Query("SELECT * FROM size where sizeName='$sizeName'", $db::$NUM_ROW);
        if ($r == 1) {
            $call = array("error" => true, "MSG" => "سایز وجود دارد");
            echo json_encode($call);
            return;
        }
        $id =$db::GenerateId();
        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $insert = $db::Query("INSERT INTO size (sizeId, sizeName, sizeAdminId, sizeRegDate, sizeRegTime) 
        VALUES ('$id','$sizeName','$idAdmin','$data','$time')");
        $call =array("error" => false);
        echo json_encode($call);
        return;
    }else{
        $call = array("error" => true, "MSG" => "تمامی فیلد ها اجباری است");
        echo json_encode($call);
        return;
    }
}
