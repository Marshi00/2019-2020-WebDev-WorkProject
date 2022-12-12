<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('img') &&
    $A->SetEmpty('category')
) {
    $category = $A->RealString($_POST['category']);
    $img = $A->RealString($_POST['img']);
    $user_id = $A->RealString($_POST['user_id']);
    $Status='1';
    $A->Query("INSERT INTO category (category, img, Status) VALUES ('$category','$img','$Status')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING Category",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
        return;
//    }
}