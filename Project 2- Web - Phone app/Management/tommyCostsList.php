<?php
include "0-3loginCheckAdmin3.php";
if ($A->SetEmpty('catId')) {
    $catId=$A->RealString($_POST['catId']);
    $target=$A->Query("SELECT * FROM subcategorycosts WHERE subcategoryId='$catId' ");
    if ($A->Numros($target)!=0){
        $i=1;
        while ($rowCat = mysqli_fetch_assoc($target)){
            $resulter[] = array(
                'i'=>$i,
                'status'=>$rowCat['status'],
                'cost'=>$rowCat['cost'],
                'description'=>$rowCat['description'],
                'id'=>$rowCat['id'],
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