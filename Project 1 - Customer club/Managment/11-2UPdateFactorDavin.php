<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('UserID') &&
    $A->SetEmpty('FactorID') &&
    $A->SetEmpty('AdminID') &&
    $A->SetEmpty('PaymentMethod') &&
    $A->SetEmpty('PaymentStatus') &&
    $A->SetEmpty('finalPrice') &&
    isset($_POST['ContractID']) &&
    isset($_POST['UsedCredit'])
){
    $NeWUserID=$A->RealString($_POST['UserID']);
    $FactorID=$A->RealString($_POST['FactorID']);
    $NeWAdminID=$A->RealString($_POST['AdminID']);
    $NeWPaymentMethod=$A->RealString($_POST['PaymentMethod']);
    $NeWPaymentStatus=$A->RealString($_POST['PaymentStatus']);
    $NeWContractID=$A->RealString($_POST['ContractID']);
    $finalPrice=$A->RealString($_POST['finalPrice']);
    $NeWUsedCredit=$A->RealString($_POST{'UsedCredit'});
    if ($NeWPaymentMethod==1){
        $events=$A->Query("SELECT * FROM events WHERE  Status='1'");
        if ($A->Numros($events)=='1'){
            $getMulti=$A->FetchAssoc($events);
            $multiValue=$getMulti['Multiplier'];
            $pointValue=$A->Query("SELECT * FROM pointvalue");
            $value2=$A->FetchAssoc($pointValue);
            $value=$value2['Point'];
            $newPrice=$finalPrice*$multiValue;
            $EarnedCredit=$newPrice/$value;
        }
        else{
            $pointValue=$A->Query("SELECT * FROM pointvalue");
            $value2=$A->FetchAssoc($pointValue);
            $value=$value2['Point'];
            $EarnedCredit=$finalPrice/$value;
        }
    }
    else{
        $EarnedCredit=0;
    }
    if(strlen($NeWAdminID) !=10){
        $Note=array('error'=>true,'MSG'=>'شناسه(کد ملی) ادمین اشتباه است ');
        echo json_encode($Note);
        return;
    }
    if (strlen($NeWUserID)!=11){
        $Note=array('error'=>true,'MSG'=>'شناسه(شماره تلفن خریدار) اشتباه است ');
        echo json_encode($Note);
        return;
    }
    $A->Query("UPDATE factor SET UserID='$NeWUserID' , AdminID='$NeWAdminID' , PaymentMethod='$NeWPaymentMethod' , PaymentStatues='$NeWPaymentStatus' , ContractID='$NeWContractID' , EarnedCredit='$EarnedCredit' , UsedCredit='$NeWUsedCredit',finalPrice='$finalPrice' WHERE FactorID='$FactorID' ");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}