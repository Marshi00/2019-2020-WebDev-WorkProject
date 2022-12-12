<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
$target=$A->Query("SELECT * FROM user WHERE id='$appUser'");
$rowCat=$A->FetchAssoc($target);
$result[] = array(
    'PhoneNumber' => $rowCat['PhoneNumber'],
);
$call= array("error"=>false,"login"=>true);
$call["data"]=$result;
echo json_encode($call);