<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('FactorID') &&
    $A->SetEmpty('ProductID') &&
    $A->SetEmpty('NumbersProduct') &&
    $A->SetEmpty('Status') &&
    $A->SetEmpty('FinalPrice')
){
    $NeWProductID=$A->RealString($_POST['ProductID']);
    $NeWStatus=$A->RealString($_POST['Status']);
    $NeWFactorID=$A->RealString($_POST['FactorID']);
    $NeWNumbersProduct=$A->RealString($_POST['NumbersProduct']);
    $NeWFinalPrice=$A->RealString($_POST['FinalPrice']);
    $A->Query("UPDATE factordata SET ProductID='$NeWProductID' AND FactorID='$NeWFactorID' AND NumbersProduct='$NeWNumbersProduct' AND FinalPrice='$NeWFinalPrice' AND Status='$NeWStatus' WHERE ID='' AND FactorID='$NeWFactorID'");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}