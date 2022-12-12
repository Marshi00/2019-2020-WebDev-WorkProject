<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
if (
    $A->SetEmpty('PhoneNumber') &&
    $A->SetEmpty('Password')
) {
    $PhoneNumber = $A->RealString($_POST['PhoneNumber']);
    $Password = $A->RealString($_POST['Password']);
    $Password = $A->hash2($Password);
    $Select=$A->Query("SELECT * FROM user WHERE PhoneNumber='$PhoneNumber' AND Password='$Password'");
    if ($A->Numros($Select)==1){
        $S=$A->FetchAssoc($Select);
        $id=$S['id'];
        $token=$A->getToken(10);
        $token1=$A->hash1($token);
        $token2=hash('SHA256',$token1);
        $token2=$A->hash2($token2);
        $Select3=$A->Query("UPDATE user SET token='$token2' WHERE id='$id')");
        $A->log("login","login User ",$PhoneNumber);
        $Note=array('error'=>false,'login'=>true,'token'=>$token1);
    }
    else{
        $Note=array('error'=>true,'MSG'=>'نام کاربری یا رمز عبور اشتباه می باشد.');
    }
    echo json_encode($Note);
}