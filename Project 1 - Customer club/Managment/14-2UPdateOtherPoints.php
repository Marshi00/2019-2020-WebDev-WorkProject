<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('UserID') &&
    $A->SetEmpty('Points') &&
    $A->SetEmpty('AdminID') &&
    $A->SetEmpty('Reason')
) {
    $NeWUserID = $A->RealString($_POST['UserID']);
    $NeWPoints = $A->RealString($_POST['Points']);
    $NeWAdminID = $A->RealString($_POST['AdminID']);
    $NeWReason = $A->RealString($_POST['Reason']);
    if (strlen($NeWUserID) != 11) {
        $Note = array('error' => true, 'MSG' => 'شناسه(شماره تلفن خریدار) اشتباه است ');
        return;
    }
    if (strlen($NeWAdminID) != 10) {
        $Note = array('error' => true, 'MSG' => 'شناسه(شماره تلفن خریدار) اشتباه است ');
        return;
    }
    $A->Query("UPDATE otherpoints SET UserID='$NeWUserID' AND Points='$NeWPoints' AND AdminID='$NeWAdminID' AND Reason='$NeWReason' WHERE ID='' AND UserID=''");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}