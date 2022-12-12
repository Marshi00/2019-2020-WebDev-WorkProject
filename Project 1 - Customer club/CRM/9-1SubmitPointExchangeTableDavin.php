<?php
include "Active3.php";
$A=new Active3();
if(
$A->SetEmpty('Value')
){
    $Value=$A->RealString($_POST['Value']);
    $A->Query("INSERT INTO pointexchange (Value) VALUES ('$Value')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}