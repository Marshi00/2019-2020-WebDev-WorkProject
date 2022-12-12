<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";
$result=array();
$select = $A->Query("SELECT * FROM workerspayment WHERE workerId='$appExp' AND status='1' ");
$wp = 0;
while ($fetch = mysqli_fetch_assoc($select)) {
    $B = $fetch['paymentAmount'];
    $wp += $B;
}
$select2 = $A->Query("SELECT * FROM commissionpayment WHERE workerId='$appExp' AND status='1' ");
$cp = 0;
while ($fetch2 = mysqli_fetch_assoc($select2)) {
    $C = $fetch2['amount'];
    $cp += $C;
}
$select3 = $A->Query("SELECT * FROM paymentamountlist WHERE workerId='$appExp' AND paStatus='2' ");
$cc = 0;
$ww = 0;
while ($fetch3 = mysqli_fetch_assoc($select3)) {
    $D = $fetch3['Commission'];
    $E = $fetch3['webPayment'];
    $cc += $D;
    $ww += $E;
}
$Creditor=$ww-$wp;
$Debtor=$cc-$cp;
$result[] = array(
    'Creditor' =>$Creditor ,
    'Debtor' => $Debtor,
);
$call= array("error"=>false,"login"=>true);
$call["data"]=$result;
echo json_encode($call);