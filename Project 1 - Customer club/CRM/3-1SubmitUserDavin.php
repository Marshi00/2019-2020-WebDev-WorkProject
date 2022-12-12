<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('Password') &&
    $A->SetEmpty('PhoneNumber')
){
    $PassWord=$A->RealString($_POST['Password']);
    $PhoneNumber=$A->RealString($_POST['PhoneNumber']);
    if (!$A->validatePassword($PassWord)){
        $Note=array('error'=>true,'MSG'=>'پسورد نا معتبر می باشد..پسورد باید بین 9 تا 20 کاراکتر ودارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        echo json_encode($Note);
        return;
    }
    if (strlen($PhoneNumber)!=11 || substr($PhoneNumber,0,1)!=0){
        $Note=array('error'=>true,'MSG'=>'شماره وارد شده استباه است');
        return;
    }
    $CheckPhoneNumber=$A->Query("SELECT * FROM user WHERE PhoneNumber='$PhoneNumber'");
    if ($A->Numros($CheckPhoneNumber)!=0){
        $Note=array('error'=>true,'MSG'=>'این شماره قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $PassWord=$A->hash1($PassWord);
    $A->Query("INSERT INTO user (PhoneNumber,Password) VALUES ('$PhoneNumber','$PassWord')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;

}
