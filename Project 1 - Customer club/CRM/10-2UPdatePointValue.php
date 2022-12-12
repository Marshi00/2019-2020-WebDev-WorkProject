<?php
include "Active3.php";
$A=new Active3();
if(
$A->SetEmpty('Point')
){
    $NeWPoint=$A->RealString($_POST['Point']);
    $A->Query("UPDATE pointvalue SET Point='$NeWPoint'WHERE ID=''");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}