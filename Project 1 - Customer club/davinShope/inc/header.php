<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>صحفه اول ایندکس</title>
    <!--    Metta tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descripton" content="مهیا بهترین فروشگاه اینترنتی جهان:)">
    <meta name="keywords" content=",مهیا,فروشگاه:)">
    <meta name="language" content="fa-IR">
    <meta name="googlebot" content="noarchive">
    <!----- css links ---->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/mystyle2.css">
    <link rel="stylesheet" href="css/Active5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcun icon" href="img/logo.png" type="image/png">
    <link href="css/swiper.min.css" rel="stylesheet">
    <link href="css/CSSfnts.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="css/Active4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mestyle.css">

    <link rel="stylesheet" href="css/css.css">

</head>
<body>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="    margin: 0;
    padding: 0;overflow: hidden">
    <noscript><p>لطفا در تنظیمات مرورگر خود جاواسکریپت را روشن کنید</p></noscript>
    <!--header-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left: 0;padding-right: 0"><!--ردیف اول-->
        <hr id="line25">
        <div class="col-lg-1 col-md-1 visible-lg visible-md"></div>
        <div class="col-lg-3 col-md-3 visible-lg visible-md" id="line27"><!--شماره و دکمه--><!--lg & md-->
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" id="line28"><!--شماره-->
                <p>061-3345</p>
            </div><!--شماره ها-->
            <div class="col-lg-7 col-md-7 col-sm-8 col-xs-8" id="line31"><!--دکمه ها-->
                <a href="ShoppingBoX.php"><img src="img/bag@2x.png" class="imgline32"></a>
                <a href="favoraite.html"> <img src="img/heart@2x.png" class="imgline32"></a>
                <li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
            </div><!--دکمه ها-->
        </div><!--شماره و دکمه--><!--lg & md-->
        <div class="col-md-3 col-lg-3 visible-lg visible-md" id="line37">
            <!--خوش آمدید-->
            <?php
        include "admin/class/dataBase.php";
        $db = new dataBase();
        session_start();
        if (isset($_SESSION['userId']) && $_SESSION['userId'] != '') {
            $shbUserId = $_SESSION['userId'];
        } else if (isset($_SESSION['GustId']) && $_SESSION['GustId'] != '') {
            $shbUserId = $_SESSION['GustId'];
        } else {
            $shbUserId = "";
        }
        $SELECT = $db::Query("SELECT * FROM 
              productshb,shoppingbasket,product where SHBid = PSHBSHBId 
                                                  AND productId=productshb.PSHBPrId AND
                                                   shoppingbasket.SHBPay='0' AND (SHBUserId='$shbUserId' OR SHBGuest='$shbUserId')",$db::$NUM_ROW);


        if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {
            $username = $_SESSION['userId'];
            $select = $db::Query("SELECT * FROM user WHERE userId='$username'");
            $row = mysqli_fetch_assoc($select);


            echo '<a href="EditProfile.html">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="line38">
                    <p id="line39">'.$row['userName'].' ، خوش آمدید</p>
                </div>
                </a>'?>
                <?php }else{

                echo '<a href="Login.php">
                <div class="col-lg-6 col-md-6 hidden-sm hidden-xs" ID="line41">
                    <img src="img/logo.png" id="line42">
                </div>
            </a>';
            ?>
            <?php } ?>
        </div><!--خوش آمدید--><!--lg & md-->
        <div class="col-lg-4 col-md-4 visible-lg visible-md"><!--استایل-->
            <a href="index.php">
                <div id="line46">
                    <img src="img/logo.png" ID="line47">
                    <h4 id="line48">داوین استایل</h4>
                </div>
            </a>
        </div><!--استایل--><!--lg & md-->

        <div class="col-xs-6 col-sm-6 visible-xs visible-sm pull-right" id="line52"><!--استایل--><!--xs & sm-->
            <a href="index.php">
                <div id="line53">
                    <img src="img/logo.png" id="line54">
                    <h4 id="line55">داوین استایل</h4>
                </div>
            </a>
        </div><!--استایل--><!--xs & sm-->
        <div class="col-xs-6 col-sm-6 visible-xs visible-sm"><!--خوش آمدید--><!--xs & sm-->
            <a href="EditProfile.html">
                <div class="col-sm-12 col-xs-12">
                    <p id="line60">محمد لشکری ، خوش آمدید</p>
                </div>
            </a>
        </div><!--خوش آمدید--><!--xs & sm-->
        <div class="col-xs-12 col-sm-12 visible-xs visible-sm" id="line63"><!--شماره و دکمه--><!--xs & sm-->
            <div class="visible-xs visible-sm col-sm-12 col-xs-12" id="line64"><!--دکمه ها-->
                <a href="SearchBox.html">
                    <button class="buttonline55"><img src="img/bag@2x.png" class="imgline65"></button></a>
                <button class="buttonline55" id="line66">
                    <a href="favoraite.html"><img src="img/heart@2x.png" class="imgline65"></a>
                </button>
                <button class="buttonline55">
                    <li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
                </button>
            </div><!--دکمه ها-->
            <div class="visible-xs visible-sm col-sm-12 col-xs-12" id="line69"><!--شماره-->
                <p>061-3345</p>
            </div><!--شماره ها-->
        </div><!--شماره و دکمه--><!--xs & sm-->
        <div class="col-lg-1 col-md-1 visible-lg visible-md"></div>
    </div><!--ردیف اول-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="line75"></div><!--خط خاکستری-->
    <!--Navbar-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <header class="cd-main-header">

            <ul class="cd-header-buttons">
                <li><a class="cd-nav-trigger" href="#cd-primary-nav"><span></span></a></li>
            </ul> <!-- cd-header-buttons -->
        </header>

        <main class="cd-main-content">
            <!-- your content here -->

        </main>

        <nav class="cd-nav">
            <ul id="cd-primary-nav" class="cd-primary-nav is-fixed">


                <?php

                $cat = $db::Query("SELECT * FROM category");
                while ($fetch = mysqli_fetch_assoc($cat)){
                    $id =$fetch['catId'];
                    $name = $fetch['catName'];
                    ?>
                    <li class="has-children">

                        <a style="text-decoration: none" href="#"><?php echo $fetch['catName']?></a>

                        <ul class="cd-secondary-nav is-hidden">

                            <li class="has-children">

                                <a href="index.php"></a>

                                <ul class="is-hidden">
                                    <?php
                                    $sub = $db::Query("SELECT * FROM subcategory WHERE subCatId='$id' ORDER BY date(subRegDate) DESC,time                                       (subRegTime) LIMIT 10 OFFSET 0");
                                    while ($fetch = mysqli_fetch_assoc($sub)) {


                                        ?>
                                        <li><a href="search.php?subId=<?php echo $fetch['subId']?>"><?php echo $fetch['subName'] ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>

                            <li class="has-children">

                                <a href="index.php"></a>

                                <ul class="is-hidden">
                                    <?php
                                    $sub = $db::Query("SELECT * FROM subcategory WHERE subCatId='$id' ORDER BY date(subRegDate) DESC,time                                       (subRegTime) LIMIT 10 OFFSET 11");
                                    while ($fetch = mysqli_fetch_assoc($sub)) {


                                        ?>
                                        <li><a href="search.php?subId=<?php echo $fetch['subId']?>"><?php echo $fetch['subName'] ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>

                            </li>
                            <li class="has-children">

                                <a href="index.php"></a>

                                <ul class="is-hidden">
                                    <?php
                                    $sub = $db::Query("SELECT * FROM subcategory WHERE subCatId='$id' ORDER BY date(subRegDate) DESC,time                                       (subRegTime) LIMIT 10 OFFSET 21");
                                    while ($fetch = mysqli_fetch_assoc($sub)) {


                                        ?>
                                        <li><a href="search.php?subId=<?php echo $fetch['subId']?>"><?php echo $fetch['subName'] ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>

                            </li>
                            <li class="has-children">

                                <a href="index.php"></a>

                                <ul class="is-hidden">
                                    <?php
                                    $sub = $db::Query("SELECT * FROM subcategory WHERE subCatId='$id' ORDER BY date(subRegDate) DESC,time (subRegTime) LIMIT 10 OFFSET 31");
                                    while ($fetch = mysqli_fetch_assoc($sub)) {


                                        ?>
                                        <li><a href="search.php?subId=<?php echo $fetch['subId']?>"><?php echo $fetch['subName'] ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>

                            </li>
                        </ul>

                    </li>

                    <?php
                }
                ?>
            </ul> <!-- primary-nav -->
        </nav> <!-- cd-nav -->

        <div id="cd-search" class="cd-search">
                <input type="search" placeholder="Search..." id="myInput">
            <div id="display" style=";position: absolute;width: 100%;top: 80px;">

                <div id="display2" style= "width: 100%;overflow: unset!important;top: 80px">

                </div>
            </div>
        </div>
    </div>
    <script>

        $('#myInput').on("delete copy paste cut keypress keydown keyup",function () {
            var name = $('#myInput').val();
            if(name===""){
                $('#display').css('height','0');
                $("#display1").html("");
                $("#display2").html("");

                return;
            }
            $.ajax({
                url: 'request/search.php',
                data: {
                    name:name
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    $("#display").css('height','max-content');

                    $("#display1").html(data["productName"]);
                    $("#display2").html(data["subName"]);
                }
            });

        });

    </script>