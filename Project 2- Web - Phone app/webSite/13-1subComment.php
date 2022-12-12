<?php
include "varWebSite.php";
$A = new varWebSite();
if(
    $A->SetEmpty('workerId') &&
    $A->SetEmpty('Comment') &&
    $A->SetEmpty('orderListId') &&
    $A->SetEmpty('user_id')
) {
    $workerId = $A->RealString($_POST['workerId']);
    $Comment = $A->RealString($_POST['Comment']);
    $Status ='0';
    $user_id = $A->RealString($_POST['user_id']);
    $orderListId = $A->RealString($_POST['orderListId']);
    $CheckOrderListId = $A->Query("SELECT * FROM comments WHERE orderListId='$orderListId'");
    if ($A->Numros($CheckOrderListId) != 0) {
        $A->MSG('نظر برای این شناسه سفارش قبلا ثبت شده است.');
        return;
    }
    $A->Query("INSERT INTO comments (workerId, Comment, Status, userId, orderListId) VALUES ('$workerId','$Comment','$Status','$user_id','$orderListId')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING Comment",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
        return;
//    }
}