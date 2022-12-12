<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('UserID') &&
    $A->SetEmpty('AdminID') &&
    $A->SetEmpty('PaymentMethod') &&
    $A->SetEmpty('PaymentStatus') &&
    isset($_POST['ContractID']) &&
    isset($_POST['EarnedCredit']) &&
    isset($_POST['UsedCredit'])
){
    $NeWUserID=$A->RealString($_POST['UserID']);
    $NeWAdminID=$A->RealString($_POST['AdminID']);
    $NeWPaymentMethod=$A->RealString($_POST['PaymentMethod']);
    $NeWPaymentStatus=$A->RealString($_POST['PaymentStatus']);
    $NeWContractID=$A->RealString($_POST['ContractID']);
    $NeWEarnedCredit=$A->RealString($_POST['EarnedCredit']);
    $NeWUsedCredit=$A->RealString($_POST{'UsedCredit'});
    if(strlen($NeWAdminID) !=10){
        $Note=array('error'=>true,'MSG'=>'شناسه(کد ملی) ادمین اشتباه است ');
        return;
    }
    if (strlen($NeWUserID)!=11){
        $Note=array('error'=>true,'MSG'=>'شناسه(شماره تلفن خریدار) اشتباه است ');
        return;
    }
    $A->Query("UPDATE factor SET UserID='$NeWUserID' AND AdminID='$NeWAdminID' AND PaymentMethod='$NeWPaymentMethod' AND PaymentStatues='$NeWPaymentStatus' AND ContractID='$NeWContractID' AND EarnedCredit='$NeWEarnedCredit' AND UsedCredit='$NeWUsedCredit' WHERE FactorID='' AND UserID=''");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}