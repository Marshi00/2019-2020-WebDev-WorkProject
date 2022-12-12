<?php

include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";

if (
    $A->SetEmpty('order_id')) {
    $order_id = $A->RealString($_POST["order_id"]);
    $status='3';
    $order_update = $A->Query("INSERT INTO paymentamountlist (orderListId, workerId,paStatus) VALUES ('$order_id','$appExp','$status')");
    $order_update2=$A->Query("UPDATE orderlist set status='$status',workerId='$appExp' WHERE id='$order_id'");
    $A->log("INSERT","INSERTING Paylist(Request for order)  ".$order_id,$appExp);
    $A->log("UPDATING","UPDATING ORDERLIST(Request for order FROM WORKER)  ".$order_id,$appExp);
    $A->MSGT('درخواست ارسال گردید');
return;
} else {
    $msg = array("error" => true, "msg" => "no data is sent");
    echo json_encode($msg);
}