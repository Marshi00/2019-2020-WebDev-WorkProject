<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('id') &&
    $A->SetEmpty('user_id')
) {
    $user_id = $A->RealString($_POST['user_id']);
    $id = $A->RealString($_POST['id']);
    $Status = '2';
    $A->Query("UPDATE comments SET Status=$Status where id='$id'");
//    if ($A->Arows()==1){
        $A->log("INSERT","Allowing Comment".$id,$user_id);
        $A->MSGT('نظر تایید شد');
        return;
//    }
}