<?php
include "loginCheckAdmin.php";
if ($A->SetEmpty('catId')) {
    $result=$A->RealString($_POST['catId']);
            $catId = $result;
    function getPoint($catId)
    {
        $A = new Active3();
        $to = 0;
        $select = $A->Query("SELECT * FROM factor WHERE UserID='$catId'");
        while ($fetch = mysqli_fetch_assoc($select)) {
            $B = $fetch['EarnedCredit'];
            $C = $fetch['UsedCredit'];
            $to += $B - $C;
        }
        return $to;
    }
    function getOtherPoints($catId)
    {
        $A = new Active3();
        $op=0;
        $select2=$A->Query("SELECT * FROM otherpoints WHERE UserID='$catId'");
        while ($fetch2 = mysqli_fetch_assoc($select2)) {
            $E=$fetch2['Points'];
            $op += $E ;
        }
        return $op;
    }
    $allowedPoints=getPoint($catId)+getOtherPoints($catId);
                    $resulter[] = array(
                        'id'=>$catId,
                        'name'=>$allowedPoints
                    );


                $call= array("error"=>false,"MSG"=>$allowedPoints);
                echo json_encode($call);

        }
