<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
    $target=$A->Query("SELECT *,workers.id AS WID FROM favoriteworker,workers WHERE favoriteworker.userId='$appUser' AND workers.id=favoriteworker.workerId AND favoriteworker.status='1'");
    if ($A->Numros($target)!=0) {
        while ($rowCat = mysqli_fetch_assoc($target)) {
            $workerID=$rowCat['WID'];
            $target2=$A->Query("SELECT * FROM workers,subcategory WHERE workers.id='$workerID' AND workers.subCategoryId=subcategory.id");
            $rowCat2=$A->FetchAssoc($target2);
            $select3 = $A->Query("SELECT * FROM points WHERE workerId='$workerID'");
            $num = 0;
            $num = $A->Numros($select3);
            $to = 0;
            while ($fetch = mysqli_fetch_assoc($select3)) {
                $B = $fetch['points'];
                $to += $B;
            }
            $Avg = $num / $to;
            $result[] = array(
                'name' => $rowCat['name'],
                'lastName' => $rowCat['lastName'],
                'workerId' => $rowCat['WID'],
                'subCatImg' => $rowCat2['subCatImg'],
                'subcategory' => $rowCat2['subcategory'],
                'Avg' => $Avg,
            );
        }
        $call= array("error"=>false,"login"=>true);
        $call["data"]=$result;
        echo json_encode($call);
    }