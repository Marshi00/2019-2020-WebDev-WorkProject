<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";
include "jdf.php";

$result = array();
$select_order = $A->Query("SELECT *,orderlist.id as order_id,user.id as userid,adress.id as addressid 
FROM orderlist,adress,user,subcategory 
WHERE orderlist.status=1 and orderlist.workerId=1 AND orderlist.addressId=adress.id AND orderlist.userId=user.id and orderlist.subcategoryId=subcategory.id");
if (
    $A->Numros($select_order) > 0) {
    while ($row = $A->FetchAssoc($select_order)) {
        $day_time_stamp=strtotime($row['neededTime']);
        $date_array=explode('-',$row['neededDate']);
        $date_timestamp=jmktime(12,'','',$date_array[1],$date_array[2],$date_array[0]);
        $day_time=jdate('g:i',$day_time_stamp);
        $day_time_time=jdate('A',$day_time_stamp);
        $day_name = jdate('l', $date_timestamp);
        $result[] = array(
            'name' => $row['Name'],
            'last_name' => $row['LastName'],
            'subcategory_name' => $row['subcategory'],
            'time' => $day_time,
            'time_time' => $day_time_time,
            'date' => $row['neededDate'],
            'day_name' => $day_name,
            'order_id' => $row['order_id'],
        );
    }

    $msg = array("error" => false, "login"=>true);
    $msg["result"] = $result;
    echo json_encode($msg);

} else {
    $msg = array("error" => true, "msg" => "خدمتی یافت نشد");
    echo json_encode($msg);
}

