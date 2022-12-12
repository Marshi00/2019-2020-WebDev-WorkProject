<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
    $target = $A->Query("SELECT * FROM adress WHERE userId='$appUser'");
    if ($A->Numros($target) != 0) {
        while ($rowCat = mysqli_fetch_assoc($target)) {
            $result[] = array(
                'tag' => $rowCat['tag'],
                'latitude' => $rowCat['latitude'],
                'longitude' => $rowCat['longitude'],
                'Address' => $rowCat['Address'],
                'id' => $rowCat['id'],
            );
        }
        $call= array("error"=>false,"login"=>true);
        $call["data"]=$result;
        echo json_encode($call);
        }