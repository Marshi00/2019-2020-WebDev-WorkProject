<?php
include "varWebSite.php";
$A = new varWebSite();
if(
    $A->SetEmpty('id')

) {
    $id = $A->RealString($_POST['id']);;
    $status='0';
    $A->Query("UPDATE favoriteworker SET status='$status' WHERE id='$id'");
//    if ($A->Arows()==1){
    $A->log("INSERT","UPDATING FavoriteWorker ".$id,'customer');
    $A->MSGT('ویرایش با موفقیت انجام شد');
    return;
//    }
}