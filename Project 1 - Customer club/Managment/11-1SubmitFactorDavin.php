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
    $A->SetEmpty('finalPrice') &&
    isset($_POST['UsedCredit'])
){
    $FactorID=$A->RealString($_POST['FactorID']);
    $UserID=$A->RealString($_POST['UserID']);
    $AdminID=$A->RealString($_POST['AdminID']);
    $PaymentMethod=$A->RealString($_POST['PaymentMethod']);
    $PaymentStatus=$A->RealString($_POST['PaymentStatus']);
    $ContractID=$A->RealString($_POST['ContractID']);
    $finalPrice=$A->RealString($_POST['finalPrice']);
    $UsedCredit=$A->RealString($_POST{'UsedCredit'});
    if ($PaymentMethod==1){
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
    if(strlen($AdminID) !=10){
        $Note=array('error'=>true,'MSG'=>'شناسه(کد ملی) ادمین اشتباه است ');
        echo json_encode($Note);
        return;
    }
    if (strlen($UserID)!=11){
        $Note=array('error'=>true,'MSG'=>'شناسه(شماره تلفن خریدار) اشتباه است ');
        echo json_encode($Note);
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

    if ($A->SetEmpty('PaymentMethod')==0){
        if ($A->SetEmpty('ContractID')){
            $contract=$A->Query("SELECT * FROM companycontract WHERE ID='$ContractID'");
            $con2=$A->FetchAssoc($contract);
            $InstallmentNumbers=$con2['InstallmentNumbers'];
            $PayAmount=$finalPrice/$InstallmentNumbers;





        }
        else{
            $Note=array('error'=>true,'MSG'=>'شناسه قرارداد ثبت نشده است.');
            echo json_encode($Note);
            return;
        }

    }
    $A->Query("INSERT INTO factor (FactorID, UserID, EarnedCredit, UsedCredit, AdminID,Date,Time, PaymentMethod, PaymentStatues,ContractID,finalPrice) VALUES ('$FactorID','$UserID','$EarnedCredit','$UsedCredit','$AdminID','$date','$time','$PaymentMethod','$PaymentStatus','$ContractID','$finalPrice')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}


