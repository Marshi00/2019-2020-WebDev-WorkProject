<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('CompanyName') &&
    $A->SetEmpty('CompanyRegistrationNumber') &&
    $A->SetEmpty('CompanyNationalID') &&
    $A->SetEmpty('FixedPhoneNumber') &&
    $A->SetEmpty('EconomicCode') &&
    $A->SetEmpty('City') &&
    $A->SetEmpty('Province')

){
    $CompanyName=$A->RealString($_POST['CompanyName']);
    $CompanyRegistrationNumber=$A->RealString($_POST['CompanyRegistrationNumber']);
    $CompanyNationalID=$A->RealString($_POST['CompanyNationalID']);
    $FixedPhoneNumber=$A->RealString($_POST['FixedPhoneNumber']);
    $EconomicCode=$A->RealString($_POST['EconomicCode']);
    $Province=$A->RealString($_POST['Province']);
    $City=$A->RealString($_POST['City']);
    if (strlen($FixedPhoneNumber)!=11){
        $Note=array('error'=>true,'MSG'=>'شماره تلفن اشتباه است ');
        return;
    }
    $CheckCompanyRegistrationNumber=$A->Query("SELECT * FROM company WHERE CompanyRegistrationNumber='$CompanyRegistrationNumber'");
    if ($A->Numros($CheckCompanyRegistrationNumber)!=0){
        $Note=array('error'=>true,'MSG'=>'این شماره ثبت شرکت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckCompanyNationalID=$A->Query("SELECT * FROM company WHERE CompanyNationalID='$CompanyNationalID'");
    if ($A->Numros($CheckCompanyNationalID)!=0){
        $Note=array('error'=>true,'MSG'=>'این شماره ملی  شرکت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckFixedPhoneNumber=$A->Query("SELECT * FROM company WHERE FixedPhoneNumber='$FixedPhoneNumber'");
    if ($A->Numros($CheckFixedPhoneNumber)!=0){
        $Note=array('error'=>true,'MSG'=>'این شماره تلفن قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckEconomicCode=$A->Query("SELECT * FROM company WHERE EconomicCode='$EconomicCode'");
    if ($A->Numros($CheckEconomicCode)!=0){
        $Note=array('error'=>true,'MSG'=>'این کد اقتصادی شرکت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $A->Query("INSERT INTO company (CompanyName, CompanyRegistrationNumber, CompanyNationalID, EconomicCode, FixedPhoneNumber, Province,City) VALUES ('$CompanyName','$CompanyRegistrationNumber','$CompanyNationalID','$EconomicCode','$FixedPhoneNumber','$Province','$City')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}