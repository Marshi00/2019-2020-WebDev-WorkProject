<?php
include "Active3.php";
$A=new Active3();
if( $A->SetEmpty('Password') &&
    $A->SetEmpty('PhoneNumber') &&
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
    $PassWord=$A->RealString($_POST['Password']);
    $PhoneNumber=$A->RealString($_POST['PhoneNumber']);
    $Name=$A->RealString($_POST['Name']);
    $LastName=$A->RealString($_POST['LastName']);
    $NationalCode=$A->RealString($_POST['NationalCode']);
    $DateOfMarriage=$A->RealString($_POST['DateOfMarriage']);
    $Address=$A->RealString($_POST['Address']);
    $FixedPhoneNumber=$A->RealString($_POST['FixedPhoneNumber']);
    $CompanyID=$A->RealString($_POST['CompanyID']);
    $ContractID=$A->RealString($_POST['ContractID']);
    $CompanyName=$A->RealString($_POST['CompanyName']);
    $Gender=$A->RealString($_POST['Gender']);
    if (strlen($NationalCode)!=10 ){
        $Note=array('error'=>true,'MSG'=>'کد ملی اشتباه است ');
        return;
    }
    if (strlen($FixedPhoneNumber)!=11){
        $Note=array('error'=>true,'MSG'=>'شماره ثابت  اشتباه است.از کد استانی استفاده نمایید. ');
        return;
    }
    if (strlen($PhoneNumber)!=11 || substr($PhoneNumber,0,1)!=0){
        $Note=array('error'=>true,'MSG'=>'شماره وارد شده استباه است');
        return;
    }
    if (!$A->validatePassword($PassWord)){
        $Note=array('error'=>true,'MSG'=>'پسورد نا معتبر می باشد..پسورد باید بین 9 تا 20 کاراکتر ودارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        echo json_encode($Note);
        return;
    }
    $CheckPhoneNumber=$A->Query("SELECT * FROM contractusers WHERE PhoneNumber='$PhoneNumber'");
    if ($A->Numros($CheckPhoneNumber)!=0){
        $Note=array('error'=>true,'MSG'=>'این شماره قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckFixedPhoneNumber=$A->Query("SELECT * FROM contractusers WHERE FixedPhoneNumber='$FixedPhoneNumber'");
    if ($A->Numros($CheckFixedPhoneNumber)!=0){
        $Note=array('error'=>true,'MSG'=>'این شماره تلفن ثابت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckNationalCode=$A->Query("SELECT * FROM contractusers WHERE NationalCode='$NationalCode'");
    if ($A->Numros($CheckNationalCode)!=0){
        $Note=array('error'=>true,'MSG'=>'این کد ملی قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $PassWord = $A->hash1($PassWord);
    $A->Query("INSERT INTO contractusers (NationalCode, Name, LastName, PhoneNumber, Password, DateOfMarriage, Adress, Gender, FixedPhoneNumber, CompanyID, ContractID, CompanyName) VALUES ('$NationalCode','$Name','$LastName','$PhoneNumber','$PassWord','$DateOfMarriage','$Address','$Gender','$FixedPhoneNumber','$CompanyID','$ContractID','$CompanyName')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}
