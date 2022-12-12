<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('value') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('user_id')
) {
    $id = $A->RealString($_POST['id']);
    $user_id = $A->RealString($_POST['user_id']);
    $value = $A->RealString($_POST['value']);
    $A->Query("UPDATE subcategoryquestionsvalue SET value='$value' WHERE id='$id'");
//    if ($A->Arows()==1){
        $A->log("UPDATE","UPDATING subCatQuesVal".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
    return;
//    }
}