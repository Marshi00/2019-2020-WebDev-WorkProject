<?php
include "varWebSite.php";
$A = new varWebSite();
if(
    $A->SetEmpty('userId') &&
    $A->SetEmpty('tag') &&
    $A->SetEmpty('latitude') &&
    $A->SetEmpty('longitude') &&
    $A->SetEmpty('Address')
) {
    $Address = $A->RealString($_POST['Address']);
    $user_id = $A->RealString($_POST['user_id']);
    $tag = $A->RealString($_POST['tag']);
    $latitude = $A->RealString($_POST['latitude']);
    $longitude = $A->RealString($_POST['longitude']);
    $A->Query("INSERT INTO adress (userId, Address, latitude, longitude, tag) VALUES ('$user_id','$Address','$latitude','$longitude','$tag')");
//    if ($A->Arows()==1){
    $A->log("INSERT","INSERTING Address",$user_id);
    $A->MSGT('ثبت با موفقیت انجام شد');
    return;
//    }
}
