<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
if(
    $A->SetEmpty('id')
) {
    $id = $A->RealString($_POST['id']);
    $status = '0';
    $A->Query("UPDATE favoriteworker SET status='$status' WHERE id='$id'");
//    if ($A->Arows()==1){
    $A->log("INSERT","UPDATING FavoriteWorker ".$id,$appUser);
    $A->MSGT('ویرایش با موفقیت انجام شد');
    return;
//    }
}