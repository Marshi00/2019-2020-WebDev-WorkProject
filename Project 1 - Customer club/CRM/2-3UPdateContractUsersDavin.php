<?php
include "Active3.php";
$A=new Active3();
if( $A->SetEmpty('Password') &&
    $A->SetEmpty('Name') &&
    $A->SetEmpty('LastName') &&
    $A->SetEmpty('NationalCode') &&
    isset($_POST['DateOfMarriage']) &&
    $A->SetEmpty('Address') &&
    $A->SetEmpty('FixedPhoneNumber') &&
    $A->SetEmpty('CompanyID') &&
    $A->SetEmpty('ContractID') &&
    $A->SetEmpty('CompanyName') &&
    $A->SetEmpty('Gender')
){
    $NeWPassWord=$A->RealString($_POST['Password']);
    $NeWName=$A->RealString($_POST['Name']);
    $NeWLastName=$A->RealString($_POST['LastName']);
    $NeWNationalCode=$A->RealString($_POST['NationalCode']);
    $NeWDateOfMarriage=$A->RealString($_POST['DateOfMarriage']);
    $NeWAddress=$A->RealString($_POST['Address']);
    $NeWFixedPhoneNumber=$A->RealString($_POST['FixedPhoneNumber']);
    $NeWCompanyID=$A->RealString($_POST['CompanyID']);
    $NeWContractID=$A->RealString($_POST['ContractID']);
    $NeWCompanyName=$A->RealString($_POST['CompanyName']);
    $NeWGender=$A->RealString($_POST['Gender']);
    if (strlen($NeWNationalCode)!=10 ){
        $Note=array('error'=>true,'MSG'=>'کد ملی اشتباه است ');
        return;
    }
    if (strlen($NeWFixedPhoneNumber)!=11){
        $Note=array('error'=>true,'MSG'=>'شماره ثابت  اشتباه است.از کد استانی استفاده نمایید. ');
        return;
    }
    if (!$A->validatePassword($NeWPassWord)){
        $Note=array('error'=>true,'MSG'=>'پسورد نا معتبر می باشد..پسورد باید بین 9 تا 20 کاراکتر ودارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWNationalCode = $A->Query("SELECT * FROM contractusers WHERE NationalCode='$NeWNationalCode'");
    $OldNationalCode=$A->Query("SELECT NationalCode FROM contractusers WHERE PhoneNumber=''");
    if ($NeWNationalCode!=$OldNationalCode && $A->Numros($CheckNeWNationalCode) != 0 ){
        $Note = array('error' => true, 'MSG' => 'این کد ملی قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWFixedPhoneNumber = $A->Query("SELECT * FROM contractusers WHERE FixedPhoneNumber='$NeWFixedPhoneNumber'");
    $OldFixedPhoneNumber=$A->Query("SELECT FixedPhoneNumber FROM contractusers WHERE PhoneNumber=''");
    if ($NeWFixedPhoneNumber!=$OldFixedPhoneNumber && $A->Numros($CheckNeWFixedPhoneNumber) != 0 ){
        $Note = array('error' => true, 'MSG' => 'این شماره ثابت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $NeWPassWord = $A->hash1($NeWPassWord);
    $A->Query("UPDATE contractusers SET Password='$NeWPassWord' AND Name='$NeWName' AND LastName='$NeWLastName' AND NationalCode='$NeWNationalCode' AND DateOfMarriage='$NeWDateOfMarriage' AND Adress='$NeWAddress' AND FixedPhoneNumber='$NeWFixedPhoneNumber' AND ContractID='$NeWContractID' AND CompanyID='$NeWCompanyID' AND CompanyName='$NeWCompanyName' AND Gender='$NeWGender' WHERE PhoneNumber='' ");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}