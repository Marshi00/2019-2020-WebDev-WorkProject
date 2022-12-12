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
    $PaymentStatus=$A->RealString($_POST['PaymentStatus']);
    $PaymentAmount=$A->RealString($_POST['PaymentAmount']);
    $PaymentDate=$A->RealString($_POST['PaymentDate']);
    $DueDate=$A->RealString($_POST['DueDate']);
    $ContractUserID=$A->RealString($_POST['ContractUserID']);
    if (strlen($ContractUserID)!=11){
        $Note=array('error'=>true,'MSG'=>'شناسه(شماره تلفن مشتری) اشتباه است ');
        return;
    }
    $A->Query("INSERT INTO installmentlist (PaymentStatus, PaymentAmount, PaymentDate, DueDate, ContractUserID) VALUES ('$PaymentStatus','$PaymentAmount','$PaymentDate','$DueDate','$ContractUserID')");
    $Note=array('error'=>false,'MSG'=>'ثبت با موفقیت انجام شد');
    echo json_encode($Note);
    return;
}
