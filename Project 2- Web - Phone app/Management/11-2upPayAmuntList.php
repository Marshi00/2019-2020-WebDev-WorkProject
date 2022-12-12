<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('id') &&
    isset($_POST['cash']) &&
    $A->SetEmpty('user_id') &&
    isset($_POST['operatingCosts']) &&
    isset($_POST['webPayment'])
) {
    $id = $A->RealString($_POST['id']);
    $user_id = $A->RealString($_POST['user_id']);
    $cash = $A->RealString($_POST['cash']);
    $operatingCosts = $A->RealString($_POST['operatingCosts']);
    $webPayment = $A->RealString($_POST['webPayment']);
    $realPrice=$webPayment+$cash;
    $finalPrice = $cash+$operatingCosts+$webPayment;
    $get1=$A->Query("SELECT * FROM paymentamountlist WHERE id='$id'");
    $get2=$A->FetchAssoc($get1);
    $odId=$get2['orderListId'];
    $Commission5=$A->Query("SELECT * FROM orderlist,subcategory WHERE orderlist.id='$odId' AND orderlist.subcategoryId=subcategory.id");
    $Commission4=$A->FetchAssoc($Commission5);
    $Commission3=$Commission4['Commission'];
    $Commission2 = $realprice*$Commission3;
    $Commission=$Commission2/100;
    $A->Query("UPDATE paymentamountlist SET cash='$cash',operatingCosts='$operatingCosts',finalPrice='$finalPrice',webPayment='$webPayment',Commission='$Commission' WHERE id='$id'");
//    if ($A->Arows()==1){
        $A->log("UPDATE","UPDATING Payment".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
    return;
//    }
}