<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('subcategoryId') &&
    $A->SetEmpty('title') &&
    $A->SetEmpty('text') &&
    $A->SetEmpty('text2') &&
    $A->SetEmpty('text3') &&
    $A->SetEmpty('user_id')
){
    $subcategoryId = $A->RealString($_POST['subcategoryId']);
    $user_id = $A->RealString($_POST['user_id']);
    $text = $A->RealString($_POST['text']);
    $text2 = $A->RealString($_POST['text2']);
    $text3 = $A->RealString($_POST['text3']);
    $title = $A->RealString($_POST['title']);
    $status = '1';
    $A->Query("INSERT INTO subcategoryinformation (text2, text, subcategoryId, status, text3, title) VALUES ('$text2','$text','$subcategoryId','$status','$text3','$title')");
    $A->log("INSERT","INSERTING subcategoryInfo",$user_id);
    $A->MSGT('ثبت با موفقیت انجام شد');
    return;

}