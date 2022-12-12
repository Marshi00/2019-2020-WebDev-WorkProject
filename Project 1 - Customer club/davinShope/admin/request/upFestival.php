<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();

if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']==true) {
    if (
        isset($_POST['festivalId']) && $_POST['festivalId'] != ''   &&
        isset($_POST['updateFestival']) && $_POST['updateFestival'] !=''

    ) {
        $result = $db::RealString($_POST);
        $id = $result['festivalId'];
        $onOff = $result['updateFestival'];


        $data = $db::GetDate();
        $time = $db::GetTime();
        $idAdmin = $_SESSION['adminId'];
        $com = $db::Query("update festival set onOff='$onOff' where festivalId='$id'");
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
