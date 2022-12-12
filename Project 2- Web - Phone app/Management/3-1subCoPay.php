<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('worker') &&
    $A->SetEmpty('amount') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('PaymentTrackingNumber')
) {
    $worker = $A->RealString($_POST['worker']);
    $user_id = $A->RealString($_POST['user_id']);
    $amount = $A->RealString($_POST['amount']);
    $PaymentTrackingNumber = $A->RealString($_POST['PaymentTrackingNumber']);
    $CheckPaymentTrackingNumber = $A->Query("SELECT * FROM commissionpayment WHERE PaymentTrackingNumber='$PaymentTrackingNumber'");
    if ($A->Numros($CheckPaymentTrackingNumber) != 0) {
        $A->MSG('این شماره پیگیری پرداخت قبلا ثبت شده است.');
        return;
    }
    $sel=$A->Query("SELECT * FROM workers WHERE nationalCode='$worker'");
    if ($A->Numros($sel)!=1){
        $A->MSG('این کد ملی در سیستم ثبت نشده است');
        return;
    }
    $sel2=$A->FetchAssoc($sel);
    $workerId=$sel2['id'];
    $date = date('Y-m-d');
    $time = date("H:i:s");
    $Status='1';
    $A->Query("INSERT INTO commissionpayment (workerid, amount, date,time, PaymentTrackingNumber,Status) VALUES ('$workerId','$amount','$date','$time','$PaymentTrackingNumber','$Status')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING commissionPayment",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
        return;
//    }
}