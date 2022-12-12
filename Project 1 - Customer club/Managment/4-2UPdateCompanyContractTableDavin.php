<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('CompanyID') &&
    $A->SetEmpty('InstallmentPeriod') &&
    $A->SetEmpty('StartDate') &&
    $A->SetEmpty('ExpDate') &&
    $A->SetEmpty('InstallmentNumbers') &&
    $A->SetEmpty('ID') &&
    $A->SetEmpty('PaymentAmount')

) {
    $NeWCompanyID = $A->RealString($_POST['CompanyID']);
    $B=$A->Query("SELECT * FROM company WHERE ID='$NeWCompanyID'");
    $C=$A->FetchAssoc($B);
    $NeWCompanyName=$C['CompanyName'];
    $ID = $A->RealString($_POST['ID']);
    $NeWCompanyID = $A->RealString($_POST['CompanyID']);
    $NeWInstallmentPeriod = $A->RealString($_POST['InstallmentPeriod']);
    $NeWStartDate = $A->RealString($_POST['StartDate']);
    $NeWExpDate = $A->RealString($_POST['ExpDate']);
    $NeWInstallmentNumbers = $A->RealString($_POST['InstallmentNumbers']);
    $NeWPaymentAmount = $A->RealString($_POST['PaymentAmount']);
    $A->Query("UPDATE companycontract SET CompanyName='$NeWCompanyName' , CompanyID='$NeWCompanyID' , InstallmentPeriod='$NeWInstallmentPeriod' , StartDate='$NeWStartDate' , ExpDate='$NeWExpDate' , InstallmentNumbers='$NeWInstallmentNumbers' , PaymentAmount='$NeWPaymentAmount' WHERE ID='$ID' ");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}
