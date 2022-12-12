<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('Name') &&
    $A->SetEmpty('LastName') &&
    $A->SetEmpty('Password') &&
    $A->SetEmpty('Email') &&
    $A->SetEmpty('PhoneNumber') &&
    $A->SetEmpty('nationalCode') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('Status') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('Level')
) {
    $Name = $A->RealString($_POST['Name']);
    $user_id = $A->RealString($_POST['user_id']);
    $id = $A->RealString($_POST['id']);
    $Status = $A->RealString($_POST['Status']);
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
    $CheckNeWNationalCode = $A->Query("SELECT * FROM admin WHERE nationalCode='$nationalCode'");
    $OldNationalCode2=$A->Query("SELECT * FROM admin WHERE id='$id'");
    $OldNationalCode1=$A->FetchAssoc($OldNationalCode2);
    $OldNationalCode=$OldNationalCode1['nationalCode'];
    if ($nationalCode!=$OldNationalCode && $A->Numros($CheckNeWNationalCode) != 0 ){
        $A->MSG('این کد ملی قبلا ثبت شده است.');
        return;
    }
    $CheckNeWPhoneNumber = $A->Query("SELECT * FROM admin WHERE PhoneNumber='$PhoneNumber'");
    $OldPhoneNumber2=$A->Query("SELECT * FROM admin WHERE id='$id'");
    $OldPhoneNumber1=$A->FetchAssoc($OldPhoneNumber2);
    $OldPhoneNumber=$OldPhoneNumber1['PhoneNumber'];
    if ($PhoneNumber!=$OldPhoneNumber && $A->Numros($CheckNeWPhoneNumber) != 0 ){
        $A->MSG('این شماره قبلا ثبت شده است.');
        return;
    }
    $CheckNeWEmail = $A->Query("SELECT * FROM admin WHERE Email='$Email'");
    $OldEmail2=$A->Query("SELECT * FROM admin WHERE id='$id'");
    $OldEmail1=$A->FetchAssoc($OldEmail2);
    $OldEmail=$OldEmail1['Email'];
    if ($Email!=$OldEmail && $A->Numros($CheckNeWEmail)!=0){
        $A->MSG('این Email قبلا ثبت شده است.');
        return;
    }
    $Password=$A->hash1($Password);
    $A->Query("UPDATE admin SET Name='$Name',LastName='$LastName',Status='$Status',Level='$Level',Email='$Email',nationalcode='$nationalCode',PhoneNumber='$PhoneNumber',Password='$Password' WHERE id='$id'");
//    if ($A->Arows()==1){
        $A->log("UPDATE","UPDATING ADMIN ".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}
