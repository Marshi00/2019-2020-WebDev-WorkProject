<?php
include "varWebSite.php";
$A = new varWebSite();
if (
    isset($_POST['vals']) &&
    $A->SetEmpty('orderId')
) {
    $orderId = $A->RealString($_POST['orderId']);
    $vals = $A->RealString($_POST['vals']);
    $vals = substr($vals,0,-1);
    $vals = explode("/",$vals);
    $model='CHECKBOX';
    $ovQuesValId='YES';
    for ($i=0;$i<count($vals);$i++){
        $QuestId=$vals[$i];
        $A->Query("DELETE * FROM ordervalues WHERE ovQuesValId='YES' AND ovOrderId='$orderId'");
        $A->Query("INSERT INTO ordervalues (ovOrderId, ovQuesValId, ovModel, ovQuestionId) VALUES ('$orderId','$ovQuesValId','$model','$QuestId')");
    }
    $call= array("error"=>false);
    echo json_encode($call);
}
