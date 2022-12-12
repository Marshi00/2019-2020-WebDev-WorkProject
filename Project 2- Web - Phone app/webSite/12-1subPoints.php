<?php
include "varWebSite.php";
$A = new varWebSite();

if(
    $A->SetEmpty('workerId') &&
    $A->SetEmpty('points') &&
    $A->SetEmpty('orderListId') &&
    $A->SetEmpty('user_id')
) {
    $workerId = $A->RealString($_POST['workerId']);
    $points = $A->RealString($_POST['points']);
    $orderListId = $A->RealString($_POST['orderListId']);
    $user_id = $A->RealString($_POST['user_id']);
    $CheckOrderListId = $A->Query("SELECT * FROM points WHERE orderListId='$orderListId'");
    if ($A->Numros($CheckOrderListId) != 0) {
        $A->MSG('این شناسه سفارش قبلا ثبت شده است.');
        return;
    }
    $A->Query("INSERT INTO points (workerId, userId, points, orderListId) VALUES ('$workerId','$user_id','$points','$orderListId')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING Points ",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
        return;
//    }
}