<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('ProductName') &&
    $A->SetEmpty('Price') &&
    $A->SetEmpty('ProductID')
){
    $NeWProductName=$A->RealString($_POST['ProductName']);
    $NeWPrice=$A->RealString($_POST['Price']);
    $NeWMultiplier='1';
    $ProductID=$A->RealString($_POST['ProductID']);
    $A->Query("UPDATE product SET ProductName='$NeWProductName' , Price='$NeWPrice' , Multiplier='$NeWMultiplier' WHERE ProductID='$ProductID'");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}