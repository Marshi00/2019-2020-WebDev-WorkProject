<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('img') &&
    $A->SetEmpty('iName') &&
    $A->SetEmpty('user_id')
) {
    $img = $A->RealString($_POST['img']);
    $iName=$A->RealString($_POST['iName']);
    $checkName=$A->Query("SELECT * FROM imgbase WHERE img='$iName'");
    if ($A->Numros($checkName)!=0){
        $A->MSG('این نام قبلا انتخاب شده است');
        return;
    }
    $A::saveImageBase64($img,'upload/',$iName);
    $user_id = $A->RealString($_POST['user_id']);
    $status = '0';
    $brand = 'CAT';
    $catId = '0';
    $A->Query("INSERT INTO imgbase ( img, brand, catId, status) VALUES ('$iName','$brand','$catId','$status')");
//    if ($A->Arows()==1){
    $A->log("INSERT"," !!! INSERTING img  !!! ",$user_id);
    $A->MSGT('ثبت با موفقیت انجام شد');
    return;
//    }
}