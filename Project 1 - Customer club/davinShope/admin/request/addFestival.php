<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['festivalName']) && $_POST['festivalName'] != '' &&
        isset($_POST['title']) && $_POST['title'] != '' &&
        isset($_POST['img']) && $_POST['img'] != '' &&
        isset($_POST['festivalOfferPercentage']) && $_POST['festivalOfferPercentage'] != '' &&
        isset($_POST['status']) && $_POST['status'] != '' &&
        isset($_POST['onOff']) && $_POST['onOff'] != ''

    ) {
        $result = $db::RealString($_POST);
        $festivalName = $result['festivalName'];
        $title = $result['title'];
        $img = $result['img'];
        $festivalOfferPercentage = $result['festivalOfferPercentage'];
        $status = $result['status'];
        $onOff = $result['onOff'];



        $s = $db::Query("SELECT  * FROM festival where festivalName='$festivalName'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "تکراری است");
            echo json_encode($call);
            return;
        }

        $nameImage = $db::generateRandomString();

        $db::saveImageBase64($img,'../upload/img/',$nameImage);


        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $festivalquery = $db::Query("INSERT INTO festival(festivalId, festivalName, festivalRegDate, festivalRegTime, festivalOfferPercentage, festivalImg, title,status,onOff) 
        values('$id','$festivalName','$date','$time','$festivalOfferPercentage','$nameImage','$title','$status','$onOff') ");
        $call = array("error" => false);
        echo json_encode($call);
        return;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
