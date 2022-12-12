<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
if(
    $A->SetEmpty('ovOrderId') &&
    $A->SetEmpty('ovQuestionId') &&
    $A->SetEmpty('ovQuesValId')
) {
    $ovOrderId = $A->RealString($_POST['ovOrderId']);
    $ovQuestionId = $A->RealString($_POST['ovQuestionId']);
    $ovQuesValId = $A->RealString($_POST['ovQuesValId']);
    if ($ovQuesValId=='1'){
        $value='YES';
    }
    elseif ($ovQuesValId=='0'){
        $value='NO';
    }
    $model='CHECKBOX';
    $A->Query("INSERT INTO ordervalues (ovOrderId, ovQuesValId, ovModel, ovQuestionId) VALUES ('$ovOrderId','$ovQuesValId','$model','$value')");
    $A->log("INSERT","INSERTING values ",$appUser);
    $A->MSGT('ثبت با موفقیت انجام شد');
    return;
}