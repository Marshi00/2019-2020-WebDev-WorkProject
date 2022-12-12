<?php
include "varManagement.php";
$A = new varManagement();
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']==true && isset($_SESSION['Status']) && $_SESSION['Status']=='1' && isset($_SESSION['Level']) && $_SESSION['Level']<='4'){
//    $_SESSION['login']=true;
}else{
    header('location:index1.php');
}