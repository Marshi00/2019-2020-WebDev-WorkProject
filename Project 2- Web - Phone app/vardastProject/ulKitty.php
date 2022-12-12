<?php
include "varWebSite.php";
$A = new varWebSite();
if ($A->SetEmpty('kitty')) {
    $kitty=$A->RealString($_POST['kitty']);
    $target=$A->Query("SELECT * FROM subcategory WHERE categoryId='$kitty' AND Status='1'");
    if ($A->Numros($target)!=0){
        while ($rowCat = mysqli_fetch_assoc($target)){
            $result[] = array(
                'id'=>$rowCat['id'],
                'subCatImg'=>$rowCat['subCatImg'],
                'subcategory'=>$rowCat['subcategory'],
            );
        }
        $call= array("error"=>false);
        $call['subCat']=$result;
        echo json_encode($call);
    }
    else{
        $call= array("error"=>false);
        $call['subCat']='';
        echo json_encode($call);
    }
}