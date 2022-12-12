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
    $A->SetEmpty('ID') &&
    $A->SetEmpty('Province')

){
    $NeWCompanyName=$A->RealString($_POST['CompanyName']);
    $NeWCompanyRegistrationNumber=$A->RealString($_POST['CompanyRegistrationNumber']);
    $NeWCompanyNationalID=$A->RealString($_POST['CompanyNationalID']);
    $NeWFixedPhoneNumber=$A->RealString($_POST['FixedPhoneNumber']);
    $NeWEconomicCode=$A->RealString($_POST['EconomicCode']);
    $NeWProvince=$A->RealString($_POST['Province']);
    $NeWCity=$A->RealString($_POST['City']);
    $ID=$A->RealString($_POST['ID']);
    if(strlen($NeWFixedPhoneNumber)!=11){
        $Note=array('error'=>true,'MSG'=>'شماره تلفن اشتباه است ');
        echo json_encode($Note);
        return;
    }
    $CheckNeWCompanyRegistrationNumber=$A->Query("SELECT * FROM company WHERE CompanyRegistrationNumber='$NeWCompanyRegistrationNumber'");
    $OldCompanyRegistrationNumber2=$A->Query("SELECT * FROM company WHERE ID='$ID'");
    $OldCompanyRegistrationNumber1=$A->FetchAssoc($OldCompanyRegistrationNumber2);
    $OldCompanyRegistrationNumber=$OldCompanyRegistrationNumber1['CompanyRegistrationNumber'];
    if($NeWCompanyRegistrationNumber!=$OldCompanyRegistrationNumber && $A->Numros($CheckNeWCompanyRegistrationNumber)!=0){
        $Note=array('error' => true,'MSG'=>'این شماره ثبت شرکت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWCompanyNationalID=$A->Query("SELECT * FROM company WHERE CompanyNationalID='$NeWCompanyNationalID'");
    $OldCompanyNationalID2=$A->Query("SELECT * FROM company WHERE ID='$ID'");
    $OldCompanyNationalID1=$A->FetchAssoc($OldCompanyNationalID2);
    $OldCompanyNationalID=$OldCompanyNationalID1['CompanyNationalID'];
    if($NeWCompanyNationalID!=$OldCompanyNationalID && $A->Numros($CheckNeWCompanyNationalID)!=0){
        $Note = array('error'=>true,'MSG'=>'این شماره ملی شرکت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWFixedPhoneNumber=$A->Query("SELECT * FROM company WHERE FixedPhoneNumber='$NeWFixedPhoneNumber'");
    $OldFixedPhoneNumber2=$A->Query("SELECT * FROM company WHERE ID='$ID'");
    $OldFixedPhoneNumber1=$A->FetchAssoc($OldFixedPhoneNumber2);
    $OldFixedPhoneNumber=$OldFixedPhoneNumber1['FixedPhoneNumber'];
    if($NeWFixedPhoneNumber!=$OldFixedPhoneNumber && $A->Numros($CheckNeWFixedPhoneNumber)!=0){
        $Note=array('error'=>true,'MSG'=>'این شماره تلفن ثابت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckNeWEconomicCode = $A->Query("SELECT * FROM company WHERE EconomicCode='$NeWEconomicCode'");
    $OldEconomicCode2=$A->Query("SELECT * FROM company WHERE ID='$ID'");
    $OldEconomicCode1=$A->FetchAssoc($OldEconomicCode2);
    $OldEconomicCode=$OldEconomicCode1['EconomicCode'];
    if ($NeWEconomicCode!=$CheckNeWEconomicCode && $A->Numros($CheckNeWEconomicCode)!=0){
        $Note =array('error'=>true,'MSG'=>'این کد اقتصادی شرکت قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $A->Query("UPDATE company SET CompanyName='$NeWCompanyName' , CompanyRegistrationNumber='$NeWCompanyRegistrationNumber' , CompanyNationalID='$NeWCompanyNationalID' , EconomicCode='$NeWEconomicCode' , FixedPhoneNumber='$NeWFixedPhoneNumber' , Province='$NeWProvince' , City='$NeWCity' WHERE ID='$ID' ");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}