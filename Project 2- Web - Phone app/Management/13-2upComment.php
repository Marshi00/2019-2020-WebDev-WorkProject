<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('workerId') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('Comment') &&
    $A->SetEmpty('orderListId') &&
    $A->SetEmpty('Status') &&
    $A->SetEmpty('userId') &&
    $A->SetEmpty('user_id')
) {
    $workerId = $A->RealString($_POST['workerId']);
    $id = $A->RealString($_POST['id']);
    $Comment = $A->RealString($_POST['Comment']);
    $userId = $A->RealString($_POST['userId']);
    $Status = $A->RealString($_POST['Status']);
    $user_id = $A->RealString($_POST['user_id']);
    $orderListId = $A->RealString($_POST['orderListId']);
    $CheckNew = $A->Query("SELECT * FROM comments WHERE orderListId='$orderListId'");
    $Old2=$A->Query("SELECT * FROM comments WHERE id='$id'");
    $Old1=$A->FetchAssoc($Old2);
    $Old=$Old1['orderListId'];
    if ($orderListId!=$Old && $A->Numros($CheckNew) != 0 ){
        $A->MSG('نظر برای این شناسه سفارش قبلا ثبت شده است.');
        return;
    }
    $A->Query("UPDATE comments SET workerId='$workerId',Comment='$Comment',orderListId='$orderListId',Status='$Status',userId='$userId' WHERE id='$id'");
//    if ($A->Arows()==1){
        $A->log("UPDATING","UPDATING Comment ".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}