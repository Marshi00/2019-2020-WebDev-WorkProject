<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (
            isset($_POST['id']) && $_POST['id'] != '' &&
            isset($_POST['colorPicker']) && $_POST['colorPicker'] != '' &&
            isset($_POST['sizePicker']) && $_POST['sizePicker'] != '' &&
            isset($_POST['count']) && $_POST['count'] != '' &&
            isset($_POST['price']) && $_POST['price'] != ''
        ) {
            $result = $db::RealString($_POST);
            $id = $result['id'];
            $colorPicker = $result['colorPicker'];
            $sizePicker = $result['sizePicker'];
            $count = $result['count'];
            $price = $result['price'];

            $Q = $db::Query("SELECT * FROM cosiproduct where
                                 cosiPrColorId='$colorPicker' AND cosiPrSizeId='$sizePicker'AND cosiPrProductId='$id'", $db::$NUM_ROW);
            if ($Q == 1) {
                $call = array("error" => true, "MSG" => "این رنگ قبلا موجود است");
                echo json_encode($call);
                return;
            }
            $prId = $db::GenerateId();
            $date = $db::GetDate();
            $time = $db::GetTime();
            $adminId = $_SESSION['adminId'];

            $insert = $db::Query("
            INSERT INTO cosiproduct (cosiPrId, cosiPrProductId, cosiPrColorId, cosiPrSizeId, cosiPrPrice, cosiPrCount, cosiPrRegTime, cosiPrRegDate, cosiPrAdminId) 
              VALUES (
                  '$prId','$id','$colorPicker','$sizePicker','$price','$count','$time','$date','$adminId'    
              )
            ");

            $call = array("error" => false,'id'=>$prId);
            echo json_encode($call);
            return;
        } else {
            $call = array("error" => true, "MSG" => "تمامی فیلدها اجباری می باشند.");
            echo json_encode($call);
            return;
        }
    }
}