<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";
include "jdf.php";
$total_cost = $A->Query("SELECT * FROM paymentamountlist WHERE workerId='$appExp' AND paStatus='2'");
    $Commission= 0;
    $final_price = 0;
    $earn=0;
    while ($row = $A->FetchAssoc($total_cost)) {
        $final_price += $row['finalPrice'];
        $Commission+=$row['Commission'];
    }
$earn=$final_price-$Commission;
$order_num=0;
$order_num=$A->Numros($total_cost);
$done_order_list = $A->Query("SELECT *,orderlist.id as order_id,user.id as user_id,adress.id as address_id ,paymentamountlist.id as pay_id FROM orderlist,adress,user,subcategory,paymentamountlist WHERE orderlist.workerId='$appExp' and orderlist.status='2' AND orderlist.addressId=adress.id AND orderlist.userId=user.id and orderlist.subcategoryId=subcategory.id and orderlist.id=paymentamountlist.orderListId AND paymentamountlist.paStatus='2'");
$result = array();
if ($A->Numros($done_order_list) > 0) {
    while ($row = $A->FetchAssoc($done_order_list)) {
        $day_time_stamp = strtotime($row['neededTime']);
        $date_array=explode('-',$row['neededDate']);
        $date_timestamp=jmktime(12,'','',$date_array[1],$date_array[2],$date_array[0]);
        $day_time = jdate('g:i', $day_time_stamp);
        $day_time_time = jdate('A', $day_time_stamp);
        $day_name = jdate('l', $date_timestamp);
        $day_time_stamp_starting = strtotime($row['workStartTime']);
        $day_time_stamp_ending = strtotime($row['workFinishTime']);
        $day_time_start = jdate('g:i', $day_time_stamp_starting);
        $day_time_ending = jdate('g:i', $day_time_stamp_ending);

        $result[] = array(
            'order_id' => $row['order_id'],
            'user_Name' => $row['Name'],
            'user_LastName' => $row['LastName'],
            'user_Address' => $row['Address'],
            'suc_cat_name' => $row['subcategory'],
            'needed_time' => $day_time,
            'needed_time_time' => $day_time_time,
            'needed_date' => $row['neededDate'],
            'needed_date_day_name' => $day_name,
            'price' => $row['finalPrice'],
            'start_time' => $day_time_start,
            'end_time' => $day_time_ending,
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],

        );
    }
    $msg = array("error" => false, "login"=>true);
    $msg["result"] = $result;
    $msg["total_income"] = $earn;
    $msg["number_of_done_orders"] = $order_num;
    echo json_encode($msg);
} else {
    $msg = array("error" => false, "msg" => "خدمتی انجام نشده است");
    echo json_encode($msg);
}

