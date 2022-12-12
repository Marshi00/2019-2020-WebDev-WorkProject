<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";
$result=array();
if(
    $A->SetEmpty('orderID')
) {
    $orderID = $A->RealString($_POST['orderID']);
    $select=$A->Query("SELECT * FROM ordervalues WHERE ovOrderId-'$orderID' AND ovModel='OPTION'");
    while ($fetch=mysqli_fetch_assoc($select)){
        $ovId=$fetch['ovId'];
        $select2=$A->Query("SELECT * FROM ordervalues,subcategoryquestionsvalue,subcategoryquestions WHERE ovId='$ovId' AND ordervalues.ovQuestionId=subcategoryquestions.id AND ordervalues.ovQuesValId=subcategoryquestionsvalue.id" );
        $row=mysqli_fetch_assoc($select2);
        $result[] = array(
            'Question' => $row['Question'],
            'value' => $row['value'],
        );
    }
    $call= array("error"=>false,"login"=>true);
    $call["data"]=$result;
    echo json_encode($call);
}