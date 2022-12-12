<?php
include "varManagement.php";
$A = new varManagement();
if (
    $A->SetEmpty('nationalCode') &&
    $A->SetEmpty('Password')
) {
    $nationalCode = $A->RealString($_POST['nationalCode']);
    $Password = $A->RealString($_POST['Password']);
    $Password = $A->hash1($Password);
    $Select=$A->Query("SELECT * FROM admin WHERE nationalcode='$nationalCode' AND Password='$Password'");
    if ($A->Numros($Select)==1){
        $S=$A->FetchAssoc($Select);
        session_start();
        $_SESSION['login']=true;
        $_SESSION['Status']=$S['Status'];
        $_SESSION['Level']=$S['Level'];
        $_SESSION['id']=$S['id'];
        $A->log("login","login ADMIN ",$nationalCode);
        $Note=array('error'=>false,'MSG'=>'');
    }
    else{
        $Note=array('error'=>true,'MSG'=>'نام کاربری یا رمز عبور اشتباه می باشد.');
    }
    echo json_encode($Note);
}