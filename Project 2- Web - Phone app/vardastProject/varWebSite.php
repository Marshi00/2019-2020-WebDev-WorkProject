<?php

class varWebSite
{
    private $username = 'root';
    private $password = '';
    private $database = 'vardast';

    public function __construct()
    {
        date_default_timezone_set("Asia/tehran");
    }

    function Connect()
    {
        $Connection = mysqli_connect('localhost',
            $this->username,
            $this->password,
            $this->database);
        mysqli_set_charset($Connection, "UTF8");
        return $Connection;
    }

    function RealString($value)
    {
        return mysqli_real_escape_string($this->Connect(), $value);
    }

    function Query($Query)
    {
        return mysqli_query($this->Connect(), $Query);
    }

    function Gid()
    {
        $id = date("ymdhis");
        $id .= rand(100000, 999999);
        return $id;
    }
    function generate_id()
    {
//        try-catch for error
        $now = new DateTime();
        ini_alter('date.timezone', 'Asia/Tehran');
        $now = $now->format('YmdHis');
        $microtime = microtime();
        $id = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime);
        $id = substr($id, 11, 1);
        $random = (rand(10000, 99999));
        $va_id = $now . $id . $random;
        return $va_id;
    }

    function Numros($value)
    {
        return mysqli_num_rows($value);
    }

    function hash1($value)
    {
        $A = hash('SHA256', $value);
        $A = hash('SHA512', $A);
        $A = hash('SHA256', $A);
        $A = hash('SHA512', $A);
        $A = hash('SHA512', $A);
        return $A;
    }

    function validatePassword($Value)
    {
        return ctype_alnum($Value)
            && strlen($Value) >= 8
            && strlen($Value) <= 20
            && preg_match('/[A-Z]/', $Value)
            && preg_match('/[a-z]/', $Value)
            && preg_match('/[0-9]/', $Value);
    }

    function SetEmpty($Value)
    {

        if (
            isset($_POST[$Value]) &&
            $_POST[$Value] != '') {
            return true;
        } else {
            return false;
        }
    }

    function EmailDominValidation($Value)
    {
        return filter_var($Value, FILTER_VALIDATE_EMAIL);
    }

    function hash2($value)
    {
        $A = hash('SHA512', $value);
        $A = hash('SHA512', $A);
        $A = hash('SHA256', $A);
        $A = hash('SHA256', $A);
        $A = hash('SHA512', $A);
        return $A;
    }

    function FetchAssoc($Value)
    {
        return mysqli_fetch_assoc($Value);
    }
    function Arows()
    {
        return mysqli_affected_rows($this->Connect());
    }
    function log ($action,$description,$user_id){
        function generate_id()
        {
            $now = new DateTime();
            ini_alter('date.timezone', 'Asia/Tehran');
            $now = $now->format('YmdHis');
            $microtime = microtime();
            $id = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime);
            $id = substr($id, 11, 1);
            $random = (rand(10000, 99999));
            $va_id = $now . $id . $random;
            return $va_id;
        }

        function getUserIpAddr(){

            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                //ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                //ip pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }


        function _date()
        {
            ini_alter('date.timezone', 'Asia/Tehran');
            $now = new DateTime();
            $va_date = $now->format('Y-m-d');
            return $va_date;
        }


        function _time()
        {
            ini_alter('date.timezone', 'Asia/Tehran');
            $now = new DateTime();
            $va_time = $now->format('H:i:s');
            return $va_time;
        }

        $idLog = generate_id();
//        $action="insert";
//        $description ="User Replyed  Ticket";
        $date = _date();
        $time = _time();
        $ipUser = getUserIpAddr();
        $logUser = $this->Query("insert into users_log(id, id_user, action, description,ip, date, time)
     values ('$idLog','$user_id','$action','$description','$ipUser','$date','$time')");
    }
    function MSG($Value){
        $Note = array('error' => true, 'MSG' =>$Value);
        echo json_encode($Note);
        return;
    }
    function MSGT($Value){
        $Note = array('error' => false, 'MSG' =>$Value);
        echo json_encode($Note);
        return;
    }
    public Static function randomString($length=20){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function saveImageBase64($base64img,$url,$name){
        $base64img = str_replace('data:image/jpeg;base64,', '', $base64img);
        $data = base64_decode($base64img);
        $file = $url .$name.'.jpg';
        file_put_contents($file, $data);
    }
    public static function generateRandomString($length = 20){ //FUNCTION FOR generate RAND VAR
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[rand(0,$max-1)];
        }
        return $token;
    }
    public static function sendSms($code,$number){

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
        $client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$input_data);
    }
    function G2J($date){
        include_once "jdf.php";
        $exp = explode("-",$date);
        return gregorian_to_jalali($exp[0],$exp[1],$exp[2],"-");
    }
    function J2G($date){
        include_once "jdf.php";
        $exp = explode("-",$date);
        return jalali_to_gregorian($exp[0],$exp[1],$exp[2],"-");
    }



}
