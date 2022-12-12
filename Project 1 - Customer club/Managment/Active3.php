<?php

class Active3
{
    private $username = 'root';
    private $password = '';
    private $database = 'davin';

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
//<html>
//<title></title>
//<head>
//<script>
//    function validate(){
//
//        var a = document.getElementById("password").value;
//        var b = document.getElementById("confirm_password").value;
//        if (a!=b) {
//            alert("Passwords do no match");
//            return false;
//        }
//    }
//</script>
//</head>
//<body>
//<form onSubmit="return validate();" ">
//        Password: <input type="text" id="password" name="password" /><br/>
//        Re-enter Password: <input type="text" id="confirm_password" name="confirm_password" />
//        <input type="submit" value="submit"/>
//        </form>
//    </body>
// </html>
//$CheckUserName=$A->Query("SELECT * FROM user WHERE UserName='$UserName' LIMIT 5");
//while ($rowCheckUserName=mysqli_fetch_assoc($CheckUserName)){
//echo '
//        <tr>
//            <td>'.$rowCheckUserName['name'].'</td>
//            <td></td>
//            <td></td>
//            <td></td>
//        </tr>';
//}


}
