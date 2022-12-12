<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
if(
$A->SetEmpty('subcategoryId')
) {
    $subcategoryId = $A->RealString($_POST['subcategoryId']);
    $target = $A->Query("SELECT * FROM subcategoryquestions WHERE subcategoryId='$subcategoryId' AND type='1'");
    while ($rowCat = mysqli_fetch_assoc($target)) {
        $Result[] = array(
        $QuesID = $rowCat['id'],
        $Question = $rowCat['Question'],
        $level = $rowCat['level'],
    );
    }
}
$call= array("error"=>false,"login"=>true);
$call["data"]=$Result;
echo json_encode($call);