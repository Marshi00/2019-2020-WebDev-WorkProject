<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
if ($A->SetEmpty('subId')) {
    $subId = $A->RealString($_POST['subId']);
    $subcatInfo=$A->Query("SELECT * FROM subcategoryinformation WHERE subcategoryId='$subId' AND status='1'");
    $rowCat=$A->FetchAssoc($subcatInfo);
    $result[] = array(
        'id' => $rowCat['id'],
        'title' => $rowCat['title'],
        'text' => $rowCat['text'],
        'text2' => $rowCat['text2'],
        'text3' => $rowCat['text3'],
    );
    $call= array("error"=>false,"login"=>true);
    $call["data"]=$result;
    echo json_encode($call);
}
