<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
if (
    $A->SetEmpty('nationalCode') &&
    $A->SetEmpty('password')
) {
    $nationalCode = $A->RealString($_POST['nationalCode']);
    $password = $A->RealString($_POST['password']);
    $password = $A->hash2($password);
    $Select=$A->Query("SELECT * FROM workers WHERE nationalCode='$nationalCode' AND password='$password'");
    if ($A->Numros($Select)==1){
        $S=$A->FetchAssoc($Select);
        $id=$S['id'];
        $token=$A->getToken(10);
        $token1=$A->hash1($token);
        $token2=hash('SHA256',$token1);
        $token2=$A->hash2($token2);
        $Select3=$A->Query("UPDATE workers SET token='$token2' WHERE id='$id')");
        $A->log("login","login expert ",$nationalCode);
        $Note=array('error'=>false,'login'=>true,'token'=>$token1);
    }
    else{
        $Note=array('error'=>true,'MSG'=>'نام کاربری یا رمز عبور اشتباه می باشد.');
    }
    echo json_encode($Note);
}