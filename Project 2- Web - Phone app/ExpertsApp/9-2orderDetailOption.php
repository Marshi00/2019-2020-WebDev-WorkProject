<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";
$result = array();
if ($A->SetEmpty("order_id")){
    $order_id = $A->RealString($_POST["order_id"]);
    $model='OPTION';
    $details=$A->Query("SELECT * FROM ordervalues WHERE ovOrderId='$order_id' AND ovModel='$model'");
    if ($A->Numros($details)!=0) {
        while ($rowCat = mysqli_fetch_assoc($details)) {
            $quesId=$rowCat['ovQuestionId'];
            $valID=$rowCat['ovQuesValId'];
            $questval=$A->Query("SELECT * FROM subcategoryquestions WHERE id='$quesId'");
            $quesGet=$A->FetchAssoc($questval);
            $valueVal=$A->Query("SELECT * FROM subcategoryquestionsvalue WHERE id='$valID'");
            $valGet=$A->FetchAssoc($valueVal);
            $result[] = array(
                'id' => $rowCat['ovId'],
                'value' => $valGet['value'],
                'Question' => $quesGet['Question'],
            );
        }
        $call= array("error"=>false,"login"=>true);
        $call["data"]=$result;
        echo json_encode($call);
    }
    else{
        $call= array("error"=>false,"login"=>true,"MSG"=>' موجود نمی باشد.');
        echo json_encode($call);
    }
}
