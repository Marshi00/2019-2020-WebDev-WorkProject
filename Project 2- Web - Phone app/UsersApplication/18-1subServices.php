<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
if ($A->SetEmpty('subId')) {
    $subId = $A->RealString($_POST['subId']);
    $subcatServics=$A->Query("SELECT * FROM subcategoryservices WHERE subcategoryId='$subId' AND status='1'");
    while ($rowCat = mysqli_fetch_assoc($subcatServics)) {
        $result[] = array(
            'id' => $rowCat['id'],
            'text' => $rowCat['text'],
        );
    }
    $call= array("error"=>false,"login"=>true);
    $call["data"]=$result;
    echo json_encode($call);
}
