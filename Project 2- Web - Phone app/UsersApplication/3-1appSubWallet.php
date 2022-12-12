<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
if(
    $A->SetEmpty('referenceNumber') &&
    $A->SetEmpty('Act') &&
    $A->SetEmpty('amount') &&
    $A->SetEmpty('method') &&
    $A->SetEmpty('user')
) {
    $referenceNumber = $A->RealString($_POST['referenceNumber']);
    $Act = $A->RealString($_POST['Act']);
    $amount = $A->RealString($_POST['amount']);
    $method = $A->RealString($_POST['method']);
    $user = $A->RealString($_POST['user']);
    $Status = '1';
    $CheckOrderListId = $A->Query("SELECT * FROM wallet WHERE referenceNumber='$referenceNumber'");
    if ($A->Numros($CheckOrderListId) != 0) {
        $A->MSG('این کد پیگیری ثبت شده است.');
        return;
    }
    $sel=$A->Query("SELECT * FROM user WHERE PhoneNumber='$user'");
    if ($A->Numros($sel)!=1){
        $A->MSG('این شماره تلفن در سیستم ثبت نشده است');
        return;
    }
    $sel2=$A->FetchAssoc($sel);
    $userId=$sel2['id'];
    if ($Act=='1'){
        $Action='Deposit';
    }
    elseif ($Act=='0'){
        $Action='Withdrawal';
    }
    $date = date('Y-m-d');
    $time = date("H:i:s");
    $A->Query("INSERT INTO wallet (time, date, referenceNumber, Action, status, amount, method, userId) VALUES ('$time','$date','$referenceNumber','$Action','$Status','$amount','$method','$userId')");
//    if ($A->Arows()==1){
    $A->log("INSERT","INSERTING Wallet",$user);
    $A->MSGT('ثبت با موفقیت انجام شد');
    return;
//    }
}
