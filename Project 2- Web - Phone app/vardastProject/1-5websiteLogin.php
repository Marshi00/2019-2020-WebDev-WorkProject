<?php
include "varWebSite.php";
$A = new varWebSite();
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
        session_start();
        $_SESSION['login']=true;
        $_SESSION['user']='user';
        $_SESSION['phoneNumber']=$PhoneNumber;
        $_SESSION['id']=$S['id'];
        $A->log("login","login User website ",$PhoneNumber);
        $Note=array('error'=>false,'MSG'=>'خوش آمدید.');
    }
    else{
        $Note=array('error'=>true,'MSG'=>'نام کاربری یا رمز عبور اشتباه می باشد.');
    }
    echo json_encode($Note);
}