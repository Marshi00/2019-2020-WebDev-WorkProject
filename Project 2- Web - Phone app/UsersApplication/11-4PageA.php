<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
if(
    $A->SetEmpty('phoneNumber')
) {
    $phoneNumber = $A->RealString($_POST['phoneNumber']);
    $CheckPhoneNumber = $A->Query("SELECT * FROM user WHERE PhoneNumber='$phoneNumber'");
    if ($A->Numros($CheckPhoneNumber) == 1) {
        $CheckPhoneNumber2 = $A->Query("SELECT * FROM user WHERE PhoneNumber='$phoneNumber'AND Name!=''");
        if ($A->Numros($CheckPhoneNumber2) == 1) {
            $code=$A->getToken(4);
            $A->Query("UPDATE user SET verificationCode='$code' WHERE PhoneNumber='$phoneNumber'");
            $A::sendSms($code,$phoneNumber);
            $Note = array('error' => false, 'MSG' =>'کد ارسال گردید');
            echo json_encode($Note);
            return;
        }
        elseif ($A->Numros($CheckPhoneNumber2) == 0){
            $A->MSG('این شماره در سیستم ثبت نشده است.');
            return;
        }
    }
    else{
        $A->MSG('این شماره در سیستم ثبت نشده است.');
        return;
    }
}