<?php
include "varWebSite.php";
$A = new varWebSite();
if(
    $A->SetEmpty('id')
) {
    $id = $A->RealString($_POST['id']);
    $Status = '0';
    $A->Query("UPDATE wallet SET status='$Status' WHERE id='$id'");
    //    if ($A->Arows()==1){
    $A->log("INSERT","UPDATING Wallet ".$id,'SYSTEM');
    $A->MSGT('یرایش با موفقیت انجام شد');
    return;
//    }

}