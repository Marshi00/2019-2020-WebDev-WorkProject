<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('ProductName') &&
    $A->SetEmpty('Price') &&
    $A->SetEmpty('Multiplier')
){
    $NeWProductName=$A->RealString($_POST['ProductName']);
    $NeWPrice=$A->RealString($_POST['Price']);
    $NeWMultiplier=$A->RealString($_POST['Multiplier']);
    $A->Query("UPDATE product SET ProductName='$NeWProductName' AND Price='$NeWPrice' AND Multiplier='$NeWMultiplier' WHERE ProductID='' AND ProductName=''");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}