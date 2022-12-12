<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
    $target=$A->Query("SELECT * FROM user WHERE id='$appUser'");
    $rowCat = mysqli_fetch_assoc($target);
    $select = $A->Query("SELECT * FROM wallet WHERE userId='$appUser' AND status='1' AND Action='Withdrawal'");
    $wt = 0;
    while ($fetch = mysqli_fetch_assoc($select)) {
        $B = $fetch['amount'];
        $wt += $B;
    }
    $select2 = $A->Query("SELECT * FROM wallet WHERE userId='$appUser' AND status='1' AND Action='Deposit'");
    $do = 0;
    while ($fetch2 = mysqli_fetch_assoc($select2)) {
        $C = $fetch2['amount'];
        $do += $C;
    }
    $balance = $do-$wt;
    $result[] = array(
        'Name' => $rowCat['Name'],
        'LastName' => $rowCat['LastName'],
        'balance' => $balance,
    );
    $call= array("error"=>false,"login"=>true);
    $call["data"]=$result;
    echo json_encode($call);
