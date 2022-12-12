<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
if(
$A->SetEmpty('phoneNumber') &&
$A->SetEmpty('code')
) {
    $phoneNumber = $A->RealString($_POST['phoneNumber']);
    $code = $A->RealString($_POST['code']);
    $Select=$A->Query("SELECT * FROM workers WHERE phoneNumber='$phoneNumber' AND verificationCode='$code'");
    if ($A->Numros($Select)==1){
        $Note=array('error'=>false);
    }
    else{
        $Note=array('error'=>true,'MSG'=>'کد اشتباه می باشد');
    }
    echo json_encode($Note);
}