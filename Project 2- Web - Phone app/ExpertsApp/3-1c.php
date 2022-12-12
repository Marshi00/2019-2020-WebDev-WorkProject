<?php
include "varExpertsApp.php";
$A = new varExpertsApp();
include "Exptoken.php";
include "jdf.php";

$result = array();
$sel_Worker = $A->Query("SELECT * FROM workers WHERE id='$appExp' AND status='1'");
if ($A->Numros($sel_Worker) == 1) {
    $row = $A->FetchAssoc($sel_Worker);
    $subcatid = $row['subCategoryId'];
    $sel_order = $A->Query("SELECT * FROM orderlist WHERE subCategoryId='$subcatid' and status='1' ");
    if ($A->Numros($sel_order) > 0) {
        while ($rowCat = $A->FetchAssoc($sel_order)) {
            $order_id = $rowCat['id'];
            $order_search = $A->Query("SELECT *,orderlist.id as order_id,user.id as user_id,adress.id as address_id FROM orderlist,adress,user,subcategory WHERE orderlist.id='$order_id' AND orderlist.addressId=adress.id AND orderlist.userId=user.id and orderlist.subcategoryId=subcategory.id");
            while ($order_row = $A->FetchAssoc($order_search)) {
                $day_time_stamp=strtotime($order_row['neededTime']);
                $date_array=explode('-',$order_row['neededDate']);
                $date_timestamp=jmktime(12,'','',$date_array[1],$date_array[2],$date_array[0]);
                $day_time=jdate('g:i',$day_time_stamp);
                $day_time_time=jdate('A',$day_time_stamp);
                $day_name = jdate('l', $date_timestamp);
                $result[] = array(
                    'name' => $order_row['Name'],
                    'last_name' => $order_row['LastName'],
                    'time' => $day_time,
                    'time_time' => $day_time_time,
                    'date' => $order_row['neededDate'],
                    'day_name' => $day_name,
                    'address' => $order_row['Address'],
                    'latitude' => $order_row['latitude'],
                    'longitude' => $order_row['longitude'],
                    'details' => $order_row['details'],
                    'subcategory' => $order_row['subcategory'],
                    'order_id' => $order_row['order_id'],
                );
            }
            $msg = array("error" => false,"login"=>true);
            $msg['data']=$result;
            echo json_encode($msg);
        }
    }else {
        $msg = array("error" => false, "msg" => "در حال حاضر خدمتی موجود نمی باشد");
        echo json_encode($msg);
    }
} else {
    $msg = array("error" => true, "msg" => "این متخصص در سیستم ثبت نشده است.");
    echo json_encode($msg);
}

