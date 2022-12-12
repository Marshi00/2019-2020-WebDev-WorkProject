<?php
include "varWebSite.php";
$A = new varWebSite();
if(
    $A->SetEmpty('subcategoryId') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('orderId') &&
    isset($_POST['details'])
) {
    $user_id = $A->RealString($_POST['user_id']);
    $orderId = $A->RealString($_POST['orderId']);
    $details = $A->RealString($_POST['details']);
    $subcategoryId = $A->RealString($_POST['subcategoryId']);
    $CheckId = $A->Query("SELECT * FROM orderlist WHERE id='$orderId'");
    if ($A->Numros($CheckId) == 0) {
        $A->Query("INSERT INTO orderlist (id, userId, subcategoryId, details) VALUES ('$orderId','$user_id','$subcategoryId','$details')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING Order(webSite)",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
        return;
//    }
    }
    if ($A->Numros($CheckId) == 1) {
        $A->Query("UPDATE orderlist SET details='$details',userId='$user_id',subcategoryId='$subcategoryId' WHERE id='$orderId'");
//    if ($A->Arows()==1){
        $A->log("INSERT","UPDATING ORDER(WebSite-details) ".$orderId,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
    }

}