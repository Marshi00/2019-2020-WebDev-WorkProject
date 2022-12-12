<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
if (
    $A->SetEmpty('Name') &&
    $A->SetEmpty('LastName') &&
    $A->SetEmpty('dateOfBirth')
) {
    $Name = $A->RealString($_POST['Name']);
    $LastName = $A->RealString($_POST['LastName']);
    $dateOfBirth = $A->RealString($_POST['dateOfBirth']);
    $A->Query("UPDATE user SET Name='$Name',LastName='$LastName',dateOfBirth='$dateOfBirth' WHERE id='$appUser'");
    $A->log("UPDATING","UPDATING user ".$appUser,$appUser);
    $A->MSGT('ویرایش با موفقیت انجام شد');
    return;
}