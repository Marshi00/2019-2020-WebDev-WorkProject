<?php
if (
    $A->SetEmpty('phoneNumber') &&
    $A->SetEmpty('password')
) {
    $phoneNumber = $A->RealString($_POST['phoneNumber']);
    $password = $A->RealString($_POST['password']);
    if (!$A->validatePassword($password)) {
        $A->MSG('پسورد نا معتبر می باشد.پسورد باید بین 9 تا 20 کاراکتر و دارای حداقل یک حرف بزرگ،یک حرف کوچک و یک شماره باشد.');
        return;
    }
    $password = $A->hash2($password);
    $A->Query("UPDATE user SET Password='$password' WHERE PhoneNumber='$phoneNumber'");
    $A->log("INSERT","Res Pass user",$phoneNumber);
    $A->MSGT('ویرایش با موفقیت انجام شد');
    return;
}