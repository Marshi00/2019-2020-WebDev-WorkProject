<?php

include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";
include "jdf.php";

$result = array();
//برای این پیح order_status باید چند باشد؟؟
$sel_Worker = $A->Query("SELECT *,orderlist.id as order_id,subcategory.id as subCatid,user.id as userid,adress.id as addressid 
FROM orderlist,adress,user,subcategory 
WHERE orderlist.status=3 and orderlist.workerId='$appExp' AND orderlist.addressId=adress.id 
AND orderlist.userId=user.id and orderlist.subcategoryId=subcategory.id");

if ($A->Numros($sel_Worker) > 0) {
    while ($rowCat = $A->FetchAssoc($sel_Worker)) {
        $day_time_stamp=strtotime($rowCat['neededTime']);
        $date_array=explode('-',$rowCat['neededDate']);
        $date_timestamp=jmktime(12,'','',$date_array[1],$date_array[2],$date_array[0]);
        $day_time=jdate('g:i',$day_time_stamp);
        $day_time_time=jdate('A',$day_time_stamp);
        $day_name = jdate('l', $date_timestamp);
        $result[] = array(
            'name' => $rowCat['Name'],
            'lastName' => $rowCat['LastName'],
            'sub_cat_name' => $rowCat['subcategory'],
            'Address' => $rowCat['Address'],
            'time' => $day_time,
            'time_time' => $day_time_time,
            'date' => $rowCat['neededDate'],
            'day_name' => $day_name,
            'latitude' => $rowCat['latitude'],
            'longitude' => $rowCat['longitude'],
            'order_id' => $rowCat['order_id'],
        );
    }
    $select_num = sizeof($result);
//    $i = 0;
//    while ($i < $select_num) {
//        $day_date = $result[$i]['neededDate'];
//        $timestamp = strtotime($day_date);
//        $day_name=jdate('l', $timestamp);
//        $result[$i]['day_name']=$day_name;
//$i++;
//    }
    $msg = array("error" => false, "login"=>true, "تعداد خدمت ها" => $select_num);
    $msg ["data"] = $result;
    echo json_encode($msg);
} else {
    $msg = array("error" => false, "msg" => "خدمتی یافت نشد");
    echo json_encode($msg);
}
