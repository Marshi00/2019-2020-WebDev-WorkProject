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
    $NeWCompanyName=$A->RealString($_POST['CompanyName']);
    $NeWCompanyRegistrationNumber=$A->RealString($_POST['CompanyRegistrationNumber']);
    $NeWCompanyNationalID=$A->RealString($_POST['CompanyNationalID']);
    $NeWFixedPhoneNumber=$A->RealString($_POST['FixedPhoneNumber']);
    $NeWEconomicCode=$A->RealString($_POST['EconomicCode']);
    $NeWProvince=$A->RealString($_POST['Province']);
    $NeWCity=$A->RealString($_POST['City']);
    if (strlen($NeWFixedPhoneNumber)!=11){
        $Note=array('error'=>true,'MSG'=>'شماره تلفن اشتباه است ');
        return;
    }
    $CheckNeWCompanyRegistrationNumber = $A->Query("SELECT * FROM company WHERE CompanyRegistrationNumber='$NeWCompanyRegistrationNumber'");
    $OldCompanyRegistrationNumber=$A->Query("SELECT CompanyRegistrationNumber FROM company WHERE ID=''");
    if ($NeWCompanyRegistrationNumber!=$OldCompanyRegistrationNumber && $A->Numros($CheckNeWCompanyRegistrationNumber) != 0 ){
        $Note = array('error' => true, 'MSG' => 'این شماره ثبت شرکت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWCompanyNationalID = $A->Query("SELECT * FROM company WHERE CompanyNationalID='$NeWCompanyNationalID'");
    $OldCompanyNationalID=$A->Query("SELECT CompanyNationalID FROM company WHERE ID=''");
    if ($NeWCompanyNationalID!=$OldCompanyNationalID && $A->Numros($CheckNeWCompanyNationalID) != 0 ){
        $Note = array('error' => true, 'MSG' => 'این شماره ملی شرکت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWFixedPhoneNumber = $A->Query("SELECT * FROM company WHERE FixedPhoneNumber='$NeWFixedPhoneNumber'");
    $OldFixedPhoneNumber=$A->Query("SELECT FixedPhoneNumber FROM company WHERE ID=''");
    if ($NeWFixedPhoneNumber!=$OldFixedPhoneNumber && $A->Numros($CheckNeWFixedPhoneNumber) != 0 ){
        $Note = array('error' => true, 'MSG' => 'این شماره تلفن ثابت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWEconomicCode = $A->Query("SELECT * FROM company WHERE EconomicCode='$NeWEconomicCode'");
    $OldEconomicCode=$A->Query("SELECT EconomicCode FROM company WHERE ID=''");
    if ($NeWEconomicCode!=$CheckNeWEconomicCode && $A->Numros($OldEconomicCode) != 0 ){
        $Note = array('error' => true, 'MSG' => 'این کد اقتصادی شرکت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $A->Query("UPDATE company SET CompanyName='$NeWCompanyName' AND CompanyRegistrationNumber='$NeWCompanyRegistrationNumber' AND CompanyNationalID='$NeWCompanyNationalID' AND EconomicCode='$NeWEconomicCode' AND FixedPhoneNumber='$NeWFixedPhoneNumber' AND Province='$NeWProvince' AND City='$NeWCity' WHERE ID='' AND CompanyName='' ");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}