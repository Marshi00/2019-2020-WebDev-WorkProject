<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('Name') &&
    $A->SetEmpty('LastName') &&
    $A->SetEmpty('Password') &&
    $A->SetEmpty('Email') &&
    $A->SetEmpty('PhoneNumber') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('nationalCode') &&
    $A->SetEmpty('Level')
) {
    $Name = $A->RealString($_POST['Name']);
    $user_id = $A->RealString($_POST['user_id']);
    $LastName = $A->RealString($_POST['LastName']);
    $Password = $A->RealString($_POST['Password']);
    $Email = $A->RealString($_POST['Email']);
    $PhoneNumber = $A->RealString($_POST['PhoneNumber']);
    $Level = $A->RealString($_POST['Level']);
    $nationalCode = $A->RealString($_POST['nationalCode']);
    if (!$A->validatePassword($Password)) {
        $A->MSG('پسورد نا معتبر می باشد.پسورد باید بین 9 تا 20 کاراکتر و دارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        return;
    }
    if (strlen($PhoneNumber) != 11 || substr($PhoneNumber, 0, 1) != 0) {
        $A->MSG('شماره وارد شده اشتباه است');
        return;
    }
    if (strlen($nationalCode) != 10) {
        $A->MSG('کد ملی اشتباه است ');
        return;
    }
    if (!$A->EmailDominValidation($Email)) {
        $A->MSG('ایمیل اشتباه است.');
        return;
    }
    $CheckNationalCode = $A->Query("SELECT * FROM admin WHERE nationalcode='$nationalCode'");
    if ($A->Numros($CheckNationalCode) != 0) {
     $A->MSG('این کد ملی قبلا ثبت شده است.');
        return;
    }
    $CheckPhoneNumber = $A->Query("SELECT * FROM admin WHERE PhoneNumber='$PhoneNumber'");
    if ($A->Numros($CheckPhoneNumber) != 0) {
        $A->MSG('این شماره قبلا ثبت شده است.');
        return;
    }
    $CheckEmail = $A->Query("SELECT * FROM admin WHERE Email='$Email'");
    if ($A->Numros($CheckEmail) != 0) {
       $A->MSG('این Email قبلا ثبت شده است.');
        return;
    }
    $Password=$A->hash1($Password);
    $date = date('Y-m-d');
    $time = date("H:i:s");
    $status = '1';
    $A->Query("INSERT INTO admin (nationalcode, Name, LastName, Password, Email, PhoneNumber, Level, Date, Time, Status) VALUES ('$nationalCode','$Name','$LastName','$Password','$Email','$PhoneNumber','$Level','$date','$time','$status')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING ADMIN",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
    return;
//    }
}
