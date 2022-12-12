<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('UserID') &&
    $A->SetEmpty('Points') &&
    $A->SetEmpty('AdminID') &&
    $A->SetEmpty('Reason')
){
    $UserID=$A->RealString($_POST['UserID']);
    $Points=$A->RealString($_POST['Points']);
    $AdminID=$A->RealString($_POST['AdminID']);
    $Reason=$A->RealString($_POST['Reason']);
    if (strlen($UserID)!=11){
        $Note=array('error'=>true,'MSG'=>'شناسه(شماره تلفن خریدار) اشتباه است ');
        return;
    }
    if (strlen($AdminID)!=10){
        $Note=array('error'=>true,'MSG'=>'شناسه(شماره تلفن خریدار) اشتباه است ');
        return;
    }
    $date = date('Y-m-d');
    $time = date("H:i:s");
    $A->Query("INSERT INTO otherpoints ( UserID, Points, AdminID, Date, Time, Reason) VALUES ('$UserID','$Points','$AdminID','$date','$time','$Reason')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}