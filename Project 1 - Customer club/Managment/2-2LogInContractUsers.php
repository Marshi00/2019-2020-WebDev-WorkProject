<?php
include "Active3.php";
$A=new Active3();
if (
    $A->SetEmpty('PhoneNumber') &&
    $A->SetEmpty('Password')
) {
    $PhoneNumber = $A->RealString($_POST['PhoneNumber']);
    $PassWord = $A->RealString($_POST['Password']);
    $PassWord = $A->hash1($PassWord);
    $Select=$A->Query("SELECT * FROM contractusers WHERE PhoneNumber='$PhoneNumber' AND Password='$PassWord'");
    if ($A->Numros($Select)==1){
        session_start();
        $_SESSION['login']=true;
        $Note=array('error'=>false,'MSG'=>'');
    }
    else{
        $Note=array('error'=>true,'MSG'=>'نام کاربری یا رمز عبور اشتباه می باشد.');
    }
    echo json_encode($Note);
}