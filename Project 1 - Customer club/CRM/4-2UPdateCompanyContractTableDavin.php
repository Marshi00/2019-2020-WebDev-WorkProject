<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('CompanyName') &&
    $A->SetEmpty('CompanyID') &&
    $A->SetEmpty('InstallmentPeriod') &&
    $A->SetEmpty('StartDate') &&
    $A->SetEmpty('ExpDate') &&
    $A->SetEmpty('InstallmentNumbers') &&
    $A->SetEmpty('PaymentAmount')

) {
    $NeWCompanyName = $A->RealString($_POST['CompanyName']);
    $NeWCompanyID = $A->RealString($_POST['CompanyID']);
    $NeWInstallmentPeriod = $A->RealString($_POST['InstallmentPeriod']);
    $NeWStartDate = $A->RealString($_POST['StartDate']);
    $NeWExpDate = $A->RealString($_POST['ExpDate']);
    $NeWInstallmentNumbers = $A->RealString($_POST['InstallmentNumbers']);
    $NeWPaymentAmount = $A->RealString($_POST['PaymentAmount']);
    $A->Query("UPDATE companycontract SET CompanyName='$NeWCompanyName' AND CompanyID='$NeWCompanyID' AND InstallmentPeriod='$NeWInstallmentPeriod' AND StartDate='$NeWStartDate' AND ExpDate='$NeWExpDate' AND InstallmentNumbers='$NeWInstallmentNumbers' AND PaymentAmount='$NeWPaymentAmount' WHERE ID='' AND CompanyID='' ");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}
