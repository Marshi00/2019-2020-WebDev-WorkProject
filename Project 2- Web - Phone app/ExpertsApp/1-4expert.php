<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
if(
    $A->SetEmpty('phoneNumber')
) {
    $phoneNumber = $A->RealString($_POST['phoneNumber']);
    $CheckPhoneNumber = $A->Query("SELECT * FROM workers WHERE phoneNumber='$phoneNumber'");
    if ($A->Numros($CheckPhoneNumber) == 1) {
            $code=$A->getToken(4);
            $A->Query("UPDATE workers SET verificationCode='$code' WHERE phoneNumber='$phoneNumber'");
            $A::sendSms($code,$phoneNumber);
            $Note = array('error' => false, 'MSG' =>'کد ارسال گردید');
            echo json_encode($Note);
            return;
    }
    else{
        $A->MSG('این شماره در سیستم ثبت نشده است.');
        return;
    }
}