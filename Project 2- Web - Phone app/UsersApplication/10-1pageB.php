<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
    $target=$A->Query("SELECT * FROM user WHERE id='$appUser'");
    $rowCat = mysqli_fetch_assoc($target);
    $result[] = array(
        'Name' => $rowCat['Name'],
        'LastName' => $rowCat['LastName'],
    );
    $call= array("error"=>false,"login"=>true);
    $call["data"]=$result;
    echo json_encode($call);
