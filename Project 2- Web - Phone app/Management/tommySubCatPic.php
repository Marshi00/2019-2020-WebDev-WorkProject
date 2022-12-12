<?php
include "0-3loginCheckAdmin3.php";
if ($A->SetEmpty('catId')) {
    $catId=$A->RealString($_POST['catId']);
    $target=$A->Query("SELECT * FROM imgbase WHERE catId='$catId' AND status='1' AND brand='SUBCAT'");
    if ($A->Numros($target)!=0){
        while ($rowCat = mysqli_fetch_assoc($target)){
            $resulter[] = array(
                'name'=>$rowCat['img']
            );
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