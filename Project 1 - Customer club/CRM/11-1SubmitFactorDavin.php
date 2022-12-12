<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('FactorID') &&
    $A->SetEmpty('UserID') &&
    $A->SetEmpty('AdminID') &&
    $A->SetEmpty('PaymentMethod') &&
    $A->SetEmpty('PaymentStatus') &&
    isset($_POST['ContractID']) &&
    isset($_POST['EarnedCredit']) &&
    isset($_POST['UsedCredit'])
){
    $FactorID=$A->RealString($_POST['FactorID']);
    $UserID=$A->RealString($_POST['UserID']);
    $AdminID=$A->RealString($_POST['AdminID']);
    $PaymentMethod=$A->RealString($_POST['PaymentMethod']);
    $PaymentStatus=$A->RealString($_POST['PaymentStatus']);
    $ContractID=$A->RealString($_POST['ContractID']);
    $EarnedCredit=$A->RealString($_POST['EarnedCredit']);
    $UsedCredit=$A->RealString($_POST{'UsedCredit'});
    if(strlen($AdminID) !=10){
        $Note=array('error'=>true,'MSG'=>'شناسه(کد ملی) ادمین اشتباه است ');
        return;
    }
    if (strlen($UserID)!=11){
        $Note=array('error'=>true,'MSG'=>'شناسه(شماره تلفن خریدار) اشتباه است ');
        return;
    }
    $CheckFactorID=$A->Query("SELECT * FROM factor WHERE FactorID='$FactorID'");
    if ($A->Numros($CheckFactorID)!=0){
        $Note=array('error'=>true,'MSG'=>'این شناسه فاکتور قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $date = date('Y-m-d');
    $time = date("H:i:s");
    $A->Query("INSERT INTO factor (FactorID, UserID, EarnedCredit, UsedCredit, AdminID,Date,Time, PaymentMethod, PaymentStatues,ContractID) VALUES ('$FactorID','$UserID','$EarnedCredit','$UsedCredit','$AdminID','$date','$time','$PaymentMethod','$PaymentStatus','$ContractID')");
     $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}


