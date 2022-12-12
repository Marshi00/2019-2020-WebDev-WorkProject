<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
if(
    $A->SetEmpty('phoneNumber')
) {
    $phoneNumber = $A->RealString($_POST['phoneNumber']);
    if (strlen($phoneNumber) != 11 || substr($phoneNumber, 0, 1) != 0) {
        $A->MSG('شماره وارد شده اشتباه است');
        return;
    }
    $code=$A->getToken(4);
    $CheckPhoneNumber = $A->Query("SELECT * FROM user WHERE PhoneNumber='$phoneNumber'");
    if ($A->Numros($CheckPhoneNumber) == 1) {
        $CheckPhoneNumber2 = $A->Query("SELECT * FROM user WHERE PhoneNumber='$phoneNumber'AND Name!=''");
        if ($A->Numros($CheckPhoneNumber2) == 1) {
            $Note = array('error' => true, 'MSG' =>'این شماره فبلا ثبت شده است.','page'=>'login');
            echo json_encode($Note);
            return;
        }
        elseif ($A->Numros($CheckPhoneNumber2) == 0){
            $A->Query("UPDATE user SET verificationCode='$code' WHERE PhoneNumber='$phoneNumber'");
            $A::sendSms($code,$phoneNumber);
            $Note = array('error' => false, 'MSG' =>'کد ارسال گردید','page'=>'submit');
            echo json_encode($Note);
            return;
        }
    }
    elseif ($A->Numros($CheckPhoneNumber) == 0){
        $A->Query("INSERT INTO user (PhoneNumber,verificationCode) VALUES ('$phoneNumber','$code')");
        $A::sendSms($code,$phoneNumber);
        $A->log("INSERT","INSERTING APP user ",$phoneNumber);
        $Note = array('error' => false, 'MSG' =>'کد ارسال گردید','page'=>'submit');
        echo json_encode($Note);
        return;
    }
    else{
        $method='fail';
        $A->MSG('شماره نا معتبر');
        return;
    }
}