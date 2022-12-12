<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('DeliveryDate') &&
    $A->SetEmpty('DeliveryTime')
) {
    $DeliveryDate = $A->RealString($_POST['DeliveryDate']);
    $DeliveryTime = $A->RealString($_POST['DeliveryTime']);
    $Status = '1';
    $A->Query("UPDATE winnerstable SET DeliveryDate='$DeliveryDate',DeliveryTime='$DeliveryTime',Status='$Status' WHERE WinnerId='' AND LotteryId='' AND ID=''");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}