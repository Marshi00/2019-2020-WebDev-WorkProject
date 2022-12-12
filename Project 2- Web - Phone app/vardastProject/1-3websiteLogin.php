<?php
include "varWebSite.php";
$A = new varWebSite();
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
    $A->Query("UPDATE user SET Name='$Name',LastName='$LastName',dateOfBirth='$dateOfBirth',Password='$Password' WHERE PhoneNumber='$PhoneNumber'");
//    if ($A->Arows()==1){
    $Select=$A->Query("SELECT * FROM user WHERE PhoneNumber='$PhoneNumber' AND Name!=''");
    if ($A->Numros($Select)==1) {
        $S = $A->FetchAssoc($Select);
        $_SESSION['login'] = true;
        $_SESSION['user'] = 'user';
        $_SESSION['phoneNumber'] = $PhoneNumber;
        $_SESSION['id'] = $S['id'];
        $A->log("INSERT", "INSERTING user", $PhoneNumber);
        $Note = array('error' => false, 'MSG' => 'ثبت با موفقیت انجام شد');
        echo json_encode($Note);
        return;
//    }
    }
}