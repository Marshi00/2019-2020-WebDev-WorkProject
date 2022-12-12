<?php
include "varWebSite.php";
$A = new varWebSite();
if(
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('orderId')
) {
    $orderId = $A->RealString($_POST['orderId']);
    $user_id = $A->RealString($_POST['user_id']);
    $date = date('Y-m-d');
    $time = date("H:i:s");
    $status = '1';
    $A->Query("UPDATE orderlist SET submitDate='$date',submitTime='$time',status='$status' WHERE id='$orderId'");
//   if ($A->Arows()==1){
        $A->log("INSERT","UPDATING ORDER(WebSite-address) ".$orderId,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}