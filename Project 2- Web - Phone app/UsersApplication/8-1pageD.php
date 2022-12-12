<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$catResult=array();
$target = $A->Query("SELECT * FROM category WHERE Status='1'");
$i=0;
while ($rowCat = mysqli_fetch_assoc($target)) {
    $catID=$rowCat['id'];
    $catName=$rowCat['category'];
        $catResult[] = array("id"=>$catID,"name"=>$catName);
    $target2=$A->Query("SELECT * FROM subcategory WHERE categoryId='$catID' AND Status='1'");
    while ($rowCat2 = mysqli_fetch_assoc($target2)){
        $catResult[$i]["subCat"][] = array(
            'subcategory' => $rowCat2['subcategory'],
            'subCatImg' => $rowCat2['subCatImg'],
            'subCatId' => $rowCat2['id'],
        );
    }
    $i++;
}
$call= array("error"=>false,"login"=>true);
$call["data"]=$catResult;
echo json_encode($call);