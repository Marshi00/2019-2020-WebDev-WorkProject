<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<?php
include "inc/header.php";
?>
    <!--Navbar-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="line92"></div>
    <!--heading-->
    <div class="swiper-container" id="s-con">
        <div class="swiper-wrapper">
            <?php
            $slider = $db::Query("SELECT * FROM slider WHERE status=1");
            while ($fetched = mysqli_fetch_assoc($slider)){
                $id = $fetched['sliderLinkId'];
                $mode = $fetched['sliderLinkModel'];


                if ($mode == 1) {
                    $select = $db::Query("SELECT * from festival where festivalId='$id'");
                    $fetched_news = mysqli_fetch_assoc($select);
                    $name = $fetched_news['festivalName'];
                    $modelCat = "فستیوال";

                }
                if ($mode == 2) {
                    $select = $db::Query("SELECT * from news where newsId='$id'");
                    $fetched_news = mysqli_fetch_assoc($select);
                    $name = $fetched_news['newsTitle'];
                    $modelCat = "خبر";

                }
                if ($mode == 3) {
                    $select = $db::Query("SELECT * from category where catId='$id'");
                    $fetched_news = mysqli_fetch_assoc($select);
                    $name = $fetched_news['catName'];
                    $modelCat = "دسته بندی";

                }
                if ($mode == 4) {
                    $select = $db::Query("SELECT * from subcategory where subId='$id'");
                    $fetched_news = mysqli_fetch_assoc($select);
                    $name = $fetched_news['subName'];
                    $modelCat = "زیردسته بندی";

                }

                if ($mode == 5) {
                    $select = $db::Query("SELECT * from categorynews where catNewsId='$id'");
                    $fetched_news = mysqli_fetch_assoc($select);
                    $name = $fetched_news['catNewsName'];
                    $modelCat = " دسته بندی خبر";

                }


                ?>





                <div class="swiper-slide"><img class="slider-img"
                                               src="admin/upload/slider/<?php echo $fetched['sliderImg'] ?>.jpg" alt="">
                    <h3 class="h2-the-best"><?php echo $fetched['sliderName']?><br><?php echo $name ?></h3>
                </div>

            <?php
            }
            ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination all-slide" id="pagin"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-prev" id="prev"></div>
        <div class="swiper-button-next" id="next"></div>
    </div>
    <!-- Initialize Swiper -->
    <!---------------------------------navbar1------------------------------------>


    <!--2 md-->
<div class="container-fluid">
    <div class="allOfferAndNewsEmail">
        <div class="allOffer">
            <h3>تخفیف 50 هزار تومنی برای اولین خرید شما</h3>
            <h5>فروشگاه داوین را در موبایل خود داشته باشید</h5>
            <br>
            <div><button>دانلود اپلیکیشن داوین</button></div>
        </div>
        <div class="newsEmail">
            <h4 class=" iRANSANSFANNUMbold">با عضویت در خبرنامه برای اولین خرید تخفیف بگیرید</h4>
            <br>
   <div>         <input class="finputchpi" type="text" placeholder="       شماره موبایل خود را وارد کنید ">
       <button class="fbtnchpi">ثبت شماره موبایل</button></div>
        </div>
    </div>
</div>
    <br>
    <!-----------bakhshe 4-------->
    <div class="container-fluid" >
<div class="threeChild">
    <?php
    $festival2 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 0");
    $fetch = mysqli_fetch_assoc($festival2);
    ?>
    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>"  class="tgAclassing">
    <div class="oneImg">
        <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" alt="">
        <p><?php echo $fetch['festivalName']?></p>
    </div>
    </a>

    <?php
    $festival1 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 1");
    $fetch = mysqli_fetch_assoc($festival1);
    ?>
    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>" class="tgAone">
        <div class="twoImgS">
            <div  class="myEditEndTgA">
                <p><?php echo $fetch['festivalName']?></p>
                <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" alt="">
            </div>
        </div>
    </a>

    <div class="child1Imgs">
        <?php
        $festival3 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 2");
        $fetch = mysqli_fetch_assoc($festival3);
        ?>
        <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>" class="child1Imgs1">

            <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" alt="">

            <br>    <p><?php echo $fetch['festivalName']?></p>

        </a>
    </div>

    <div class="child2Imgs">
        <?php
        $festival4 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 3");
        $fetch = mysqli_fetch_assoc($festival4);
        ?>
        <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">


            <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" alt="">
            <br>    <p><?php echo $fetch['festivalName']?></p>
        </a>
    </div>
    <div class="bigIMg">
        <?php
        $festival5 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 4");
        $fetch = mysqli_fetch_assoc($festival5);
        ?>
        <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">

            <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" alt="">
        </a>
    </div>
