<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
$result=array();
if(
$A->SetEmpty('orderID')
) {
    $orderID = $A->RealString($_POST['orderID']);
    $target = $A->Query("SELECT *,orderlist.id AS OID,adress.Address AS AA FROM orderlist,subcategory,workers,adress WHERE orderlist.id='$orderID' AND orderlist.subcategoryId=subcategory.id AND orderlist.workerId=workers.id AND orderlist.status='1' AND orderlist.addressId=adress.id");
    $rowCat = mysqli_fetch_assoc($target);
    $result[] = array(
        'orderId' => $rowCat['OID'],
        'submitDate' => $rowCat['submitDate'],
        'submitTime' => $rowCat['submitTime'],
        'neededDate' => $rowCat['neededDate'],
        'neededTime' => $rowCat['neededTime'],
        'address' => $rowCat['AA'],
        'details' => $rowCat['details'],
        'subcategory' => $rowCat['subcategory'],
        'name' => $rowCat['name'],
        'lastName' => $rowCat['lastName'],
    );
    $call= array("error"=>false,"login"=>true);
    $call["data"]=$result;
    echo json_encode($call);
}