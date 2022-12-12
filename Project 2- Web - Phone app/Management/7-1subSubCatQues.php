<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('subcategoryId') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('Question') &&
    $A->SetEmpty('typeQues') &&
    $A->SetEmpty('level')
) {
    $subcategoryId = $A->RealString($_POST['subcategoryId']);
    $user_id = $A->RealString($_POST['user_id']);
    $Question = $A->RealString($_POST['Question']);
    $level = $A->RealString($_POST['level']);
    $typeQues = $A->RealString($_POST['typeQues']);
    $CheckLevel = $A->Query("SELECT * FROM subcategoryquestions WHERE level='$level' AND subcategoryId='$subcategoryId'");
    if ($A->Numros($CheckLevel) != 0) {
        $A->MSG('این سطح قبلا ثبت شده است.');
        return;
    }
    $A->Query("INSERT INTO subcategoryquestions (subcategoryId, Question, level,type) VALUES ('$subcategoryId','$Question','$level','$typeQues')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING SubCatQuestion",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
    return;
//    }
}