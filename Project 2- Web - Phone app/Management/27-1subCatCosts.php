<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('subcategoryId') &&
    $A->SetEmpty('description') &&
    $A->SetEmpty('cost') &&
    $A->SetEmpty('user_id')
){
    $subcategoryId = $A->RealString($_POST['subcategoryId']);
    $user_id = $A->RealString($_POST['user_id']);
    $cost = $A->RealString($_POST['cost']);
    $description = $A->RealString($_POST['description']);
    $status = '1';
    $A->Query("INSERT INTO subcategorycosts (cost, description, subcategoryId, status) VALUES ('$cost','$description','$subcategoryId','$status')");
    $A->log("INSERT","INSERTING subcategoryCosts",$user_id);
    $A->MSGT('ثبت با موفقیت انجام شد');
    return;

}