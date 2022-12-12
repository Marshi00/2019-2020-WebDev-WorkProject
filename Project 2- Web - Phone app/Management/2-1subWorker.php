<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('name') &&
    $A->SetEmpty('lastName') &&
    $A->SetEmpty('phoneNumber') &&
    $A->SetEmpty('dateOfBirth') &&
    $A->SetEmpty('address') &&
    $A->SetEmpty('nationalCode') &&
    $A->SetEmpty('password') &&
    $A->SetEmpty('fixedPhoneNumber') &&
    $A->SetEmpty('maritalStatus') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('subCategoryId') &&
    $A->SetEmpty('img') &&
    $A->SetEmpty('gender')
) {
    $name = $A->RealString($_POST['name']);
    $img = $A->RealString($_POST['img']);
    $subCategoryId = $A->RealString($_POST['subCategoryId']);
    $user_id = $A->RealString($_POST['user_id']);
    $lastName = $A->RealString($_POST['lastName']);
    $phoneNumber = $A->RealString($_POST['phoneNumber']);
    $dateOfBirth = $A->RealString($_POST['dateOfBirth']);
    $address = $A->RealString($_POST['address']);
    $nationalCode = $A->RealString($_POST['nationalCode']);
    $password = $A->RealString($_POST['password']);
    $fixedPhoneNumber = $A->RealString($_POST['fixedPhoneNumber']);
    $gender = $A->RealString($_POST['gender']);
    $maritalStatus = $A->RealString($_POST['maritalStatus']);
    if (!$A->validatePassword($password)) {
        $A->MSG('پسورد نا معتبر می باشد.پسورد باید بین 9 تا 20 کاراکتر و دارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        return;
    }
    if (strlen($phoneNumber) != 11 || substr($phoneNumber, 0, 1) != 0) {
        $A->MSG('شماره وارد شده اشتباه است');
        return;
    }
    if (strlen($nationalCode) != 10) {
        $A->MSG('کد ملی اشتباه است ');
        return;
    }
    if (strlen($fixedPhoneNumber) != 11 || substr($fixedPhoneNumber, 0, 1) != 0) {
        $A->MSG('شماره تلفن ثابت وارد شده اشتباه است ،از کد استانی استفاده کنید');
        return;
    }
    $CheckNationalCode = $A->Query("SELECT * FROM workers WHERE nationalCode='$nationalCode'");
    if ($A->Numros($CheckNationalCode) != 0) {
        $A->MSG('این کد ملی قبلا ثبت شده است.');
        return;
    }
    $CheckPhoneNumber = $A->Query("SELECT * FROM workers WHERE phoneNumber='$phoneNumber'");
    if ($A->Numros($CheckPhoneNumber) != 0) {
        $A->MSG('این شماره قبلا ثبت شده است.');
        return;
    }
    $CheckFixedPhoneNumber = $A->Query("SELECT * FROM workers WHERE fixedPhoneNumber='$fixedPhoneNumber'");
    if ($A->Numros($CheckFixedPhoneNumber) != 0) {
        $A->MSG('این شماره تلفن ثابت قبلا ثبت شده است.');
        return;
    }
    $password=$A->hash2($password);
    $date = date('Y-m-d');
    $time = date("H:i:s");
    $status = '1';
    $A->Query("INSERT INTO workers (name, lastName, phoneNumber, dateOfBirth, address, nationalCode, password, fixedPhoneNumber, date, time, status, gender, maritalStatus, subCategoryId,WorkersImg) VALUES ('$name','$lastName','$phoneNumber','$dateOfBirth','$address','$nationalCode','$password','$fixedPhoneNumber','$date','$time','$status','$gender','$maritalStatus','$subCategoryId','$img')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING Worker",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
        return;
//    }
}