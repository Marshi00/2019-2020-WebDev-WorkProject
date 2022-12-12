<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('worker') &&
    $A->SetEmpty('PaymentTrackingNumber') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('paymentAmount')
) {
    $worker = $A->RealString($_POST['worker']);
    $status = '1';
    $paymentAmount = $A->RealString($_POST['paymentAmount']);
    $user_id = $A->RealString($_POST['user_id']);
    $date = date('Y-m-d');
    $time = date("H:i:s");
    $PaymentTrackingNumber = $A->RealString($_POST['PaymentTrackingNumber']);
    $CheckPaymentTrackingNumber = $A->Query("SELECT * FROM workerspayment WHERE PaymentTrackingNumber='$PaymentTrackingNumber'");
    if ($A->Numros($CheckPaymentTrackingNumber) != 0) {
        $A->MSG('این کد پیگیری پرداخت قبلا ثبت شده است.');
        return;
    }
    $sel=$A->Query("SELECT * FROM workers WHERE nationalCode='$worker'");
    if ($A->Numros($sel)!=1){
        $A->MSG('این کد ملی در سیستم ثبت نشده است');
        return;
    }
    $sel2=$A->FetchAssoc($sel);
    $workerId=$sel2['id'];
    $A->Query("INSERT INTO workerspayment (workerId, PaymentTrackingNumber, paymentAmount, date, time, Status) VALUES ('$workerId','$PaymentTrackingNumber','$paymentAmount','$date','$time','$status')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING WorkersPayment",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
        return;
//    }
}