<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('WinnerID') &&
    $A->SetEmpty('DeliveryDate') &&
    $A->SetEmpty('LotteryID') &&
    $A->SetEmpty('DeliveryTime') &&
    $A->SetEmpty('ID') &&
    $A->SetEmpty('Status')
) {
    $NeWWinnerID = $A->RealString($_POST['WinnerID']);
    $ID = $A->RealString($_POST['ID']);
    $NeWLotteryID = $A->RealString($_POST['LotteryID']);
    $NeWDeliveryDate = $A->RealString($_POST['DeliveryDate']);
    $NeWDeliveryTime = $A->RealString($_POST['DeliveryTime']);
    $NeWStatus = $A->RealString($_POST['Status']);
    if (strlen($NeWWinnerID) != 11 || substr($NeWWinnerID, 0, 1) != 0) {
        $Note = array('error' => true, 'MSG' => 'شماره وارد شده اشتباه است');
        echo json_encode($Note);
        return;
    }
    $A->Query("UPDATE winnerstable SET WinnerId='$NeWWinnerID' , LotteryId='$NeWLotteryID', DeliveryTime='$NeWDeliveryTime' , DeliveryDate='$NeWDeliveryDate' , Status='$NeWStatus' WHERE  ID='$ID'");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}