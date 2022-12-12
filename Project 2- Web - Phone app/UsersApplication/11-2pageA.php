<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
if(
$A->SetEmpty('phoneNumber') &&
$A->SetEmpty('code')
) {
    $phoneNumber = $A->RealString($_POST['phoneNumber']);
    $code = $A->RealString($_POST['code']);
    $Select=$A->Query("SELECT * FROM user WHERE PhoneNumber='$phoneNumber' AND verificationCode='$code'");
    if ($A->Numros($Select)==1){
        $Note=array('error'=>false);
    }
    else{
        $Note=array('error'=>true,'MSG'=>'کد اشتباه می باشد');
    }
    echo json_encode($Note);
}