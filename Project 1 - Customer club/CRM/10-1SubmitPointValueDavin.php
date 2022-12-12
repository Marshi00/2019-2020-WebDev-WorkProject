<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('Point')
){
    $Point=$A->RealString($_POST['Point']);
    $A->Query("INSERT INTO pointvalue (Point) VALUES ('$Point')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}