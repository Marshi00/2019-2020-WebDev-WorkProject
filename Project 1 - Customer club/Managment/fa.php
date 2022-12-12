<?php
include "Active3.php";
$A = new Active3();

if (isset($_POST['id']) && $_POST['id'] != '') {
    $arr = array();
    $TO =0;
    $userId = $_POST['id'];
    $factorData = $A->Query("SELECT * FROM factordata,product WHERE FactorID='$userId' AND product.ProductID=factordata.ProductID");

    while ($fetch = mysqli_fetch_assoc($factorData)) {
        $arr[] = array(
            'id'=>$fetch['ID'],
            'factorId' => $fetch['FactorID'],
            'productID' => $fetch['ProductID'],
            'numbersProduct' => $fetch['NumbersProduct'],
            'price'=>$fetch['NumbersProduct'] * $fetch['Price']

        );

//        $TO = $fetch['NumbersProduct'] * $fetch['Price'];
    }
    $call['price'] = $TO;
    $call['result'] = $arr;
    echo json_encode($call);
}