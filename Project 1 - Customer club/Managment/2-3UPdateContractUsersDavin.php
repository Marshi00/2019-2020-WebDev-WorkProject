<?php
include "Active3.php";
$A=new Active3();
if(
//    $A->SetEmpty('Password') &&
    $A->SetEmpty('Name') &&
    $A->SetEmpty('LastName') &&
    $A->SetEmpty('NationalCode') &&
    isset($_POST['DateOfMarriage']) &&
    $A->SetEmpty('Address') &&
    $A->SetEmpty('FixedPhoneNumber') &&
    $A->SetEmpty('CompanyID') &&
    $A->SetEmpty('ContractID') &&
    $A->SetEmpty('PhoneNumber') &&
    $A->SetEmpty('Gender')
){
//    $NeWPassWord=$A->RealString($_POST['Password']);
    $PhoneNumber=$A->RealString($_POST['PhoneNumber']);
    $NeWName=$A->RealString($_POST['Name']);
    $NeWLastName=$A->RealString($_POST['LastName']);
    $NeWNationalCode=$A->RealString($_POST['NationalCode']);
    $NeWDateOfMarriage=$A->RealString($_POST['DateOfMarriage']);
    $NeWAddress=$A->RealString($_POST['Address']);
    $NeWFixedPhoneNumber=$A->RealString($_POST['FixedPhoneNumber']);
    $NeWCompanyID=$A->RealString($_POST['CompanyID']);
    $B=$A->Query("SELECT * FROM company WHERE ID='$NeWCompanyID'");
    $C=$A->FetchAssoc($B);
    $NeWCompanyName=$C['CompanyName'];
    $NeWContractID=$A->RealString($_POST['ContractID']);
    $NeWGender=$A->RealString($_POST['Gender']);
    if (strlen($NeWNationalCode)!=10 ){
        $Note=array('error'=>true,'MSG'=>'کد ملی اشتباه است ');
        echo json_encode($Note);
        return;
    }
    if (strlen($NeWFixedPhoneNumber)!=11){
        $Note=array('error'=>true,'MSG'=>'شماره ثابت  اشتباه است.از کد استانی استفاده نمایید. ');
        echo json_encode($Note);
        return;
    }
//    if (!$A->validatePassword($NeWPassWord)){
//        $Note=array('error'=>true,'MSG'=>'پسورد نا معتبر می باشد..پسورد باید بین 9 تا 20 کاراکتر ودارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
//        echo json_encode($Note);
//        return;
//    }
    $CheckNeWNationalCode = $A->Query("SELECT * FROM user WHERE NationalCode='$NeWNationalCode'");
    $OldNationalCode2=$A->Query("SELECT * FROM user WHERE PhoneNumber='$PhoneNumber'");
    $OldNationalCode1=$A->FetchAssoc($OldNationalCode2);
    $OldNationalCode=$OldNationalCode1['NationalCode'];
    if ($NeWNationalCode!=$OldNationalCode && $A->Numros($CheckNeWNationalCode) != 0 ){
        $Note = array('error' => true, 'MSG' => 'این کد ملی قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWFixedPhoneNumber = $A->Query("SELECT * FROM contractusers WHERE FixedPhoneNumber='$NeWFixedPhoneNumber'");
    $OldFixedPhoneNumber2=$A->Query("SELECT * FROM contractusers WHERE PhoneNumber='$PhoneNumber'");
    $OldFixedPhoneNumber1=$A->FetchAssoc($OldFixedPhoneNumber2);
    $OldFixedPhoneNumber=$OldFixedPhoneNumber1['FixedPhoneNumber'];
    if ($NeWFixedPhoneNumber!=$OldFixedPhoneNumber && $A->Numros($CheckNeWFixedPhoneNumber) != 0 ){
        $Note = array('error' => true, 'MSG' => 'این شماره ثابت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
//    $NeWPassWord = $A->hash1($NeWPassWord);
    $A->Query("UPDATE contractusers SET  Name='$NeWName' , LastName='$NeWLastName' , NationalCode='$NeWNationalCode' , DateOfMarriage='$NeWDateOfMarriage' , Adress='$NeWAddress' , FixedPhoneNumber='$NeWFixedPhoneNumber' , ContractID='$NeWContractID' , CompanyID='$NeWCompanyID' , CompanyName='$NeWCompanyName' , Gender='$NeWGender' WHERE PhoneNumber='$PhoneNumber' ");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}