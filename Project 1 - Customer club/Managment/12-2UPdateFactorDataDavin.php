<?php
include "Active3.php";
$A=new Active3();
if(
    $A->SetEmpty('ProductID') &&
    $A->SetEmpty('ID') &&
    $A->SetEmpty('NumbersProduct') &&
    $A->SetEmpty('Status')
){
    $NeWProductID=$A->RealString($_POST['ProductID']);
    $NeWStatus=$A->RealString($_POST['Status']);
    $NeWNumbersProduct=$A->RealString($_POST['NumbersProduct']);
    $factorData = $A->Query("SELECT * FROM product WHERE ProductID='$NeWProductID'");
    $rowFactors = mysqli_fetch_assoc($factorData);
    $FinalPrice=$rowFactors['Price']*$NeWNumbersProduct;
    $ID=$A->RealString($_POST['ID']);
    $A->Query("UPDATE factordata SET ProductID='$NeWProductID' , NumbersProduct='$NeWNumbersProduct' , FinalPrice='$FinalPrice' , Status='$NeWStatus' WHERE ID='$ID' ");
    $Note=array('error'=>false,'MSG'=>'ویرایش با موفقیت انجام شد');
    echo json_encode($Note);
    if ($NeWStatus==0){
        $datasel1=$A->Query("SELECT * FROM factordata WHERE ID='$ID'");
        $datasel2=$A->FetchAssoc($datasel1);
        $Factorid=$datasel2['FactorID'];
        $select=$A->Query("SELECT * FROM factor WHERE FactorID=$Factorid");
        $facsel=$A->FetchAssoc($select);
        $facPrice=$facsel['finalPrice'];
        $finalPrice=$facPrice-$FinalPrice;
        $pointValue=$A->Query("SELECT * FROM pointvalue");
        $value2=$A->FetchAssoc($pointValue);
        $value=$value2['Point'];
        $EarnedCredit=$finalPrice/$value;
        $A->Query("UPDATE factor SET EarnedCredit='$EarnedCredit',finalPrice='$finalPrice' where FactorID='$Factorid'");
    }
    else{
        return;
    }

}