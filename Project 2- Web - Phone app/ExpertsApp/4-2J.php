<?php

include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";

if ($A->SetEmpty('order_id') &&
    $A->SetEmpty('start_work')) {

    $order_id = $A->RealString($_POST["order_id"]);
//    مقدار $start_work باید 1 یا 0 باشد
    $start_work = $A->RealString($_POST["start_work"]);

    if ($start_work == 1) {
        $current_time = date('H:i:s');
        $current_date = date('Y-m-d');
        $statusWorkStart='1';
        $update_time = $A->Query("update paymentamountlist set workStartTime='$current_time' , workStartDate='$current_date',paStatus='1' WHERE orderListId='$order_id'");
        $A->log("UPDATE","UPDATING Payment(STARTing Work)".$order_id,$appExp);
        $msg = array("error" => false, "login"=>true);
        echo json_encode($msg);

    } elseif ($start_work == 0) {
//        تغییرات**************************************
        if (
            isset($_POST['operatingCosts']) &&
            isset($_POST['cash']) &&
            isset($_POST['webPayment'])
        ) {
            $operatingCosts = $A->RealString($_POST["operatingCosts"]);
            $cash = $A->RealString($_POST["cash"]);
            $webPayment = $A->RealString($_POST["webPayment"]);
            $current_time2 = date('H:i:s');
            $current_date2= date('Y-m-d');
            $realPrice=$webPayment+$cash;
            $finalPrice = $cash+$operatingCosts+$webPayment;
            $Commission5=$A->Query("SELECT * FROM orderlist,subcategory WHERE orderlist.id='$order_id' AND orderlist.subcategoryId=subcategory.id");
            $Commission4=$A->FetchAssoc($Commission5);
            $Commission3=$Commission4['Commission'];
            $Commission2 = $realPrice*$Commission3;
            $Commission=$Commission2/100;
            $status='2';
            $update_time = $A->Query("update paymentamountlist set workFinishTime='$current_time2' , workFinishDate='$current_date2',cash='$cash',operatingCosts='$operatingCosts',finalPrice='$finalPrice',webPayment='$webPayment',Commission='$Commission',paStatus='$status' where orderListId='$order_id'");
            $A->log("UPDATE","UPDATING Payment(finishing Work)".$order_id,$appExp);
            $msg = array("error" => false, "login"=>true);
            echo json_encode($msg);

        }else{
            $msg = array("error" => true, "msg" => "مقدار هزینه ی جانبی و یا دلیل این هزینه وارد نشده است");
            echo json_encode($msg);
        }
    } else {
        $msg = array("error" => true, "msg" => "مقدار ورودی start_work باید 1 یا 0 باشد");
        echo json_encode($msg);
    }
} else {
    $msg = array("error" => true, "msg" => "اطلاعاتی ارسال نشده است");
    echo json_encode($msg);
}