<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('id') &&
    $A->SetEmpty('subcategoryId') &&
    $A->SetEmpty('neededDate') &&
    $A->SetEmpty('neededTime') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('worker') &&
    isset($_POST['details']) &&
    $A->SetEmpty('status') &&
    $A->SetEmpty('addressId') &&
    $A->SetEmpty('address')
) {
    $user_id = $A->RealString($_POST['user_id']);
    $addressId = $A->RealString($_POST['addressId']);
    $status = $A->RealString($_POST['status']);
    $id = $A->RealString($_POST['id']);
    $subcategoryId = $A->RealString($_POST['subcategoryId']);
    $neededDate = $A->RealString($_POST['neededDate']);
    $neededTime = $A->RealString($_POST['neededTime']);
    $worker = $A->RealString($_POST['worker']);
    $address = $A->RealString($_POST['address']);
    $details = $A->RealString($_POST['details']);
    $sel=$A->Query("SELECT * FROM workers WHERE nationalCode='$worker'");
    if ($A->Numros($sel)!=1){
        $A->MSG('این کد ملی در سیستم ثبت نشده است');
        return;
    }
    $sel2=$A->FetchAssoc($sel);
    $workerId=$sel2['id'];
    $A->Query("UPDATE adress SET Address='$address' WHERE id='$addressId'");
    $A->Query("UPDATE orderlist SET subcategoryId='$subcategoryId',neededDate='$neededDate',neededTime='$neededTime',workerId='$workerId',details='$details',status='$status' WHERE id='$id' ");
//    if ($A->Arows()==1){
        $A->log("UPDATE","UPDATEING Order ".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}