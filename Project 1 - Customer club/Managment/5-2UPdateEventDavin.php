<?php
include "Active3.php";
$A = new Active3();
if(
    $A->SetEmpty('StartDate') &&
    $A->SetEmpty('ID') &&
    $A->SetEmpty('ExpireDate') &&
    $A->SetEmpty('Multiplier') &&
    $A->SetEmpty('EventName')
) {
    $NeWStartDate = $A->RealString($_POST['StartDate']);
    $ID = $A->RealString($_POST['ID']);
    $NeWExpireDate = $A->RealString($_POST['ExpireDate']);
    $NeWMultiplier = $A->RealString($_POST['Multiplier']);
    $NeWEventName = $A->RealString($_POST['EventName']);
    $A->Query("UPDATE events SET StartDate='$NeWStartDate' , ExpireDate='$NeWExpireDate' , Multiplier='$NeWMultiplier' , EventName='$NeWEventName' WHERE ID='$ID' ");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}