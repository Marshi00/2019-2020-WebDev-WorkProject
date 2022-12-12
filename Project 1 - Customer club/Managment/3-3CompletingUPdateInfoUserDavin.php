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
    $A->SetEmpty('PhoneNumber') &&
    isset($_POST['InviterID'])
){
    $LastName=$A->RealString($_POST['LastName']);
    $Name=$A->RealString($_POST['name']);
    $PhoneNumber=$A->RealString($_POST['PhoneNumber']);
    $NationalCode=$A->RealString($_POST['NationalCode']);
    $InviterID=$A->RealString($_POST['InviterID']);
    $Gender=$A->RealString($_POST['Gender']);
    $DateOfMarriage=$A->RealString($_POST['DateOfMarriage']);
    $Address=$A->RealString($_POST['Address']);
    $DateOfBirth=$A->RealString($_POST['DateOfBirth']);
    $FixedPhoneNumber=$A->RealString($_POST['FixedPhoneNumber']);
    if (strlen($NationalCode)!=10 ){
        $Note=array('error'=>true,'MSG'=>'کد ملی اشتباه است ');
        echo json_encode($Note);
        return;
    }
    if ($A->SetEmpty($_POST['InviterID']) && strlen($InviterID)!=11){
        $Note=array('error'=>true,'MSG'=>'شناسه دعوت کننده اشتباه است ');
        echo json_encode($Note);
        return;
    }
    if (strlen($FixedPhoneNumber)!=11){
        $Note=array('error'=>true,'MSG'=>'شماره ثابت  اشتباه است.از کد استانی استفاده نمایید. ');
        echo json_encode($Note);
        return;
    }
    $CheckNationalCode=$A->Query("SELECT * FROM user WHERE NationalCode='$NationalCode'");
    if ($A->Numros($CheckNationalCode)!=0){
        $Note=array('error'=>true,'MSG'=>'این کد ملی قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $A->Query("UPDATE user SET Name='$Name' , LastName='$LastName' , NationalCode='$NationalCode' , InviterID='$InviterID' , FixedPhoneNumber='$FixedPhoneNumber' , Address='$Address' , DateOfMarriage='$DateOfMarriage' , Gender='$Gender' , DateOfBirth='$DateOfBirth' WHERE  PhoneNumber='$PhoneNumber' ");
    $Note=array('error'=>false,'MSG'=>"UPDATE user SET Name='$Name' , LastName='$LastName' , NationalCode='$NationalCode' , InviterID='$InviterID' , FixedPhoneNumber='$FixedPhoneNumber' , Address='$Address' , DateOfMarriage='$DateOfMarriage' , Gender='$Gender' , DateOfBirth='$DateOfBirth' WHERE  PhoneNumber='$PhoneNumber' ");
    echo json_encode($Note);
    return;
}
