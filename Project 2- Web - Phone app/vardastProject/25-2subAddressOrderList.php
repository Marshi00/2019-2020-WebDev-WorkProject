<?php
include "varWebSite.php";
$A = new varWebSite();
if(
    $A->SetEmpty('orderId') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('addressId')
) {
    $orderId = $A->RealString($_POST['orderId']);
    $user_id = $A->RealString($_POST['user_id']);
    $addressId = $A->RealString($_POST['addressId']);
    $A->Query("UPDATE orderlist SET addressId='$addressId' WHERE id='$orderId'");
//   if ($A->Arows()==1){
        $A->log("INSERT","UPDATING ORDER(WebSite-address) ".$orderId,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}