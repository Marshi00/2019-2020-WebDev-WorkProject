<?php
include "Active3.php";
$A = new Active3();
if(
    $A->SetEmpty('StartDate') &&
    $A->SetEmpty('ExpireDate') &&
    $A->SetEmpty('Multiplier') &&
    $A->SetEmpty('EventName')
) {
    $NeWStartDate = $A->RealString($_POST['StartDate']);
    $NeWExpireDate = $A->RealString($_POST['ExpireDate']);
    $NeWMultiplier = $A->RealString($_POST['Multiplier']);
    $NeWEventName = $A->RealString($_POST['EventName']);
    $A->Query("UPDATE events SET StartDate='$NeWStartDate' AND ExpireDate='$NeWExpireDate' AND Multiplier='$NeWMultiplier' AND EventName='$NeWEventName' WHERE ID='' AND EventName=''");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}