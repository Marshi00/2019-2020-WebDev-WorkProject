<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('ID')
){
    $ID=$A->RealString($_POST['ID']);
    $A->Query("UPDATE events SET Status='0'");
    $A->Query("UPDATE events SET Status='0' WHERE ID='$ID'");
    $A->Query("UPDATE product SET Multiplier='1'");
    $Note=array('error'=>false,'MSG'=>'جشواره پایان یافت،ضریب تمامی محصولات تغیر گردید');
    echo json_encode($Note);
    return;
}