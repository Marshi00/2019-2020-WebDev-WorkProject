<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('worker') &&
    $A->SetEmpty('amount') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('Status') &&
    $A->SetEmpty('PaymentTrackingNumber')
) {
    $worker = $A->RealString($_POST['worker']);
    $Status = $A->RealString($_POST['Status']);
    $id = $A->RealString($_POST['id']);
    $user_id = $A->RealString($_POST['user_id']);
    $amount = $A->RealString($_POST['amount']);
    $PaymentTrackingNumber = $A->RealString($_POST['PaymentTrackingNumber']);
    $CheckNeWPaymentTrackingNumber = $A->Query("SELECT * FROM commissionpayment WHERE PaymentTrackingNumber='$PaymentTrackingNumber'");
    $OldPaymentTrackingNumber2=$A->Query("SELECT * FROM commissionpayment WHERE id='$id'");
    $OldPaymentTrackingNumber1=$A->FetchAssoc($OldPaymentTrackingNumber2);
    $OldPaymentTrackingNumber=$OldPaymentTrackingNumber1['PaymentTrackingNumber'];
    if ($PaymentTrackingNumber!=$OldPaymentTrackingNumber && $A->Numros($CheckNeWPaymentTrackingNumber) != 0 ){
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
    $A->Query("UPDATE commissionpayment SET PaymentTrackingNumber='$PaymentTrackingNumber',amount='$amount',workerid='$workerId',Status='$Status' WHERE id='$id'");
//    if ($A->Arows()==1){
        $A->log("UPDATE","UPDATEING commissionPayment ".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}