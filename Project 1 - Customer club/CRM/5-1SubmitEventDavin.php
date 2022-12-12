<?php
include "Active3.php";
$A = new Active3();
if(
    $A->SetEmpty('StartDate') &&
    $A->SetEmpty('ExpireDate') &&
    $A->SetEmpty('Multiplier') &&
    $A->SetEmpty('EventName')
){
    $StartDate=$A->RealString($_POST['StartDate']);
    $ExpireDate=$A->RealString($_POST['ExpireDate']);
    $Multiplier=$A->RealString($_POST['Multiplier']);
    $EventName=$A->RealString($_POST['EventName']);
$A->Query("INSERT INTO events (StartDate, ExpireDate, Multiplier, EventName) VALUES ('$StartDate','$ExpireDate','$Multiplier','$EventName')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}
