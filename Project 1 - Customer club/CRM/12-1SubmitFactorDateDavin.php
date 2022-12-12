<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('FactorID') &&
    $A->SetEmpty('ProductID') &&
    $A->SetEmpty('NumbersProduct') &&
    $A->SetEmpty('FinalPrice')
){
    $ProductID=$A->RealString($_POST['ProductID']);
    $FactorID=$A->RealString($_POST['FactorID']);
    $NumbersProduct=$A->RealString($_POST['NumbersProduct']);
    $FinalPrice=$A->RealString($_POST['FinalPrice']);
    $Status='1';
    $A->Query("INSERT INTO factordata (FactorID, ProductID, NumbersProduct, FinalPrice, Status) VALUES ('$FactorID','$ProductID','$NumbersProduct','$FinalPrice','$Status')");
}