<?php
include "0-3loginCheckAdmin3.php";
if ($A->SetEmpty('catId')) {
    $catId=$A->RealString($_POST['catId']);
    $target=$A->Query("SELECT *,subcategoryquestions.id as sid FROM subcategoryquestions,subcategory WHERE subcategoryId='$catId' AND subcategoryquestions.subcategoryId=subcategory.id");
    if ($A->Numros($target)!=0){
        $i=1;
        while ($rowCat = mysqli_fetch_assoc($target)){
            $resulter[] = array(
                'i'=>$i,
                'Question'=>$rowCat['Question'],
                'level'=>$rowCat['level'],
                'subcategory'=>$rowCat['subcategory'],
                'sid'=>$rowCat['sid'],
            );
            $i++;
        }
        $call= array("error"=>false);
        $call['subCat']=$resulter;
        echo json_encode($call);
    }
    else{
        $call= array("error"=>false);
        $call['subCat']='';
        echo json_encode($call);
    }
}