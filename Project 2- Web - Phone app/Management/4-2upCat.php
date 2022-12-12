<?php
include "varManagement.php";
$A = new varManagement();
if(
$A->SetEmpty('category') &&
$A->SetEmpty('user_id') &&
$A->SetEmpty('img') &&
$A->SetEmpty('Status') &&
$A->SetEmpty('id')
) {
    $category = $A->RealString($_POST['category']);
    $user_id = $A->RealString($_POST['user_id']);
    $img = $A->RealString($_POST['img']);
    $Status = $A->RealString($_POST['Status']);
    $id = $A->RealString($_POST['id']);
    $A->Query("UPDATE category SET category='$category',img='$img',Status='$Status' WHERE id='$id'");
//    if ($A->Arows()==1){
        $A->log("UPDATE","UPDATEING Category ".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}