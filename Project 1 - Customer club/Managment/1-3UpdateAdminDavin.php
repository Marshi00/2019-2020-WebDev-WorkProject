<?php
include "Active3.php";
    $A = new Active3();
    if (
        $A->SetEmpty('name') &&
        $A->SetEmpty('Password') &&
        $A->SetEmpty('LastName') &&
        $A->SetEmpty('PhoneNumber') &&
        $A->SetEmpty('Email') &&
        $A->SetEmpty('NationalCode') &&
        $A->SetEmpty('branch') &&
        $A->SetEmpty('Status') &&
        $A->SetEmpty('Level')
    ) {
        $NeWStatus = $A->RealString($_POST['Status']);
        $NationalCode = $A->RealString($_POST['NationalCode']);
        $NeWName = $A->RealString($_POST['name']);
        $NeWbranch = $A->RealString($_POST['branch']);
        $NeWPhoneNumber = $A->RealString($_POST['PhoneNumber']);
        $NeWPassWord = $A->RealString($_POST['Password']);
        $NeWLastName = $A->RealString($_POST['LastName']);
        $NeWLevel = $A->RealString($_POST['Level']);
        $NeWEmail = $A->RealString($_POST['Email']);
        if (!$A->validatePassword($NeWPassWord)) {
            $Note = array('error' => true, 'MSG' => 'پسورد نا معتبر می باشد.پسورد باید بین 9 تا 20 کاراکتر و دارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
            echo json_encode($Note);
            return;
        }
        if (strlen($NeWPhoneNumber) != 11 || substr($NeWPhoneNumber, 0, 1) != 0) {
            $Note = array('error' => true, 'MSG' => 'شماره وارد شده اشتباه است');
            echo json_encode($Note);
            return;
        }
        if (!$A->EmailDominValidation($NeWEmail)) {
            $Note = array('error' => true, 'MSG' => 'ایمیل اشتباه است.');
            echo json_encode($Note);
            return;
        }
        $CheckNeWPhoneNumber = $A->Query("SELECT * FROM admin WHERE PhoneNumber='$NeWPhoneNumber'");
        $OldPhoneNumber2=$A->Query("SELECT * FROM admin WHERE `ID(national code)`='$NationalCode'");
        $OldPhoneNumber1=$A->FetchAssoc($OldPhoneNumber2);
        $OldPhoneNumber=$OldPhoneNumber1['PhoneNumber'];
        if ($NeWPhoneNumber!=$OldPhoneNumber && $A->Numros($CheckNeWPhoneNumber) != 0 ){
            $Note = array('error' => true, 'MSG' => 'این شماره قبلا ثبت شده است.');
            echo json_encode($Note);
            return;
        }
        $CheckNeWEmail = $A->Query("SELECT * FROM admin WHERE Email='$NeWEmail'");
        $OldEmail2=$A->Query("SELECT * FROM admin WHERE `ID(national code)`='$NationalCode'");
        $OldEmail1=$A->FetchAssoc($OldEmail2);
        $OldEmail=$OldEmail1['PhoneNumber'];
        if ($NeWEmail!=$OldEmail && $A->Numros($CheckNeWEmail)!=0){
            $Note = array('error' => true, 'MSG' => 'این Email قبلا ثبت شده است.');
            echo json_encode($Note);
            return;
        }
        $NeWPassWord = $A->hash2($NeWPassWord);
        $A->Query("UPDATE admin SET Name='$NeWName' , LastName='$NeWLastName' , Password='$NeWPassWord' , PhoneNumber='$NeWPhoneNumber' , Email='$NeWEmail' , Level='$NeWLevel' , Branch='$NeWbranch' , Status='$NeWStatus' WHERE `ID(national code)`='$NationalCode' ");
        $Note = array('error' => false, 'MSG' => 'ویرایش با موفقیت انجام شد');
        echo json_encode($Note);
        return;
//    }
}