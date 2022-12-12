<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('ID')
){
    $ID=$A->RealString($_POST['ID']);
    $Select=$A->Query("SELECT * FROM events WHERE ID='$ID'");
    $Select2=$A->FetchAssoc($Select);
    $Multiplier=$Select2['Multiplier'];
    $A->Query("UPDATE events SET Status='0'");
    $A->Query("UPDATE product SET Multiplier='1'");
    $A->Query("UPDATE events SET Status='1' WHERE ID='$ID'");
    $A->Query("UPDATE product SET Multiplier='$Multiplier'");
    $Note=array('error'=>false,'MSG'=>'جشواره شروع شد،ضریب تمامی محصولات تغیر گردید');
    echo json_encode($Note);
    return;
}