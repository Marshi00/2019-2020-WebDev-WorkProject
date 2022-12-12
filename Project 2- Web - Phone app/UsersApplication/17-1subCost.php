<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
if ($A->SetEmpty('subId')){
    $subId = $A->RealString($_POST['subId']);
    $subCatCosts=$A->Query("SELECT * FROM subcategorycosts WHERE subcategoryId='$subId' AND status='1'");
    while ($rowCat = mysqli_fetch_assoc($subCatCosts)) {
        $result[] = array(
            'id' => $rowCat['id'],
            'cost' => $rowCat['cost'],
            'description' => $rowCat['description'],
        );
    }
    $call= array("error"=>false,"login"=>true);
    $call["data"]=$result;
    echo json_encode($call);
}
