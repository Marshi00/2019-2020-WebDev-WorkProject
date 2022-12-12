<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('subcategoryQuestionsId') &&
    $A->SetEmpty('value') &&
    $A->SetEmpty('user_id')
) {
    $subcategoryQuestionsId = $A->RealString($_POST['subcategoryQuestionsId']);
    $user_id = $A->RealString($_POST['user_id']);
    $value = $A->RealString($_POST['value']);
    $A->Query("INSERT INTO subcategoryquestionsvalue (subcategoryQuestionsId, value) VALUES ('$subcategoryQuestionsId','$value')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING subCatQuesVal",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
    return;
//    }
}