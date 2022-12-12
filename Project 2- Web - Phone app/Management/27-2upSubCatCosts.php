<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('id') &&
    $A->SetEmpty('description') &&
    $A->SetEmpty('cost') &&
    $A->SetEmpty('statusSet') &&
    $A->SetEmpty('user_id')
){
    $id = $A->RealString($_POST['id']);
    $user_id = $A->RealString($_POST['user_id']);
    $cost = $A->RealString($_POST['cost']);
    $description = $A->RealString($_POST['description']);
    $status = $A->RealString($_POST['statusSet']);
    $A->Query("UPDATE subcategorycosts SET description='$description',status='$status',cost='$cost' WHERE id='$id'");
    $A->log("UPDATING","UPDATING subcategoryCosts ".$id,$user_id);
    $A->MSGT('ویرایش با موفقیت انجام شد');
    return;

}