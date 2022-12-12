<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('workerId') &&
    $A->SetEmpty('userId') &&
    $A->SetEmpty('points') &&
    $A->SetEmpty('orderListId') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('user_id')
) {
    $workerId = $A->RealString($_POST['workerId']);
    $userId = $A->RealString($_POST['userId']);
    $points = $A->RealString($_POST['points']);
    $orderListId = $A->RealString($_POST['orderListId']);
    $id = $A->RealString($_POST['id']);
    $user_id = $A->RealString($_POST['user_id']);
    $CheckNew = $A->Query("SELECT * FROM points WHERE orderListId='$orderListId'");
    $Old2=$A->Query("SELECT * FROM points WHERE id='$id'");
    $Old1=$A->FetchAssoc($Old2);
    $Old=$Old1['orderListId'];
    if ($orderListId!=$Old && $A->Numros($CheckNew) != 0 ){
        $A->MSG('این شناسه سفارش قبلا ثبت شده است.');
        return;
    }
    $A->Query("UPDATE points SET workerId='$workerId',userId='$userId',points='$points',orderListId='$orderListId' WHERE id='$id'");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING Points ".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}