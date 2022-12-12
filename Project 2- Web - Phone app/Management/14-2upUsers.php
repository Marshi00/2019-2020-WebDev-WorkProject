<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('Name') &&
    $A->SetEmpty('LastName') &&
    $A->SetEmpty('PhoneNumber') &&
    $A->SetEmpty('Password') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('dateOfBirth')
) {
    $Name = $A->RealString($_POST['Name']);
    $id = $A->RealString($_POST['id']);
    $user_id = $A->RealString($_POST['user_id']);
    $LastName = $A->RealString($_POST['LastName']);
    $PhoneNumber = $A->RealString($_POST['PhoneNumber']);
    $Password = $A->RealString($_POST['Password']);
    $dateOfBirth = $A->RealString($_POST['dateOfBirth']);
    if (strlen($PhoneNumber) != 11 || substr($PhoneNumber, 0, 1) != 0) {
        $A->MSG('شماره وارد شده اشتباه است');
        return;
    }
    $CheckNeWPhoneNumber = $A->Query("SELECT * FROM user WHERE PhoneNumber='$PhoneNumber'");
    $OldPhoneNumber2=$A->Query("SELECT * FROM user WHERE id='$id'");
    $OldPhoneNumber1=$A->FetchAssoc($OldPhoneNumber2);
    $OldPhoneNumber=$OldPhoneNumber1['PhoneNumber'];
    if ($PhoneNumber!=$OldPhoneNumber && $A->Numros($CheckNeWPhoneNumber) != 0 ){
        $A->MSG('این شماره قبلا ثبت شده است.');
        return;
    }
    if (!$A->validatePassword($Password)) {
        $A->MSG('پسورد نا معتبر می باشد.پسورد باید بین 9 تا 20 کاراکتر و دارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        return;
    }
    $A->Query("UPDATE user SET Name='$Name',LastName='$LastName',PhoneNumber='$PhoneNumber',Password='$Password',dateOfBirth='$dateOfBirth' WHERE id='$id'");
//    if ($A->Arows()==1){
        $A->log("UPDATING","UPDATING user ".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}