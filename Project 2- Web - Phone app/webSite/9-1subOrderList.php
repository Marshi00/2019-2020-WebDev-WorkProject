<?php
include "varWebSite.php";
$A = new varWebSite();
if(
    $A->SetEmpty('subcategoryId') &&
    $A->SetEmpty('neededDate') &&
    $A->SetEmpty('neededTime') &&
    $A->SetEmpty('user_id') &&
    isset($_POST['details']) &&
    $A->SetEmpty('addressId')
) {
    $user_id = $A->RealString($_POST['user_id']);
    $id = $A->generate_id();
    $CheckId = $A->Query("SELECT * FROM orderlist WHERE id='$id'");
    if ($A->Numros($CheckId) != 0) {
        $A->MSG('این شناسه سفارش قبلا ثبت شده است.');
        return;
    }
    $subcategoryId = $A->RealString($_POST['subcategoryId']);
    $neededDate = $A->RealString($_POST['neededDate']);
    $neededTime = $A->RealString($_POST['neededTime']);
    $addressId = $A->RealString($_POST['addressId']);
    $details = $A->RealString($_POST['details']);
    $date = date('Y-m-d');
    $time = date("H:i:s");
    $status = '1';
    $A->Query("INSERT INTO orderlist (id, userId, subcategoryId, submitDate, submitTime, neededDate, neededTime, status, addressId, details) VALUES ('$id','$user_id','$subcategoryId','$date','$time','$neededDate','$neededTime','$status','$addressId','$details')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING Order",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
        return;
//    }
}