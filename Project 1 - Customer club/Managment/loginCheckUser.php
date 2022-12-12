<?php
include "Active3.php";
$A=new Active3();
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']==true ){
//    $_SESSION['login']=true;
}
else{
    header('location:login.php');

}