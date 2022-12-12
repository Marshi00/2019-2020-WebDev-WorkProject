<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
if(
    $A->SetEmpty('subcategoryId') &&
    $A->SetEmpty('neededDate') &&
    $A->SetEmpty('neededTime') &&
    $A->SetEmpty('id') &&
    isset($_POST['details']) &&
    $A->SetEmpty('addressId')
) {
    $id = $A->RealString($_POST['id']);
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
    $A->Query("INSERT INTO orderlist (id, userId, subcategoryId, submitDate, submitTime, neededDate, neededTime, status,  addressId, details) VALUES ('$id','$appUser','$subcategoryId','$date','$time','$neededDate','$neededTime','$status','$addressId','$details')");
//    if ($A->Arows()==1){
    $A->log("INSERT","INSERTING Order",$appUser);
    $A->MSGT('ثبت با موفقیت انام شد');
    return;
//    }
}