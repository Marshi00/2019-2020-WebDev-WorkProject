<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('Password') &&
    $A->SetEmpty('PhoneNumber')
){
    $NeWPassWord=$A->RealString($_POST['Password']);
    $NeWPhoneNumber=$A->RealString($_POST['PhoneNumber']);
    if (!$A->validatePassword($NeWPassWord)){
        $Note=array('error'=>true,'MSG'=>'پسورد نا معتبر می باشد..پسورد باید بین 9 تا 20 کاراکتر ودارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        echo json_encode($Note);
        return;
    }
    if (strlen($NeWPhoneNumber)!=11 || substr($NeWPhoneNumber,0,1)!=0){
        $Note=array('error'=>true,'MSG'=>'شماره وارد شده استباه است');
        return;
    }
    $NeWPassWord=$A->hash1($NeWPassWord);
    $A->Query("UPDATE user  SET Password='$NeWPassWord' AND PhoneNumber='$NeWPhoneNumber' WHERE PhoneNumber='' AND Password=''");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}