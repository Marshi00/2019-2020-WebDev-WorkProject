<?php
include "Active3.php";
$A = new Active3();
if(
    $A->SetEmpty('name') &&
    $A->SetEmpty('Password') &&
    $A->SetEmpty('LastName') &&
    $A->SetEmpty('NationalCode') &&
    $A->SetEmpty('PhoneNumber') &&
    $A->SetEmpty('Email') &&
    $A->SetEmpty('branch') &&
    $A->SetEmpty('Level')
) {
    $Name = $A->RealString($_POST['name']);
    $branch = $A->RealString($_POST['branch']);
    $PhoneNumber = $A->RealString($_POST['PhoneNumber']);
    $PassWord = $A->RealString($_POST['Password']);
    $LastName = $A->RealString($_POST['LastName']);
    $NationalCode = $A->RealString($_POST['NationalCode']);
    $Level = $A->RealString($_POST['Level']);
    $Email = $A->RealString($_POST['Email']);
    if (!$A->validatePassword($PassWord)) {
        $Note = array('error' => true, 'MSG' => 'پسورد نا معتبر می باشد.پسورد باید بین 9 تا 20 کاراکتر و دارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        echo json_encode($Note);
        return;
    }
    if (strlen($PhoneNumber) != 11 || substr($PhoneNumber, 0, 1) != 0) {
        $Note = array('error' => true, 'MSG' => 'شماره وارد شده اشتباه است');
        return;
    }
    if (strlen($NationalCode) != 10) {
        $Note = array('error' => true, 'MSG' => 'کد ملی اشتباه است ');
        return;
    }
    if (!$A->EmailDominValidation($Email)) {
        $Note = array('error' => true, 'MSG' => 'ایمیل اشتباه است.');
        return;
    }
    $CheckNationalCode = $A->Query("SELECT * FROM admin WHERE ID(national code)='$NationalCode'");
    if ($A->Numros($CheckNationalCode) != 0) {
        $Note = array('error' => true, 'MSG' => 'این کد ملی قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckPhoneNumber = $A->Query("SELECT * FROM admin WHERE PhoneNumber='$PhoneNumber'");
    if ($A->Numros($CheckPhoneNumber) != 0) {
        $Note = array('error' => true, 'MSG' => 'این شماره قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $CheckEmail = $A->Query("SELECT * FROM admin WHERE Email='$Email'");
    if ($A->Numros($CheckEmail) != 0) {
        $Note = array('error' => true, 'MSG' => 'این Email قبلا ثبت شده است.');
        echo json_encode($Note);
        return;
    }
    $PassWord = $A->hash2($PassWord);
    $date = date('Y-m-d');
    $time = date("H:i:s");
    $status = '1';
$A->Query("INSERT INTO admin(`ID(national code)`, Name, LastName, Password, Email, PhoneNumber, Level, Date, Time, Status,Branch) VALUES ('$NationalCode','$Name','$LastName','$PassWord','$Email','$PhoneNumber','$Level','$date','$time','$status','$branch')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}
