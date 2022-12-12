<?php
include "Active3.php";
$A = new Active3();
if(
    $A->SetEmpty('phoneNumber')
) {
    $phoneNumber = $A->RealString($_POST['phoneNumber']);
    function sendSms($code, $number)
    {

        $client = new
        SoapClient("http://37.130.202.188/class/sms/wsdlservice/server.php?wsdl");
        $user = "amlak300";
        $pass = "amir5621";
        $fromNum = "+985000958";
        $toNum = array($number);
        $pattern_code = "128";
        $input_data = array(
            "name" => " پیراتیل ",
            "verification-code" => $code,
        );
        $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
}