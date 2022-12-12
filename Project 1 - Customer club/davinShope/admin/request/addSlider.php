<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['sliderName']) && $_POST['sliderName'] != '' &&
        isset($_POST['img']) && $_POST['img'] != '' &&
        isset($_POST['sliderLinkModel']) && $_POST['sliderLinkModel'] != '' &&
        isset($_POST['status']) && $_POST['status'] != '' &&
        isset($_POST['subCat']) && $_POST['subCat'] != ''

    ) {
        $result = $db::RealString($_POST);
        $sliderName = $result['sliderName'];
        $sliderLinkModel = $result['sliderLinkModel'];
        $status = $result['status'];
        $img = $result['img'];
        $subCat = $result['subCat'];



        $s = $db::Query("SELECT  * FROM slider where sliderName='$sliderName'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "تکراری است");
            echo json_encode($call);
            return;
        }

        $nameImage = $db::generateRandomString();

        $db::saveImageBase64($img,'../upload/slider/',$nameImage);


        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $sliderquery = $db::Query("INSERT INTO slider (sliderId, sliderName, sliderImg, sliderRegDate, sliderRegTime, sliderLinkId, sliderLinkModel,status) 
      VALUES ('$id','$sliderName','$nameImage','$date','$time','$subCat','$sliderLinkModel','$status')");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
