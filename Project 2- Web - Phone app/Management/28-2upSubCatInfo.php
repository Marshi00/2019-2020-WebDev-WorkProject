<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('id') &&
    $A->SetEmpty('title') &&
    $A->SetEmpty('text') &&
    $A->SetEmpty('text2') &&
    $A->SetEmpty('text3') &&
    $A->SetEmpty('status') &&
    $A->SetEmpty('user_id')
){
    $id = $A->RealString($_POST['id']);
    $user_id = $A->RealString($_POST['user_id']);
    $text = $A->RealString($_POST['text']);
    $text2 = $A->RealString($_POST['text2']);
    $text3 = $A->RealString($_POST['text3']);
    $title = $A->RealString($_POST['title']);
    $status = $A->RealString($_POST['status']);
    $A->Query("UPDATE subcategoryinformation SET text='$text',status='$status',text2='$text2',text3='$text3',title='$title' WHERE id='$id'");
    $A->log("UPDATING","UPDATING subcategoryInfo ".$id,$user_id);
    $A->MSGT('ویرایش با موفقیت انجام شد');
    return;

}