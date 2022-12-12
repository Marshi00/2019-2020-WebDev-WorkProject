<?php
include "varManagement.php";
$A = new varManagement();;
if(
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('userId') &&
    $A->SetEmpty('Address')
) {
    $Address = $A->RealString($_POST['Address']);
    $id = $A->RealString($_POST['id']);
    $userId = $A->RealString($_POST['userId']);
    $user_id = $A->RealString($_POST['user_id']);
    $A->Query("UPDATE adress SET Address='$Address',userId='$userId' where id='$id'");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING Address",$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
        return;
//    }
}
