<?php
include "Active3.php";
$A = new Active3();
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']==true && isset($_SESSION['Status']) && $_SESSION['Status']=='1' && isset($_SESSION['Level']) && $_SESSION['Level']=='1'){
//    $_SESSION['login']=true;
}else{
    header('location:login.php');
}