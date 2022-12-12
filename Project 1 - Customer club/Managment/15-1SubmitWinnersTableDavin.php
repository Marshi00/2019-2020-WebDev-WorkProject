<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('WinnerID') &&
    $A->SetEmpty('LotteryID')
){
    $WinnerID=$A->RealString($_POST['WinnerID']);
    $LotteryID=$A->RealString($_POST['LotteryID']);
    if (strlen($WinnerID)!=11 ){
        $Note=array('error'=>true,'MSG'=>'شناسه برنده(شماره تلفن) اشتباه است ');
        return;
    }
    $status='0';
    $A->Query("INSERT INTO winnerstable (LotteryId,WinnerId,Status) VALUES ('$LotteryID','$WinnerID','$status')");
    $Note=array('error'=>false,'MSG'=>' ثبت  با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}