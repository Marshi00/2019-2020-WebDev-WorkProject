<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('subcategoryId') &&
    $A->SetEmpty('serviseSubCat') &&
    $A->SetEmpty('user_id')
){
    $subcategoryId = $A->RealString($_POST['subcategoryId']);
    $user_id = $A->RealString($_POST['user_id']);
    $serviseSubCat = $A->RealString($_POST['serviseSubCat']);
    $status = '1';
    $A->Query("INSERT INTO subcategoryservices (text, status, subcategoryId) VALUES ('$serviseSubCat','$status','$subcategoryId')");
    $A->log("INSERT","INSERTING subcategoryservices",$user_id);
    $A->MSGT('ثبت با موفقیت انجام شد');
    return;

}