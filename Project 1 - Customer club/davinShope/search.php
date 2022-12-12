<?php
include "inc/header.php";
$id = '';
$_GET = $db::RealString($_GET);
$id = $_GET['subId'];
?>


<!--Navbar-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="line92"></div>
<!--heading-->

<?php
$sub = $db::Query("SELECT * FROM subcategory WHERE  subId='$id'");
$fetch = mysqli_fetch_assoc($sub);
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 1%"><!--Pictures list / item list-->
    <div class="container-fluid ioioioioioi">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                <h3>نتیجه جستوجوی شما : <?php echo $fetch['subName'] ?></h3>
                <ul onclick="myFunction()" class="dropbtn">مرتب سازی <i class="fas fa-angle-down"></i>
                    <ul id="myDropdown" class="dropdown-content">
                        <li>2</li>
                        <li>2</li>
                        <li>2</li>
                        <li>2</li>
                        <li>2</li>
                        <li>2</li>
                    </ul>
                </ul>
            </div>
            <?php
            $cat = $db::Query("SELECT * FROM product WHERE productSubCatid='$id'");
            while ($Fetch = mysqli_fetch_assoc($cat)){
                $price = $Fetch['productPrice'];
                $offer = $Fetch['offer'];
                $off = $price/100*$offer;

                $proId = $Fetch['productId'];
                $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$proId'");
                $r = mysqli_fetch_assoc($qu);


            ?>
                <a href="Product.php?$proId=<?php echo $proId?>">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6" style="text-align: center">
                        <img src="admin/upload/gallery/<?php echo $r['galleryImg']?>.jpg" style="width: 100%">
                        <h3><?php echo $Fetch['productName']?></h3>
                        <p><?php echo @$db::toMoney($price- $off)?> ریال </p>
                    </div>
                </a>

            <?php
            }
            ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom: 2px solid #AFAFAF"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center">
                <div>

                    <a href="#" style="float: right;margin-top: 2%"><i class="fas fa-long-arrow-alt-right"
                                                                       style="color:#AFAFAF"></i></a>
                    <a href="#" style="float: left;margin-top: 2%"><i class="fas fa-long-arrow-alt-left"
                                                                      style="color:#AFAFAF"></i></a>
                    <div class="pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border-bottom: 2px solid #AFAFAF"></div>
        </div>
        <!--MENU-->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="mKIngShet">
            <div class="row">
                <div style="width: max-content">
                    <!--    part1-->
                    <div id="searching">
                        <i class="fa fa-search" id="searching2"></i>
                        <input type="search" onfocus="changeColor()" autoFocus>
                    </div>
                    <div class="qw">
                        <div class="drop-down6 qw">
                            <div class="drop-down-button6 open-close1">
                                <?php
                                $cat = $db::Query("SELECT * FROM category,subcategory WHERE catId=subCatId AND subId='$id'");
                                $fetch = mysqli_fetch_assoc($cat);
                                $catId = $fetch['catId'];
                                ?>
                                <span class="drop-down-title1"><?php echo $fetch['catName']?></span>
                                <span class="drop-arrow6"></span>
                            </div>
                            <ul class="drop-down-list6" id="drop-down-list6">
                                <?php
                                $i = 1;
                                $subList = $db::Query("SELECT * FROM subcategory WHERE subCatId='$catId' ");
                                while ($fetch = mysqli_fetch_assoc($subList)){


                                ?>
                                <li class="classli">
                                    <input type="checkbox" class="checkbox1" id="checkbox-1<?php echo $i?>">
                                    <label for="checkbox-1<?php echo $i?>" class="checkbox-label1"><?php echo $fetch['subName']?></label>
                                </li>
                                <?php
                                    $i++;
                                }
                                ?>
                            </ul>
                        </div>

                        <!--part2-->
                    </div>

                    <!--    end-->
                    <br><br>
                    <div>
                        <p class="classPbErand">برندها</p>
                        <div id="the-basics">
                            <input class="typeahead" type="text" placeholder="جستجو" style="width: 100%">
                        </div>
                    </div>
                    <!--    qimat-->
                    <br><br><br>
                    <div style="     width: 50%;
    height: 100px;">
                        <p style="direction: rtl;text-align: right">قیمت (تومان)</p>
                        <div>
                            </br></br>
                            <div>
                                <div class="slider-container">
                                    <input type="text" id="slider3" class="slider"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!--    checlbox-->
                    <div style="    width: 258px">
                        <div class="checkbox">
                            <label>

                                XS
                                <input type="checkbox">
                                <span class="checkbox-icon-wrapper">
      <span class="checkbox-icon glyphicon fas fa-check"></span>
    </span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>

                                L
                                <input type="checkbox">
                                <span class="checkbox-icon-wrapper" style="    margin-right:17%;">
      <span class="checkbox-icon glyphicon fas fa-check"></span>
    </span>
                            </label>
                        </div>


                        <div class="checkbox">
                            <label>

                                S
                                <input type="checkbox">
                                <span class="checkbox-icon-wrapper" style="    margin-right: 14%;
