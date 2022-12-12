<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
if(
    $A->SetEmpty('Name') &&
    $A->SetEmpty('LastName') &&
    $A->SetEmpty('PhoneNumber') &&
    $A->SetEmpty('Password') &&
    $A->SetEmpty('dateOfBirth')
) {
    $Name = $A->RealString($_POST['Name']);
    $LastName = $A->RealString($_POST['LastName']);
    $PhoneNumber = $A->RealString($_POST['PhoneNumber']);
    $Password = $A->RealString($_POST['Password']);
    $dateOfBirth = $A->RealString($_POST['dateOfBirth']);
    if (strlen($PhoneNumber) != 11 || substr($PhoneNumber, 0, 1) != 0) {
        $A->MSG('شماره وارد شده اشتباه است');
        return;
    }
    if (!$A->validatePassword($Password)) {
        $A->MSG('پسورد نا معتبر می باشد.پسورد باید بین 9 تا 20 کاراکتر و دارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        return;
    }
    $Password=$A->hash2($Password);
    $token=$A->getToken(10);
    $token1=$A->hash1($token);
    $token2=hash('SHA256',$token1);
    $token2=$A->hash2($token2);
    $A->Query("UPDATE user SET Name='$Name',LastName='$LastName',dateOfBirth='$dateOfBirth',Password='$Password',token='$token2' WHERE PhoneNumber='$PhoneNumber'");
//    if ($A->Arows()==1){
    $A->log("INSERT","INSERTING user",$PhoneNumber);
    $Note=array('error'=>false,'login'=>true,'token'=>$token1,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
//    }
}