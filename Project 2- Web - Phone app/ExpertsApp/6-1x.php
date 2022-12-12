<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";
$result=array();
$Name_Worker = $A->Query("SELECT * FROM workers,subcategory WHERE workers.id='$appExp' AND workers.subCategoryId=subcategory.id");
$points=$A->Query("SELECT * FROM points WHERE workerId='$appExp'");
$rows = $A->FetchAssoc($Name_Worker);
$num_rows=0;
$num_rows = $A->Numros($points);
$j=0;
while ($rows_point = $A->FetchAssoc($points)) {
    $num = $rows_point['points'];
    $j += $num;
}
$avg=0;
$avg=$j/$num_rows;
$result[] = array(
    'name' =>$rows['name'] ,
    'lastName' => $rows['lastName'],
    'subcategory' => $rows['subcategory'],
    'avg' => $avg,
    'pointsNum'=>$num_rows,
);
$call= array("error"=>false,"login"=>true);
$call["data"]=$result;
echo json_encode($call);

