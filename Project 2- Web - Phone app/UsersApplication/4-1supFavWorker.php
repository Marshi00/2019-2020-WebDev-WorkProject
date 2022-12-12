<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
if(
    $A->SetEmpty('workerId')
) {
    $workerId = $A->RealString($_POST['workerId']);
    $status = '1';
    $A->Query("INSERT INTO favoriteworker (workerId, userId, status) values ('$workerId','$appUser','$status')");
//    if ($A->Arows()==1){
    $A->log("INSERT","INSERTING FavoriteWorker",$user_id);
    $A->MSGT('ثبت با موفقیت انجام شد');
    return;
//    }
}