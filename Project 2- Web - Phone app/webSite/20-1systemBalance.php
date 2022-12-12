<?php
include "varWebSite.php";
$A = new varWebSite();
     function getBalance($id)
     {
         $A = new varWebSite();
         $select = $A->Query("SELECT * FROM wallet WHERE userId='$id' AND status='1' AND Action='Withdrawal'");
         $wt = 0;
         while ($fetch = mysqli_fetch_assoc($select)) {
             $B = $fetch['amount'];
             $wt += $B;
         }
         $select2 = $A->Query("SELECT * FROM wallet WHERE userId='$id' AND status='1' AND Action='Deposit'");
         $do = 0;
         while ($fetch2 = mysqli_fetch_assoc($select2)) {
             $C = $fetch2['amount'];
             $do += $C;
         }
         $balance = $do-$wt;
         return $balance;
     }