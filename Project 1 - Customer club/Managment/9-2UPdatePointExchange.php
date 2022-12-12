<?php
include "Active3.php";
$A=new Active3();
if(
$A->SetEmpty('Value')
){
    $NeWValue=$A->RealString($_POST['Value']);
    $A->Query("UPDATE pointexchange SET Value='$NeWValue' WHERE ID=''");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}