</div>

    </div>

    <br>
    <!--------bakhshe 5--------->
    <!--visible md lg-->
    <div class="container-fluid" style="overflow:hidden">
        <div class="parntEditMMD">
        <div id="ciwiw" >
            <div class="swiper-container" id="s-con1">
                <div class="swiper-wrapper">
                    <?php
                    $query3 = $db::Query("SELECT * FROM specialoffer,product WHERE specialOfferProductId=productId order by productId limit 5 offset 0");
                    while ($fetch = mysqli_fetch_assoc($query3)) {
                        $price5 = $fetch['productPrice'];
                        $percentageOffer = $fetch['specialOfferPercentage'];
                        $off5 = $price5 / 100 * $percentageOffer;

                        $proId = $fetch['productId'];
                        $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$proId' AND galleryStatus='1'");
                        $r = mysqli_fetch_assoc($qu);
                        ?>
                        <div class="swiper-slide imgWidth">
                            <a href="Product.php?$proId=<?php echo $proId ?>">
                                <img src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg" alt=""></a>
                            <div class="textBottomSlider"><p><?php echo $fetch['productName'] ?> </p></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination lebase-slide" id="pagin1"></div>
                <!-- Add Navigation -->
            </div>
        </div>
            <div class="allEditMMd">
                <?php
                $festival6 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 5");
                $fetch = mysqli_fetch_assoc($festival6);
                ?>
                <div >
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>" id="b1w1w1">

                    <div>
                        <h5 class="offerShortBaby"><b> <?php echo $fetch['title']?> </b><br><b> تا <?php echo $fetch['festivalOfferPercentage']?>% <?php echo $fetch['festivalName']?> </b></h5>

                        <br>
                        <i class="buyShopingShortBaby" href="Product.php">
                            <button>خرید</button>
                        </i>
                    </div>
                    <img src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" alt="" style="height: 98%">
                </a>
                </div>

                <div >
                    <?php
                    $festival7 = $db::Query("SELECT * FROM festival");
                    $fetch = mysqli_fetch_assoc($festival7);
                    $offerFestival = $fetch['festivalOfferPercentage'];
                    ?>
                    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>" id="m1w1w1">

                        <div>
                            <?php
                            if ($offerFestival==0){
                                $sEli = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 6");
                                $fetchNews = mysqli_fetch_assoc($sEli);
                                $fesModel = "";
                            }else{
                                $fesModel = $offerFestival;
                            }
                            ?>
                            <h5 class="offerShortBaby"><b> <?php echo $fetch['title']?> </b><br><b>  <?php echo $fesModel ?> <?php echo $fetch['festivalName']?> </b></h5>

                            <br>
                            <i class="buyShopingShortBaby" href="Product.php">
                                <button>خرید</button>
                            </i>
                    </div>
                    <img  src="admin/upload/img/<?php echo $fetch['festivalImg']?>" alt="">
                    </a>

                </div>

            </div>

        </div>
    </div>

    <!-------------------bakhshe 6------------------->
<div class="container-fluid" style="padding:0;margin:0">
    <div class="display-grid" id="onUpMMd">
            <?php
            $product = $db::Query("SELECT * FROM product ORDER BY date(productRegDate) DESC,time(productRegTime) LIMIT 8 OFFSET 0");
            while ($fetch = mysqli_fetch_assoc($product)) {
            $price2 = $fetch['productPrice'];
            $offer = $fetch['offer'];
            $off2 = $price2 / 100 * $offer;

            $proId = $fetch['productId'];
            $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$proId' AND galleryStatus='1'");
            $r = mysqli_fetch_assoc($qu);
            ?>
                <a href="Product.php?$proId=<?php echo $proId?>">

            <div class="comi">
                <h6 class="part1">New</h6>
                <div class="parntTempimg">
                    <img class="temp-img" src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg">
                </div>
                <h4 class="part2"><?php echo $fetch['productName'] ?></h4>
                <p class="part3"> <?php echo @$db::toMoney($price2 - $off2) ?> ریال</p>
            </div>
        </a>
        <?php
        }
        ?>
</div>

    <div class="tow-botton">
        <a href="EditProfile.html">
        <button class="button" type="button">ویرایش حساب کاربری</button>
        </a>
    </div>
    <?php
    $festival8 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 7");
    $fetch = mysqli_fetch_assoc($festival8);
    ?>
    <a href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
    <div class="bannrtGroup" style="    background-size: cover;
    background-repeat: no-repeat;
    background-image: url('admin/upload/img/<?php echo $fetch['festivalImg']?>');
    padding: 2%;
    padding-right: 5%;
    margin-top: 1%;
    margin-bottom: 1%;
    padding-bottom: 10%;
    height: 45vh;">

        <h3 class="h1-shoes2"><b><?php echo $fetch['title']?> </b><br><b> تا <?php echo $fetch['festivalOfferPercentage']?>% <?php echo $fetch['festivalName']?></b></h3>

        <br>
        <a class="btn-shoes2" href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
            <button> خرید </button>
        </a>
    </div>
    </a>
    <div class="gradi">
        <img style="position: relative" src="img/backgroundPerpel11.png" alt="">
        <div><img class="for-res1" src="img/Rectangle.png" alt=""></div>
        <div><img class="for-res2" src="img/clothes.png" alt=""></div>
        <div>
            <h1 class="for-res5">چرا داوین استایل</h1>
            <br>
            <p class="container for-res3">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                گرافیک
                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز
                و
                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده
                شناخت
                فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان
                خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در.
            <p>
        </div>
    </div>

    <!-- Swiper -->
    <div class="swiper-container" id="rrrrrrwwwww">
        <h3 style="font-family: IRANSans;text-align: center">پر فروش ترین های هفته</h3>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="search.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>



            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
            <a href="Product.php">>
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
            </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                <div class="slider-shose">
                    <div class="slider-shose1">
                        <img src="img/prod7410154_1.jpg" alt="">
                    </div>
                    <h5 class="slider-shose2">15%</h5>
                    <h4 class="slider-shose3">کفش</h4>
                    <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                    <h4 class="slider-shose5">120,0000 ریال</h4>
                </div>
                </a>
            </div>

        </div>
        <!-- Add Pagination -->
        <!-- Add Arrows -->
        <div class="swiper-button-next" id="next2"></div>
        <div class="swiper-button-prev" id="prev2"></div>
    </div>

    <div class="swiper-container" id="rrrrrrwwwww1">
        <h3 style="font-family: IRANSans;text-align: center">پر فروش ترین های هفته</h3>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="search.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>



            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">>
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="Product.php">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </a>
            </div>

        </div>
        <!-- Add Pagination -->
        <!-- Add Arrows -->
        <div class="swiper-button-next" id="next2"></div>
        <div class="swiper-button-prev" id="prev2"></div>
    </div>

    <div class="container-fluid">
        <div class="all-parent-grid">
            <?php
            $quPi = $db::Query("SELECT * FROM specialoffer,product WHERE specialOfferProductId=productId order by productId limit 1 offset 5");
            $fetch = mysqli_fetch_assoc($quPi);
            $proId = $fetch['productId'];
            $price7 = $fetch['productPrice'];
            $percentageOffer = $fetch['specialOfferPercentage'];
            $off7 = $price7 / 100 * $percentageOffer;

            $img = $fetch['productId'];
            $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
            $r = mysqli_fetch_assoc($qu);
            ?>
            <a class="a-href" href="Product.php?$proId=<?php echo $proId?>">
                <div class="glas">
                    <h5 class=""><?php echo $fetch['productName']?></h5>
                    <img class="" src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg" alt="">
                    <h4 class=""><?php echo @$db::toMoney($price7 - $off7) ?></h4>
                </div>
            </a>
            <?php
            $festival9 = $db::Query("SELECT * FROM festival order by festivalId limit 1 offset 8");
            $fetch = mysqli_fetch_assoc($festival9);
            ?>
            <a class="a-href" href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                <div class="shitr">

                    <div>
                        <h5 class="shitr1"><?php echo $fetch['title']?></h5>
                        <h4 class="shitr2"><?php echo $fetch['festivalName']?></h4>
                 <h4 class="shitr3">خرید</h4>
                    </div>
                    <img class="shitr4" src="admin/upload/img/<?php echo $fetch['festivalImg']?>" alt="">
                </div>
            </a>
            <?php
            $quPi = $db::Query("SELECT * FROM specialoffer,product WHERE specialOfferProductId=productId order by productId limit 1 offset 6");
            $fetch = mysqli_fetch_assoc($quPi);
            $proId = $fetch['productId'];
            $price8 = $fetch['productPrice'];
            $percentageOffer = $fetch['specialOfferPercentage'];
            $off8 = $price7 / 100 * $percentageOffer;

            $img = $fetch['productId'];
            $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img' AND galleryStatus='1'");
            $r = mysqli_fetch_assoc($qu);
            ?>
            <a class="a-href" href="Product.php?$proId=<?php echo $proId?>">

                <div class="shose-white">
                    <h5 class=""><?php echo $fetch['productName']?></h5>
                    <img class="" src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg" alt="" width="60px" height="120px">
                    <h4 class=""><?php echo @$db::toMoney($price8 - $off8) ?></h4>
                </div>
            </a>

        </div>
    </div>
    <div class="container-fluid">
        <div class="all-parent-grid1">
            <!--slider-->
            <div class="bag1">
                <div class="swiper-container" id="s-con12">
                    <div class="swiper-wrapper">
                        <?php
                        $query13 = $db::Query("SELECT * FROM specialoffer,product WHERE specialOfferProductId=productId order by productId limit 4 offset 7");
                        while ($fetch = mysqli_fetch_assoc($query13)) {
                            $price13 = $fetch['productPrice'];
                            $percentageOffer = $fetch['specialOfferPercentage'];
                            $off13 = $price13 / 100 * $percentageOffer;

                            $proId = $fetch['productId'];
                            $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$proId' AND galleryStatus='1'");
                            $r = mysqli_fetch_assoc($qu);
                            ?>
                            <div class="swiper-slide">
                                <a href="Product.php?$proId=<?php echo $proId?>" class="tgASlider">
                                    <img src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg" alt="">
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination bag-slide" id="pagin12"></div>
                    <!-- Add Navigation -->
                </div>
            </div>
            <!--slider--><?php
            $fes15 = $db::Query("SELECT * FROM festival order by festivalId limit 3 offset 9");
            while ($fetch = mysqli_fetch_assoc($fes15)){
            ?>
            <a class="a-href" href="festival.php?festivalId=<?php echo $fetch['festivalId']?>">
                <div class="dastband">
                    <h5 class="tshirt-white2"><?php echo $fetch['festivalName']?></h5>
                    <img class="tshirt-white1" src="admin/upload/img/<?php echo $fetch['festivalImg']?>.jpg" alt="">
                </div>
            </a>

            <?php
            }
            ?>

        </div>
    </div>

<div class="container-fluid">
    <div style="margin-top: 2%" >
        <h1 style="color: #000000;text-align: center"><b>As Seen On</b></h1>
        <div class="pin-cop">
            <h5>pintrest</h5>
            <h5>pintrest</h5>
            <h5>pintrest</h5>
            <h5>pintrest</h5>
            <h5>pintrest</h5>
            <h5>pintrest</h5>
            <h5>pintrest</h5>
            <h5>pintrest</h5>
        </div>
    </div>
</div>

    <!-------------------slider paiin----------------------------------------------->
    <div class="container-fluid" id="jZiroPadding">
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" id="mmdSkif">
            <div class="jhdgfhj">
                <div class="slideshow-container">

                    <div class="mySlides ">
                        <div>
                            <img src="img/slider3.png" class="last-slider"></div>
                    </div>

                    <div class="mySlides ">
                        <div>
                            <img src="img/women.png" class="last-slider"></div>
                    </div>

                    <div class="mySlides ">
                        <div>
                            <img class="last-slider" src="img/slider3.png">
                        </div>
                    </div>


                </div>

                <div style="    text-align: center;
    position: absolute;
    display: flex;
    align-content: center;
    align-items: center;
    width: 100%;
    justify-content: center;
    bottom: 30px;">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>

        </div>
    </div>
    <!--------------------------------end slider paiin---------------------------------->
    <!---------------footer paiin--------------------------------------------------->
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
                <a href="https://google.com"><img src="/img/Facebook%20Icon%20@1.5x.svg" class="liclick" id="line345"></a>
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
</div>
</body>
<!--js-->
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/rSlider.min.js.js"></script>
<script src="js/swiper.min.js"></script>
<!--<script src="js/page3.js"></script>-->
<script src="js/swiper.min.js"></script>
<script>
    /* ========
    Debugger plugin, simple demo plugin to console.log some of callbacks
    ======== */
    var myPlugin = {
        name: 'debugger',
        params: {
            debugger: false,
        },
        on: {
            init: function () {
                if (!this.params.debugger) return;
                console.log('init');
            },
            click: function (e) {
                if (!this.params.debugger) return;
                console.log('click');
            },
            tap: function (e) {
                if (!this.params.debugger) return;
                console.log('tap');
            },
            doubleTap: function (e) {
                if (!this.params.debugger) return;
                console.log('doubleTap');
            },
            sliderMove: function (e) {
                if (!this.params.debugger) return;
                console.log('sliderMove');
            },
            slideChange: function () {
                if (!this.params.debugger) return;
                console.log('slideChange', this.previousIndex, '->', this.activeIndex);
            },
            slideChangeTransitionStart: function () {
                if (!this.params.debugger) return;
                console.log('slideChangeTransitionStart');
            },
            slideChangeTransitionEnd: function () {
                if (!this.params.debugger) return;
                console.log('slideChangeTransitionEnd');
            },
            transitionStart: function () {
                if (!this.params.debugger) return;
                console.log('transitionStart');
            },
            transitionEnd: function () {
                if (!this.params.debugger) return;
                console.log('transitionEnd');
            },
            fromEdge: function () {
                if (!this.params.debugger) return;
                console.log('fromEdge');
            },
            reachBeginning: function () {
                if (!this.params.debugger) return;
                console.log('reachBeginning');
            },
            reachEnd: function () {
                if (!this.params.debugger) return;
                console.log('reachEnd');
            },
        },
    };
</script>

<script>
    // Install Plugin To Swiper
    Swiper.use(myPlugin);

    // Init Swiper
    var swiper = new Swiper('#s-con', {
        pagination: {
            el: '#pagin',
            clickable: true,
        },
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '#next',
            prevEl: '#prev',
        },
        // Enable debugger
        debugger: true,
    });
</script>
<script>
    // Install Plugin To Swiper
    Swiper.use(myPlugin);

    // Init Swiper
    var swiper = new Swiper('#s-con1', {
        pagination: {
            el: '#pagin1',
            clickable: true,
        },
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        // Enable debugger
        debugger: true,
    });
</script>
<script>
    // Install Plugin To Swiper
    Swiper.use(myPlugin);

    // Init Swiper
    var swiper = new Swiper('#s-con12', {
        pagination: {
            el: '#pagin12',
            clickable: true,
        },
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        // Enable debugger
        debugger: true,
    });
</script>
<script>
    // lastslider
    // lastslider
    // lastslider// Slider2
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

    // new slider
    // new slider
    // new slider
    // new slider
    // new slider
    var swiper123 = new Swiper('#rrrrrrwwwww', {
        slidesPerView: 6,
        spaceBetween: 6,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '#next2',
            prevEl: '#prev2',
        },
    });
</script>
<!--// baraye tedad-->
<script>
        if (window.matchMedia("(max-width: 996px)").matches) {
            var swiper061 = new Swiper('#rrrrrrwwwww1', {
                slidesPerView: 3,
                spaceBetween: 3,
                slidesPerGroup: 5,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '#next1',
                    prevEl: '#prev1',
                },
            });
        } else {
            var swiper061 = new Swiper('#rrrrrrwwwww1', {
                slidesPerView: 6,
                spaceBetween: 6,
                slidesPerGroup: 4,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '#next1',
                    prevEl: '#prev1',
                },
            });
        }
</script>
<script>
        if (window.matchMedia("(max-width: 996px)").matches) {
            var swiper061 = new Swiper('#rrrrrrwwwww', {
                slidesPerView: 3,
                spaceBetween: 3,
                slidesPerGroup: 5,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '#next2',
                    prevEl: '#prev2',
                },
            });
        } else {
            var swiper061 = new Swiper('#rrrrrrwwwww', {
                slidesPerView: 6,
                spaceBetween: 6,
                slidesPerGroup: 4,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '#next2',
                    prevEl: '#prev2',
                },
            });
        }
        function newDoc() {
            window.location.assign("search.php")
        }
</script>
</html>