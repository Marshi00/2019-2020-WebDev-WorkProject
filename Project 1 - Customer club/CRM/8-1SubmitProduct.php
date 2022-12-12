<?php
include "Active3.php";
$A=new Active3();
if(
$A->SetEmpty('ProductID') &&
$A->SetEmpty('ProductName') &&
$A->SetEmpty('Price') &&
$A->SetEmpty('Multiplier')
){
    $ProductID=$A->RealString($_POST['ProductID']);
    $ProductName=$A->RealString($_POST['ProductName']);
    $Price=$A->RealString($_POST['Price']);
    $Multiplier=$A->RealString($_POST['Multiplier']);
    $CheckProductID=$A->Query("SELECT * FROM product WHERE ProductID='$ProductID'");
    if ($A->Numros($CheckProductID)!=0){
        $Note=array('error'=>true,'MSG'=>'این کد کالا قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $A->Query("INSERT INTO product (ProductID, ProductName, Price, Multiplier) VALUES ('$ProductID','$ProductName','$Price','$Multiplier')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}