">
      <span class="checkbox-icon glyphicon fas fa-check"></span>
    </span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                XL

                                <input type="checkbox">
                                <span class="checkbox-icon-wrapper">
      <span class="checkbox-icon glyphicon fas fa-check"></span>
    </span>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>

                                M
                                <input type="checkbox">
                                <span class="checkbox-icon-wrapper">
      <span class="checkbox-icon glyphicon fas fa-check"></span>
    </span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>

                                XXl
                                <input type="checkbox">
                                <span class="checkbox-icon-wrapper" style="    margin-right: 5%;">
      <span class="checkbox-icon glyphicon fas fa-check"></span>
    </span>
                            </label>
                        </div>
                    </div>
                    <br><br><br>
                    <button style="        background: #fff;
    border: 1px solid black;
    padding-right: 50px;
    padding-left: 50px;
    padding-top: 6px;
    font-size: 20px;
    padding-bottom: 5px;
    margin-bottom: 17px;">اعمال
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>
<!--footer-->
<div class="col-lg  -12 col-md-12 col-sm-12 col-xs-12" id="line232">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="line233"></div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    <!--ورودی ایمیل-->
    <div class="col-lg-6 col-md-6 "><!--ابعاد md و lg-->
        <div class="col-lg-11 col-md-11" id="line237">
            <h4 class="footer-title" id="line238">برای دریافت خبرنامه ایمیل خود را وارد نمایید</h4>
            <div style=";padding: 0;">
                <input type="text" placeholder="ایمیل خود را وارد نمایید" class="inputline73">
                <input type="button" value="ثبت ایمیل" class="buttonline73" id="line241">
            </div>
        </div>
    </div><!--ابعاد md و lg-->
    <div class="hidden-lg hidden-md col-xs-12 col-xs-12" id="linr245"><!--ابعاد xs و sm-->
        <div class="col-sm-10 col-xs-10">
            <h4 style="margin-bottom: 30px;text-align: right;color: white;font-size: 3vw;">برای دریافت خبرنامه ایمیل خود
                را وارد نمایید</h4>
        </div>

    </div><!--ابعاد xs و sm-->
    <br>
    <!--ستون های متنی-->
    <div class="col-lg-4 col-md-4 visible-lg visible-md"><!--ابعاد md و lg-->
        <!--تماس با ما-->
        <div class="col-lg-4 col-md-4 ">
            <div class="col-lg-12 col-md-12 " id="line265">
                <ul id="line266">
                    <li id="line267">تماس با ما</li>
                    <li id="line268">اهواز - نادری - خیابان حافظ</li>
                    <li id="line269">061-3345</li>
                </ul>
            </div>
        </div>
        <!--پشتیبانی-->
        <div class="col-lg-4 col-md-4 ">
            <div class="col-lg-12 col-md-12" id="line275">
                <ul id="line276">
                    <li id="line277">پشتیبانی</li>
                    <li id="line278" onclick="" class="liclick">پشتیبانی</li>
                    <li id="line279" onclick="" class="liclick">ارسال</li>
                    <li id="line280" onclick="" class="liclick">راهنمایی</li>
                    <li id="line281" onclick="" class="liclick">حفاظت از محصولات</li>
                </ul>
            </div>

        </div>
        <!--دسته بندی-->
        <div class="col-lg-4 col-md-4 ">
            <div class="col-lg-12 col-md-12" id="line288">
                <ul id="line289">
                    <li id="line290">دسته بندی</li>
                    <li id="line291" onclick="" class="liclick">جدیدترین</li>
                    <li id="line292" onclick="" class="liclick">زنانه</li>
                    <li id="line293" onclick="" class="liclick">بچگانه</li>
                    <li id="line294" onclick="" class="liclick">کودکانه</li>
                    <li id="line295" onclick="" class="liclick">لوازم آرایش</li>
                    <li id="line296" onclick="" class="liclick">عطر</li>
                    <li id="line297" onclick="" class="liclick">تک سایز ها</li>
                </ul>
            </div>
        </div>
    </div><!--ابعاد md و lg-->
    <div class="col-lg-1 col-md-1 visible-lg visible-md"></div>
    <div class="hidden-lg hidden-md col-sm-10 col-xs-10" id="line303"><!--ابعاد xs و sm-->
        <!--تماس با ما-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <ul style="color: white;list-style-type: none;margin: 0;padding: 0;">
                <li id="line307">تماس با ما</li>
                <li id="line308">اهواز - نادری - خیابان حافظ</li>
                <li id="line309">061-3345</li>
            </ul>
        </div>
        <!--پشتیبانی-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <ul id="line314">
                <li id="line315">پشتیبانی</li>
                <li id="line316" onclick="" class="liclick">پشتیبانی</li>
                <li id="line317" onclick="" class="liclick">ارسال</li>
                <li id="line318" onclick="" class="liclick">راهنمایی</li>
                <li id="line319">حفاظت از محصولات</li>
            </ul>
        </div>
        <!--دسته بندی-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <ul id="line324">
                <li id="line325">دسته بندی</li>
                <li id="line326" onclick="" class="liclick">جدیدترین</li>
                <li id="line327" onclick="" class="liclick">زنانه</li>
                <li id="line328" onclick="" class="liclick">بچگانه</li>
                <li id="line329" onclick="" class="liclick">کودکانه</li>
                <li id="line330" onclick="" class="liclick">لوازم آرایش</li>
                <li id="line331" onclick="" class="liclick">عطر</li>
                <li id="line332" onclick="" class="liclick">تک سایز ها</li>
            </ul>
        </div>
        <!--davin footer-->
    </div><!--ابعاد xs و sm-->
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    <!--توییتر و فیسبوک-->
    <div class="col-sm-12 col-xs-12 visible-xs visible-sm" id="line339"><!--for xs & sm-->
        <div class="col-sm-6 col-xs-6">
            <img src="img/davinFooter.svg" id="line341">
            <a href="https://google.com"><img src="img/Twitter%20Icon@1.5x.svg" class="liclick"
                                              href="https://google.com" id="line342"></a>
        </div>
        <div class="col-sm-6 col-xs-6">
            <a href="https://google.com"><img src="img/Facebook%20Icon%20@1.5x.svg" class="liclick" id="line345"></a>
        </div>
    </div><!--for xs & sm-->
    <div class="col-md-12 col-lg-12 visible-lg visible-md" style="margin-bottom: 20px"><!--for lg & md-->
        <div class="col-lg-6 col-md-6">
            <img src="img/davinFooter.svg" id="line350">
            <a href="https://google.com"><img src="img/Twitter%20Icon@1.5x.svg" class="liclick" id="line351"></a>
        </div>
        <div class="col-lg-6 col-md-6">
            <a href="https://google.com"><img src="img/Facebook%20Icon%20@1.5x.svg" class="liclick" id="line354"></a>
        </div>
    </div><!--for lg & md-->
</div>
</body>
<!--js-->
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="js/rSlider.min.js.js"></script>
<script src="js/page3.js"></script>

</html>