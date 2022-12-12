<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('worker') &&
    $A->SetEmpty('PaymentTrackingNumber') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('status') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('paymentAmount')
) {
    $worker = $A->RealString($_POST['worker']);
    $paymentAmount = $A->RealString($_POST['paymentAmount']);
    $user_id = $A->RealString($_POST['user_id']);
    $PaymentTrackingNumber = $A->RealString($_POST['PaymentTrackingNumber']);
    $id = $A->RealString($_POST['id']);
    $status = $A->RealString($_POST['status']);
    $CheckNew = $A->Query("SELECT * FROM workerspayment WHERE PaymentTrackingNumber='$PaymentTrackingNumber'");
    $Old2=$A->Query("SELECT * FROM workerspayment WHERE id='$id'");
    $Old1=$A->FetchAssoc($Old2);
    $Old=$Old1['PaymentTrackingNumber'];
    if ($PaymentTrackingNumber!=$Old && $A->Numros($CheckNew) != 0 ){
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
    $A->Query("UPDATE workerspayment SET workerId='$workerId',paymentAmount='$paymentAmount',PaymentTrackingNumber='$PaymentTrackingNumber',Status='$status' where id='$id'");
//    if ($A->Arows()==1){
        $A->log("UPDATE","UPDATING WorkersPayment ".$id,$user_id);
        $A->MSGT('یرایش با موفقیت انجام شد');
        return;
//    }
}