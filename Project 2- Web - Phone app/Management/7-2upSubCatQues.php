<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('Question') &&
    $A->SetEmpty('level')
) {
    $id = $A->RealString($_POST['id']);
    $user_id = $A->RealString($_POST['user_id']);
    $Question = $A->RealString($_POST['Question']);
    $level = $A->RealString($_POST['level']);
    $Old2=$A->Query("SELECT * FROM subcategoryquestions WHERE id='$id'");
    $Old1=$A->FetchAssoc($Old2);
    $Old=$Old1['level'];
    $Old0=$Old1['subcategoryId'];
    $CheckNew = $A->Query("SELECT * FROM subcategoryquestions WHERE level='$level' AND subcategoryId='$Old0'");
    if ($level!=$Old && $A->Numros($CheckNew) != 0 ){
        $A->MSG('این سطح قبلا ثبت شده است.');
        return;
    }
    $A->Query("UPDATE subcategoryquestions SET Question='$Question',level='$level' WHERE id='$id' ");
//    if ($A->Arows()==1){
        $A->log("UPDATE","UPDATING SubCatQuestion".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
    return;
//    }
}