<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$id=$A->generate_id();
$Result=array();
$result[] = array(
    'id' => $id,
);
$call= array("error"=>false,"login"=>true);
$call["data"]=$result;
echo json_encode($call);