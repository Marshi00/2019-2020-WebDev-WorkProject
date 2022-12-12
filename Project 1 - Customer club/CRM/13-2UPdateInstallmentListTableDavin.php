<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('PaymentStatus') &&
    $A->SetEmpty('PaymentAmount') &&
    $A->SetEmpty('PaymentDate') &&
    $A->SetEmpty('DueDate') &&
    $A->SetEmpty('ContractUserID')
){
    $NeWPaymentStatus=$A->RealString($_POST['PaymentStatus']);
    $NeWPaymentAmount=$A->RealString($_POST['PaymentAmount']);
    $NeWPaymentDate=$A->RealString($_POST['PaymentDate']);
    $NeWDueDate=$A->RealString($_POST['DueDate']);
    $NeWContractUserID=$A->RealString($_POST['ContractUserID']);
    if (strlen($NeWContractUserID)!=11){
        $Note=array('error'=>true,'MSG'=>'شناسه(شماره تلفن خریدار) اشتباه است ');
        return;
    }
    $A->Query("UPDATE installmentlist SET PaymentStatus='$NeWPaymentStatus' AND PaymentAmount='$NeWPaymentAmount' AND PaymentDate='$NeWPaymentDate' AND DueDate='$NeWDueDate' AND ContractUserID='$NeWContractUserID' WHERE ID='' AND ContractUserID=''");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}