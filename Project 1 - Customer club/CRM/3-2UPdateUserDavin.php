<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('name') &&
    $A->SetEmpty('LastName') &&
    $A->SetEmpty('NationalCode') &&
    isset($_POST['DateOfMarriage']) &&
    $A->SetEmpty('Address') &&
    $A->SetEmpty('FixedPhoneNumber') &&
    $A->SetEmpty('Gender') &&
    $A->SetEmpty('DateOfBirth') &&
    $A->SetEmpty('Password') &&
    $A->SetEmpty('PhoneNumber') &&
    isset($_POST['InviterID'])
){
    $NeWLastName=$A->RealString($_POST['LastName']);
    $NeWPassword=$A->RealString($_POST['Password']);
    $NeWName=$A->RealString($_POST['name']);
    $NeWNationalCode=$A->RealString($_POST['NationalCode']);
    $NeWInviterID=$A->RealString($_POST['InviterID']);
    $NeWGender=$A->RealString($_POST['Gender']);
    $NeWDateOfMarriage=$A->RealString($_POST['DateOfMarriage']);
    $NeWAddress=$A->RealString($_POST['Address']);
    $NeWDateOfBirth=$A->RealString($_POST['DateOfBirth']);
    $NeWFixedPhoneNumber=$A->RealString($_POST['FixedPhoneNumber']);
    $PhoneNumber=$A->RealString($_POST['PhoneNumber']);
    if ( strlen($NeWNationalCode)!=10 ){
        $Note=array('error'=>true,'MSG'=>'کد ملی اشتباه است ');
        echo json_encode($Note);
        return;
    }
    if ($A->SetEmpty($NeWInviterID) && strlen($NeWInviterID)!=11){
        $Note=array('error'=>true,'MSG'=>'شناسه دعوت کننده اشتباه است ');
        echo json_encode($Note);
        return;
    }
    if (strlen($NeWFixedPhoneNumber)!=11){
        $Note=array('error'=>true,'MSG'=>'شماره ثابت  اشتباه است.از کد استانی استفاده نمایید. ');
        echo json_encode($Note);
        return;
    }
    if (!$A->validatePassword($NeWPassword)){
        $Note=array('error'=>true,'MSG'=>'پسورد نا معتبر می باشد..پسورد باید بین 9 تا 20 کاراکتر ودارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWNationalCode = $A->Query("SELECT * FROM user WHERE NationalCode='$NeWNationalCode'");
    $OldNationalCode2=$A->Query("SELECT * FROM user WHERE PhoneNumber='$PhoneNumber'");
    $OldNationalCode1=$A->FetchAssoc($OldNationalCode2);
    $OldNationalCode=$OldNationalCode1['NationalCode'];
    if ($NeWNationalCode!=$OldNationalCode && $A->Numros($CheckNeWNationalCode) != 0 ){
        $Note = array('error' => true, 'MSG' => 'این کد ملی قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWFixedPhoneNumber = $A->Query("SELECT * FROM user WHERE FixedPhoneNumber='$NeWFixedPhoneNumber'");
    $OldFixedPhoneNumber2=$A->Query("SELECT * FROM user WHERE PhoneNumber='$PhoneNumber'");
    $OldFixedPhoneNumber1=$A->FetchAssoc($OldFixedPhoneNumber2);
    $OldFixedPhoneNumber=$OldFixedPhoneNumber1['FixedPhoneNumber'];
    if ($NeWFixedPhoneNumber!=$OldFixedPhoneNumber && $A->Numros($CheckNeWFixedPhoneNumber) != 0 ){
        $Note = array('error' => true, 'MSG' => 'این شماره ثابت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $NeWPasswordHash=$A->hash1($NeWPassword);
    $A->Query("UPDATE user SET Password='$NeWPasswordHash',Name='$NeWName' , LastName='$NeWLastName' , NationalCode='$NeWNationalCode' , InviterID='$NeWInviterID' , FixedPhoneNumber='$NeWFixedPhoneNumber' , Address='$NeWAddress' , DateOfMarriage='$NeWDateOfMarriage' , Gender='$NeWGender' , DateOfBirth='$NeWDateOfBirth' WHERE  PhoneNumber='$PhoneNumber'");
    $Note=array('error'=>false,'MSG'=>'تکمیل اطلاعات ثبت نام با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}
