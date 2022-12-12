<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('WinnerID') &&
    $A->SetEmpty('DeliveryDate') &&
    $A->SetEmpty('LotteryID') &&
    $A->SetEmpty('DeliveryTime') &&
    $A->SetEmpty('Status')
) {
    $NeWWinnerID = $A->RealString($_POST['WinnerID']);
    $NeWLotteryID = $A->RealString($_POST['LotteryID']);
    $NeWDeliveryDate = $A->RealString($_POST['DeliveryDate']);
    $NeWDeliveryTime = $A->RealString($_POST['DeliveryTime']);
    $NeWStatus = $A->RealString($_POST['Status']);
    $A->Query("UPDATE winnerstable SET WinnerId='$NeWWinnerID' AND LotteryId='$NeWLotteryID'AND DeliveryTime='$NeWDeliveryTime' AND DeliveryDate='$NeWDeliveryDate' AND Status='$NeWStatus' WHERE  ID=''");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}