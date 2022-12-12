<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('Name') &&
    $A->SetEmpty('Time') &&
    $A->SetEmpty('Date') &&
    $A->SetEmpty('MinPoints') &&
    $A->SetEmpty('NumberOfWinners') &&
    $A->SetEmpty('Prize')
){
    $NeWName=$A->RealString($_POST['Name']);
    $NeWTime=$A->RealString($_POST['Time']);
    $NeWDate=$A->RealString($_POST['Date']);
    $NeWMinPoints=$A->RealString($_POST['MinPoints']);
    $NeWNumberOfWinners=$A->RealString($_POST['NumberOfWinners']);
    $NeWPrize=$A->RealString($_POST['Prize']);
    $A->Query("UPDATE lottery SET Name='$NeWName' AND Time='$NeWTime' AND Date='$NeWDate' AND MinPoints='$NeWMinPoints' AND NumberOfWinners='$NeWNumberOfWinners'AND Prize='$NeWPrize' WHERE ID='' AND Name=''");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}