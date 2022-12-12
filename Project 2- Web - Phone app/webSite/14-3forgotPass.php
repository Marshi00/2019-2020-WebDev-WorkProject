<?php
include "varWebSite.php";
$A = new varWebSite();
if(
    $A->SetEmpty('PhoneNumber')
) {
    $PhoneNumber = $A->RealString($_POST['PhoneNumber']);
    $select=$A->Query("SELECT * FROM user where PhoneNumber='$PhoneNumber'");
    if ($A->Numros($PhoneNumber)!=1){
        $A->MSG("این شماره ثبت نشده است");
        return;
    }
else{
//    SMS panel

}

}