<?php
include "varWebSite.php";
$A = new varWebSite();
if(
    $A->SetEmpty('workerId') &&
    $A->SetEmpty('user_id')
) {
    $user_id = $A->RealString($_POST['user_id']);
    $workerId = $A->RealString($_POST['workerId']);
    $status = '1';
    $A->Query("INSERT INTO favoriteworker (workerId, userId, status) values ('$workerId','$user_id','$status')");
//    if ($A->Arows()==1){
    $A->log("INSERT","INSERTING FavoriteWorker",$user_id);
    $A->MSGT('ثبت با موفقیت انجام شد');
    return;
//    }
}