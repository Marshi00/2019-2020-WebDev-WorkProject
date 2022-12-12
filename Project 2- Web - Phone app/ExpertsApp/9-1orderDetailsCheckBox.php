<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";
$result = array();
if ($A->SetEmpty("order_id")){
    $order_id = $A->RealString($_POST["order_id"]);
    $model='CHECKBOX';
    $valId='YES';
    $details=$A->Query("SELECT * FROM ordervalues WHERE ovOrderId='$order_id' AND ovModel='$model' AND ovQuesValId='$valId'");
    if ($A->Numros($details)!=0) {
        while ($rowCat = mysqli_fetch_assoc($details)) {
            $quesId=$rowCat['ovQuestionId'];
            $questval=$A->Query("SELECT * FROM subcategoryquestions WHERE id='$quesId'");
            $quesGet=$A->FetchAssoc($questval);

            $result[] = array(
                'id' => $rowCat['ovId'],
                'value' => $rowCat['ovModel'],
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
