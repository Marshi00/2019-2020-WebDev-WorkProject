<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('name') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('lastName') &&
    $A->SetEmpty('phoneNumber') &&
    $A->SetEmpty('dateOfBirth') &&
    $A->SetEmpty('address') &&
    $A->SetEmpty('nationalCode') &&
    $A->SetEmpty('password') &&
    $A->SetEmpty('fixedPhoneNumber') &&
    $A->SetEmpty('maritalStatus') &&
    $A->SetEmpty('status') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('img') &&
    $A->SetEmpty('subCategoryId') &&
    $A->SetEmpty('gender')
) {
    $name = $A->RealString($_POST['name']);
    $subCategoryId = $A->RealString($_POST['subCategoryId']);
    $status = $A->RealString($_POST['status']);
    $user_id = $A->RealString($_POST['user_id']);
    $img = $A->RealString($_POST['img']);
    $id = $A->RealString($_POST['id']);
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
    $CheckNeWNationalCode = $A->Query("SELECT * FROM workers WHERE nationalCode='$nationalCode'");
    $OldNationalCode2 = $A->Query("SELECT * FROM workers WHERE id='$id'");
    $OldNationalCode1 = $A->FetchAssoc($OldNationalCode2);
    $OldNationalCode = $OldNationalCode1['nationalCode'];
    if ($nationalCode != $OldNationalCode && $A->Numros($CheckNeWNationalCode) != 0) {
        $A->MSG('این کد ملی قبلا ثبت شده است.');
        return;
    }
    $CheckNeWPhoneNumber = $A->Query("SELECT * FROM workers WHERE phoneNumber='$phoneNumber'");
    $OldPhoneNumber2 = $A->Query("SELECT * FROM workers WHERE id='$id'");
    $OldPhoneNumber1 = $A->FetchAssoc($OldPhoneNumber2);
    $OldPhoneNumber = $OldPhoneNumber1['phoneNumber'];
    if ($phoneNumber != $OldPhoneNumber && $A->Numros($CheckNeWPhoneNumber) != 0) {
        $A->MSG('این شماره قبلا ثبت شده است.');
        return;
    }
    $CheckNeWFixedPhoneNumber = $A->Query("SELECT * FROM workers WHERE fixedPhoneNumber='$fixedPhoneNumber'");
    $OldFixedPhoneNumber2 = $A->Query("SELECT * FROM workers WHERE id='$id'");
    $OldFixedPhoneNumber1 = $A->FetchAssoc($OldFixedPhoneNumber2);
    $OldFixedPhoneNumber = $OldPhoneNumber1['fixedPhoneNumber'];
    if ($fixedPhoneNumber != $OldFixedPhoneNumber && $A->Numros($CheckNeWFixedPhoneNumber) != 0) {
        $A->MSG('این شماره تلفن ثابت قبلا ثبت شده است.');
        return;
    }
    $password = $A->hash2($password);
    $A->Query("UPDATE workers SET nationalCode='$nationalCode',name='$name',lastName='$lastName',password='$password',phoneNumber='$phoneNumber',dateOfBirth='$dateOfBirth',address='$address',fixedPhoneNumber='$fixedPhoneNumber',status='$status',gender='$gender',maritalStatus='$maritalStatus',subCategoryId='$subCategoryId',WorkersImg='$img' WHERE id='$id'");
//    if ($A->Arows() == 1) {
        $A->log("UPDATE","UPDATING WOrker ".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}