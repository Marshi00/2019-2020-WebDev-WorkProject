<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
if(
$A->SetEmpty('orderID') &&
$A->SetEmpty('reason')
) {
    $orderID = $A->RealString($_POST['orderID']);
    $reason = $A->RealString($_POST['reason']);
    $target = $A->Query("UPDATE orderlist SET status='0' WHERE id='$orderID'");
    $tag='Customer';
    $A->Query("INSERT INTO ordercancellation (ocOrderId, ocReason, ocTag) VALUES ('$orderID','$reason','$tag')");
    $A->log("INSERT","UPDATING ORDER(Cancel) ".$orderID,$appUser);
    $A->MSGT('سفارش لغو گردید');
    return;
}