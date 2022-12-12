<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
$target = $A->Query("SELECT * FROM category WHERE Status='1'");
while ($rowCat = mysqli_fetch_assoc($target)) {
    $result[] = array(
        'category' => $rowCat['category'],
        'img' => $rowCat['img'],
        'id' => $rowCat['id'],
    );
}
$call= array("error"=>false,"login"=>true);
$call["data"]=$result;
echo json_encode($call);