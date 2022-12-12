<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();

if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==true) {
    if (
        isset($_POST['sliderId']) && $_POST['sliderId'] != ''   &&
        isset($_POST['updateSlider']) && $_POST['updateSlider'] !=''

    ) {
        $result = $db::RealString($_POST);
        $id = $result['sliderId'];
        $status = $result['updateSlider'];


        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $com = $db::Query("update slider set status='$status' where sliderId='$id'");
        if ($com) {
            $call = array("error" => false);
            echo json_encode($call);
            return;
        } else {
            $call = array("error" => true, "MSG" => "تمامی فیلد ها اجباری است");
            echo json_encode($call);
            return;
        }
    }
}
//}
