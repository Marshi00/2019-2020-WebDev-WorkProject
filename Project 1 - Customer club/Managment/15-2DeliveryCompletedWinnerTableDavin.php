<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('DeliveryDate') &&
    $A->SetEmpty('ID') &&
    $A->SetEmpty('DeliveryTime')
) {
    $DeliveryDate = $A->RealString($_POST['DeliveryDate']);
    $DeliveryTime = $A->RealString($_POST['DeliveryTime']);
    $ID = $A->RealString($_POST['ID']);
    $Status = '1';
    $A->Query("UPDATE winnerstable SET DeliveryDate='$DeliveryDate',DeliveryTime='$DeliveryTime',Status='$Status' WHERE ID='$ID'");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}