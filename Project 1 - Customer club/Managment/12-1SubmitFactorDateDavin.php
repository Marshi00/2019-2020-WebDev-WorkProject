<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('FactorID') &&
    $A->SetEmpty('ProductID') &&
    $A->SetEmpty('NumbersProduct')
){
    $ProductID=$A->RealString($_POST['ProductID']);
    $FactorID=$A->RealString($_POST['FactorID']);
    $NumbersProduct=$A->RealString($_POST['NumbersProduct']);
    $factorData = $A->Query("SELECT * FROM product WHERE ProductID='$ProductID'");
    $rowFactors = mysqli_fetch_assoc($factorData);
    $FinalPrice=$rowFactors['Price']*$NumbersProduct;
    $Status='1';
    $A->Query("INSERT INTO factordata (FactorID, ProductID, NumbersProduct, FinalPrice,Status) VALUES ('$FactorID','$ProductID','$NumbersProduct','$FinalPrice','$Status')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}