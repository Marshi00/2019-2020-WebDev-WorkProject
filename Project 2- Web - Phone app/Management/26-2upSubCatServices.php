<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('id') &&
    $A->SetEmpty('service') &&
    $A->SetEmpty('Status') &&
    $A->SetEmpty('user_id')
){
    $id = $A->RealString($_POST['id']);
    $user_id = $A->RealString($_POST['user_id']);
    $service = $A->RealString($_POST['service']);
    $Status = $A->RealString($_POST['Status']);
    $A->Query("UPDATE subcategoryservices SET text='$service',status='$Status' WHERE id='$id'");
    $A->log("UPDATING","UPDATING subcategoryservices ".$id,$user_id);
    $A->MSGT('ویرایش با موفقیت انجام شد');
    return;

}