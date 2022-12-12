<?php
include "Active3.php";
    $A = new Active3();
    if (
        $A->SetEmpty('name') &&
        $A->SetEmpty('Password') &&
        $A->SetEmpty('LastName') &&
        $A->SetEmpty('PhoneNumber') &&
        $A->SetEmpty('Email') &&
        $A->SetEmpty('branch') &&
        $A->SetEmpty('Status') &&
        $A->SetEmpty('Level')
    ) {
        $NeWStatus = $A->RealString($_POST['Status']);
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
            $Note = array('error' => true, 'MSG' => 'شماره وارد شده استباه است');
            return;
        }
        if (!$A->EmailDominValidation($NeWEmail)) {
            $Note = array('error' => true, 'MSG' => 'ایمیل اشتباه است.');
            return;
        }
        $CheckNeWPhoneNumber = $A->Query("SELECT * FROM admin WHERE PhoneNumber='$NeWPhoneNumber'");
        $OldPhoneNumber=$A->Query("SELECT PhoneNumber FROM admin WHERE `ID(national code)`=''");
        if ($NeWPhoneNumber!=$OldPhoneNumber && $A->Numros($CheckNeWPhoneNumber) != 0 ){
            $Note = array('error' => true, 'MSG' => 'این شماره قبلا ثبت شده است.');
            echo json_encode($Note);
            return;
        }
        $CheckNeWEmail = $A->Query("SELECT * FROM admin WHERE Email='$NeWEmail'");
        $OldEmail=$A->Query("SELECT Email FROM admin WHERE `ID(national code)`=''");
        if ($NeWEmail!=$OldEmail && $A->Numros($CheckNeWEmail)!=0){
            $Note = array('error' => true, 'MSG' => 'این Email قبلا ثبت شده است.');
            echo json_encode($Note);
            return;
        }
        $NeWPassWord = $A->hash2($NeWPassWord);
        $A->Query("UPDATE admin SET Name='$NeWName' AND LastName='$NeWLastName' AND Password='$NeWPassWord' AND PhoneNumber='$NeWPhoneNumber' AND Email='$NeWEmail' AND Level='$NeWLevel' AND Branch='$NeWbranch' AND Status='$NeWStatus' WHERE `ID(national code)`='' ");
        $Note = array('error' => false, 'MSG' => 'ویرایش با موفقیت انجام شد');
        echo json_encode($Note);
        return;
//    }
}