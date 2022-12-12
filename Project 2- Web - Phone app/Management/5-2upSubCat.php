<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('categoryId') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('id') &&
    $A->SetEmpty('minCost') &&
    $A->SetEmpty('subCatImg') &&
    $A->SetEmpty('Commission') &&
    $A->SetEmpty('Status') &&
    $A->SetEmpty('subcategory')
) {
    $minCost = $A->RealString($_POST['minCost']);
    $categoryId = $A->RealString($_POST['categoryId']);
    $user_id = $A->RealString($_POST['user_id']);
    $subCatImg = $A->RealString($_POST['subCatImg']);
    $Commission = $A->RealString($_POST['Commission']);
    $Status = $A->RealString($_POST['Status']);
    $id = $A->RealString($_POST['id']);
    $subcategory = $A->RealString($_POST['subcategory']);
    $A->Query("UPDATE subcategory SET categoryId='$categoryId',subcategory='$subcategory',Status='$Status',Commission='$Commission',subCatImg='$subCatImg',minimumCost='$minCost' WHERE id='$id'");
//    if ($A->Arows()==1){
        $A->log("UPDATE","UPDATING Subcategory".$id,$user_id);
        $A->MSGT('ویرایش با موفقیت انجام شد');
    return;
//    }
}