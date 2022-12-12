<?php
include "varManagement.php";
$A = new varManagement();
    function getPointAvg($id)
    {
        $A = new varManagement();
        $select = $A->Query("SELECT * FROM points WHERE workerId='$id'");
        $num = $A->Numros($select);
        $to = 0;
        while ($fetch = mysqli_fetch_assoc($select)) {
            $B = $fetch['points'];
            $to += $B;
        }
        $Avg = $num / $to;
        return $Avg;
    }