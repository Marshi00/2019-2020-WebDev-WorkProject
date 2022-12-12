<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$Result=array();
if(
    $A->SetEmpty('subcategoryId')
) {
    $subcategoryId = $A->RealString($_POST['subcategoryId']);
    $target = $A->Query("SELECT * FROM subcategoryquestions WHERE subcategoryId='$subcategoryId' AND type='0'");
    $i=0;
    while ($rowCat = mysqli_fetch_assoc($target)) {
        $QuesID=$rowCat['id'];
        $Question=$rowCat['Question'];
        $level=$rowCat['level'];
        $Result[] = array("id"=>$QuesID,"Question"=>$Question,"level"=>$level);
        $target2=$A->Query("SELECT * FROM subcategoryquestionsvalue WHERE subcategoryQuestionsId='$QuesID' ");
        while ($rowCat2 = mysqli_fetch_assoc($target2)){
            $Result[$i]["values"][] = array(
                'valueId' => $rowCat2['id'],
                'value' => $rowCat2['value'],
            );
        }
        $i++;
    }
}
$call= array("error"=>false,"login"=>true);
$call["data"]=$Result;
echo json_encode($call);