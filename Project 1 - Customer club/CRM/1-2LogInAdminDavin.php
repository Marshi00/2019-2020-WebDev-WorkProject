<?php
include "Active3.php";
$A=new Active3();
if (
    $A->SetEmpty('NationalID') &&
    $A->SetEmpty('PassWord')
) {
    $NationalID = $A->RealString($_POST['NationalID']);
    $PassWord = $A->RealString($_POST['PassWord']);
    $PassWord = $A->hash2($PassWord);
    $Select=$A->Query("SELECT * FROM admin WHERE `ID(national code)`='$NationalID' AND Password='$PassWord'");
    if ($A->Numros($Select)==1){
        $S=$A->FetchAssoc($Select);
        session_start();
        $_SESSION['login']=true;
        $_SESSION['Status']=$S['Status'];
        $_SESSION['Level']=$S['Level'];
        $Note=array('error'=>false,'MSG'=>'');
    }
    else{
        $Note=array('error'=>true,'MSG'=>'نام کاربری یا رمز عبور اشتباه می باشد.');
    }
    echo json_encode($Note);
}