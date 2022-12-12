<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";

if (
    $A->SetEmpty("order_id") &&
    $A->SetEmpty("reason")
) {
    $ocReason = $A->RealString($_POST["reason"]);
    $order_id = $A->RealString($_POST["order_id"]);
    $ocTag='EXPERT';
    $A->Query("INSERT INTO ordercancellation (ocOrderId, ocReason, ocTag) VALUES ('$order_id','$ocReason','$ocTag')");
    $A->log("INSERTING","INSERTING ORDERCANCELL(Request cancellation FROM EXPERT+REASON)  ".$order_id,$appExp);
    $status='1';
    $A->Query("UPDATE orderlist SET status='$status' AND workerId='' WHERE id='$order_id'");
    $statusPayamount='0';
    $A->log("UPDATING","UPDATING orderList(Request cancellation FROM EXPERT)  ".$order_id,$appExp);
    $A->Query("UPDATE paymentamountlist SET paStatus='$statusPayamount' WHERE orderListId='$order_id' AND workerId='$appExp'");
    $A->log("UPDATING","UPDATING PAYLIST(Request cancellation FROM EXPERT)  ".$order_id,$appExp);
    $A->MSGT('درخواست ارسال گردید');
    return;
}
