<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('$userId')
) {
    $userId = $A->RealString($_POST['$userId']);
    $select=$A->Query("SELECT * FROM factor WHERE UserID='$userId'");
    while (mysqli_fetch_assoc($select)){
        $B=$select['EarnedCredit'];
        $C=$select['UsedCredit'];
    }
    $to=$B-$C;
}


function getPoint($id){
    include "Active3.php";
    $A=new Active3();
    $select=$A->Query("SELECT * FROM factor WHERE UserID='$id'");
    while (mysqli_fetch_assoc($select)){
        $B=$select['EarnedCredit'];
        $C=$select['UsedCredit'];
    }
    return $to=$B-$C;
}