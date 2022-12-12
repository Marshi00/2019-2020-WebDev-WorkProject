<?php
include "varUsersApplication.php";
$A = new varUsersApplication();
include "1-4token.php";
if(
    $A->SetEmpty('tag') &&
    $A->SetEmpty('latitude') &&
    $A->SetEmpty('longitude') &&
    $A->SetEmpty('Address')
) {
    $Address = $A->RealString($_POST['Address']);
    $tag = $A->RealString($_POST['tag']);
    $latitude = $A->RealString($_POST['latitude']);
    $longitude = $A->RealString($_POST['longitude']);
    $A->Query("INSERT INTO adress (userId, Address, latitude, longitude, tag) VALUES ('$appUser','$Address','$latitude','$longitude','$tag')");
//    if ($A->Arows()==1){
    $A->log("INSERT","INSERTING Address",$user_id);
    $A->MSGT('ثبت با موفقیت انجام شد');
    return;
//    }
}
