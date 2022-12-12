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
    $Name=$A->RealString($_POST['Name']);
    $Time=$A->RealString($_POST['Time']);
    $Date=$A->RealString($_POST['Date']);
    $MinPoints=$A->RealString($_POST['MinPoints']);
    $NumberOfWinners=$A->RealString($_POST['NumberOfWinners']);
    $Prize=$A->RealString($_POST['Prize']);
    $A->Query("INSERT INTO lottery (Name, Date, Time, MinPoints, NumberOfWinners, Prize) VALUES ('$Name','$Time','$Date','$MinPoints','$NumberOfWinners','$Prize')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}
