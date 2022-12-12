<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('CompanyID') &&
    $A->SetEmpty('InstallmentPeriod') &&
    $A->SetEmpty('StartDate') &&
    $A->SetEmpty('ExpDate') &&
    $A->SetEmpty('InstallmentNumbers') &&
    $A->SetEmpty('PaymentAmount')
){
    $CompanyID=$A->RealString($_POST['CompanyID']);
    $B=$A->Query("SELECT * FROM company WHERE ID='$CompanyID'");
    $C=$A->FetchAssoc($B);
    $CompanyName=$C['CompanyName'];
    $InstallmentPeriod=$A->RealString($_POST['InstallmentPeriod']);
    $StartDate=$A->RealString($_POST['StartDate']);
    $ExpDate=$A->RealString($_POST['ExpDate']);
    $InstallmentNumbers=$A->RealString($_POST['InstallmentNumbers']);
    $PaymentAmount=$A->RealString($_POST['PaymentAmount']);
    $A->Query("INSERT INTO companycontract(CompanyName, CompanyID, InstallmentPeriod, StartDate, ExpDate, PaymentAmount, InstallmentNumbers) VALUES ('$CompanyName','$CompanyID','$InstallmentPeriod','$StartDate','$ExpDate','$PaymentAmount','$InstallmentNumbers')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}