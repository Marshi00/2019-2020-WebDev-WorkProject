<?php
include "varManagement.php";
$A = new varManagement();
if(
    $A->SetEmpty('categoryId') &&
    $A->SetEmpty('minCost') &&
    $A->SetEmpty('user_id') &&
    $A->SetEmpty('subCatImg') &&
    $A->SetEmpty('Commission') &&
    $A->SetEmpty('subcategory')
) {
    $categoryId = $A->RealString($_POST['categoryId']);
    $minCost = $A->RealString($_POST['minCost']);
    $subCatImg = $A->RealString($_POST['subCatImg']);
    $Commission = $A->RealString($_POST['Commission']);
    $user_id = $A->RealString($_POST['user_id']);
    $subcategory = $A->RealString($_POST['subcategory']);
    $Status='1';
    $A->Query("INSERT INTO subcategory (categoryId, subcategory, subCatImg, Commission, Status,minimumCost) VALUES ('$categoryId','$subcategory','$subCatImg','$Commission','$Status','$minCost')");
//    if ($A->Arows()==1){
        $A->log("INSERT","INSERTING Subcategory",$user_id);
        $A->MSGT('ثبت با موفقیت انجام شد');
    return;
//    }
}