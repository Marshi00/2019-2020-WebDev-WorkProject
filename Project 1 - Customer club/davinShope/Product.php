<?php
include "inc/header.php";
$id= '';
$_GET = $db::RealString($_GET);
$id = $_GET['$proId'];
?>
<!--Navbar-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="line92"></div>
<!--heading-->
<!---------------------------------navbar1------------------------------------>

<!----------------------------navbar2---------------------------------->
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-bottom: 2%">
    <?php
    $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$id'");
    $fetch = mysqli_fetch_assoc($qu);

    ?>
    <div class="sliderKinf">
        <!--    imgBigg-->
        <div class="part1BigImg">
            <img src="admin/upload/gallery/<?php echo $fetch['galleryImg']?>.jpg" alt="" id="image-container">
        </div>
        <!--    chilld-->
        <div class="part1Img2">
            <?php
           $img = $db::Query("SELECT  * FROM gallery WHERE galleryPrId='$id'");
            while ($fetch = mysqli_fetch_assoc($img)){


            ?>
               <img onclick="change_img(this)" src="admin/upload/gallery/<?php echo $fetch['galleryImg']?>.jpg" alt="">
                <?php
            }
            ?>
        </div>

        <div class="part3Text">
            <?php
            $pr = $db::Query("SELECT * FROM product,subcategory,brand WHERE productId='$id'");
            $spCei = $db::Query("SELECT * FROM specialoffer WHERE specialOfferProductId='$id'",$db::$NUM_ROW);
            if ($spCei == 0) {
                $fetch = mysqli_fetch_assoc($pr);
                $subCatId = $fetch['productSubCatid'];
                $price = $fetch['productPrice'];
                $offer = $fetch['offer'];
                $off = $price / 100 * $offer;
            }else {
                $select = $db::Query("SELECT * FROM specialoffer WHERE specialOfferProductId='$id'");
                $fetch = mysqli_fetch_assoc($select);
                $offer = $fetch['specialOfferPercentage'];
                $fetch = mysqli_fetch_assoc($pr);
                $subCatId = $fetch['productSubCatid'];
                $price = $fetch['productPrice'];
                $off = $price / 100 * $offer;
            }
                ?>
                <h2><?php echo $fetch['productName'] ?> </h2>
                <h3 id="price" style="    color: #ed3e75;"> قیمت:<?php echo @$db::toMoney($price - $off) ?> ریال </h3>
                <hr>


            <h4>توضیحات:</h4>
            <p>
                <?php echo $fetch['Description'] ?>
            </p>
            <br>

            <hr>
            <div class="checkboxKIngMmdKhosroviy">
                <p>برند: </p>
                <p><?php echo $fetch['brand'] ?></p>
            </div>


            <hr>

            <div class="checkboxKIngMmdKhosroviy">
                <p>رنگ بندی</p>
                <div class="checking">
                    <?php
                    $color = $db::Query("SELECT *FROM color,colorproduct where colorId=coPrColorId AND coPrProductId='$id'");
                    while ($fetch = mysqli_fetch_assoc($color)) {
                        $name = $fetch['colorName'];

                        ?>
                        <label class="containerw">
                            <input type="radio" checked="checked" name="radio" class="inputRadioCk1">
                            <span class="checkmark inputRadioCk1"
                                  onclick="changeColored('<?php echo $fetch['coPrId'] ?>')"
                                  style=" background-color: <?php echo $name ?>"></span>
                        </label>
                        <?php
                    }
                    ?>


                </div>

                <script>
                    function changeColored(id) {
                        $.ajax({
                            url:'request/changeColored.php',
                            data:{
                                id:id,
                            },
                            dataType: 'json',
                            type: 'POST',
                            success:function (data) {
                                if (!data['error']){
                                    $("#price").html(data['price']+' ریال ')
                                }

                            }
                        });

                    }
                </script>
            </div>
            <br><br> <br><br>
            <div class="checkboxKIngMmdKhosroviy">
                <p>اندازه</p>
                <div class="divSizeLsMX">
                    <?php
                    $size = $db::Query("SELECT * FROM size,sizeproduct WHERE sizeId=siPrSizeId AND siPrProductId='$id'");
                    while ($fetch = mysqli_fetch_assoc($size)) {
                        $nameSize = $fetch['sizeName'];

                        ?>

                        <div><p class="activeNotBtn" id="id" onclick="fon('id')"><?php echo $nameSize?></p></div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <br><br><br>
            <div class="checkboxKIngMmdKhosroviy">
                <button onclick="shbADD('<?php echo $id?>')">اضافه کردن به سبد خرید</button>
                <div style="text-align: center">
                    <p>تعداد</p>
                    <input type="button" value="+" class="nexNum" id="divnex" onclick="changePluss('divnex','+')">
                    <input type="number" id="countSHB" step="1" max="99" min="1" value="1" title="Qty" class="qty btnnumbrik" size="4"
                           disabled="">
                    <input type="button" value="-" class="prevNum" id="divprev" onclick="changePluss('divprev')">
                </div>
            </div>
        </div>
    </div>
    <script>
        function shbADD(id) {
            var count = $("#countSHB").val();
            $.ajax({
                url: 'request/shoppingCard.php',
                data: {
                    PrId:id,
                    count:count
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    location.reload();
                }
            });
        }
    </script>
</div>

<!--------------------------------------------------------------------->
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 backimg">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <img src="img/Rectangle.png" class="img1">
        <img src="img/Davin11.png" class="davinpng">
    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <img src="img/clothes.png" class="img2">
    </div>
</div>



<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding: 2%">
    <h1  style="font-family: IRANSANSFANNUMblack !important;text-align: center">توضیحات محصول</h1>
        <div class="container-fluid">

        <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 divtext">
            <?php
            $des = $db::Query("SELECT * FROM product WHERE productId='$id'");
            $fetch = mysqli_fetch_assoc($des);
            ?>
            <p class="mytext"><?php echo $fetch['Description']?></p>
        </div>
    </div>
</div>

<!------------------------ nazarat karbaran ----------------->
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="padding-top:4%">
    <div class="container">
        <h1 class="h1nazarat">نظرات کاربران</h1>
        <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12" style="    padding-top: 5%;
    float: none;
    margin-left: 14%;
    margin-right: 16%;
        width: fit-content;
    justify-content: center;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    align-content: center;
    flex-wrap: wrap;">
            <div style="    display: flex;    flex-direction: row;    margin: 0;    padding: 0;    /* height: fit-content; */    align-items: flex-end;    justify-content: center;">
                <?php
                $comment = $db::Query("SELECT * FROM comment,user,admin WHERE adminId=commentAdminIdAccepted AND userId=commentUserId AND commentProductId='$id'");
                while ($fetch = mysqli_fetch_assoc($comment)){


                ?>

                <div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"
                     style="      margin: 0px 0px 0px 16px;    padding: 0;     width: fit-content; ">
                    <img style="    width: 32px ;" src="img/Bitmap@2x.png">
                </div>

                <!--                part2-->
                <div class="col-md-3 col-lg-3 col-xs-5 col-sm-5 SansMedium namenazar"
                     style="      margin: 0px 0px 0px 16px;    width: fit-content;  padding: 0;  ">
                    <?php echo $fetch['userName']?>
                </div>
                <!--                part3-->
                <!--                part1-->
                <div class="col-md-4 col-lg-4 col-xs-5 col-sm-5 SansMedium namenazar"
                     style="  margin: 0;      width: fit-content;  padding: 0;  ">
                    سه شنبه <?php echo $fetch['commentRegDate']?> ساعت <?php echo $fetch['commentRegTime']?>
                </div>
            </div>

            <div class="col-md-9 col-lg-9 col-xs-10 col-sm-10 textnazarat1">
                <?php echo $fetch['commentText']?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>


        <div class="col-md-6 col-xs-9 col-lg-6 col-sm-9 inputss">
            <div class="alert alert-danger" id="errorrigg" style="display: none">
                tamam fild ha por she
            </div>
            <div class="alert alert-success" id="succccc" style="display: none">
                نظر با موفقیت ثبت شد
            </div>
            <div class="clssTextArea">
                <textarea id="comment" class="textarea" rows="9" placeholder="نظر خود را وارد نمایید"></textarea>
            </div>
            <br><br><br><br>
            <?php
            if(isset($_SESSION['loginUser']) && $_SESSION['loginUser']==true) {
                $username = $_SESSION['userId'];
                $select = $db::Query("SELECT * FROM user WHERE userId='$username'");
                $row = mysqli_fetch_assoc($select);
                echo '<button type="button" onclick="submit()" class="btn btn-lg btn-default SansBold btn-sabt-nazar">ثبت نظر</button>';

            }else{
                echo '<p>ابتدا وارد شوید</p>';
                ?>
            <?php } ?>


        </div>
</div>
<script>
    function submit() {
        var comment = $("#comment").val();

        $.ajax({
            url:"request/comment.php",
            data: {
                comment:comment,
                id:'<?php echo $id;?>'
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if (data["error"]){
                    $("#errorrigg").show("fast").html(data['MSG']);


                }else  {
                    $("#succccc").show("fast");
                }
            }
        });

    }
</script>

<!------------------------ nazarat karbaran ----------------->
<!-------------------------mahsoolat vizhe ------------------>
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
    <div class="container-fluid">
        <br><br><br><br><br><br><br>
        <h1 class="text-center vizhedavin">محصولات ویژه داوین استایل</h1>
        <br><br><br><br><br>
        <div class="display-grid1">
            <?php
            $specialPr = $db::Query("SELECT * FROM specialoffer,product WHERE specialOfferProductId=productId order by productId limit 8 OFFSET 0");
            while ($fetch = mysqli_fetch_assoc($specialPr)) {
                $price10 = $fetch['productPrice'];
                $percentageOffer = $fetch['specialOfferPercentage'];
                $offF = $price10 / 100 * $percentageOffer;
                $img2 = $fetch['productId'];
                $qu = $db::Query("SELECT * FROM gallery WHERE galleryPrId='$img2' AND galleryStatus='1'");
                $r = mysqli_fetch_assoc($qu);
                ?>
                <div class="comi2">
                    <img class="temp-img" src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg">
                    <h6 class="part1">New</h6>
                    <h3 class="part2"><?php echo $fetch['productName']?></h3>
                    <p class="part3"> <?php echo @$db::toMoney($price10 - $offF)?> ریال </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!-------------------------------------------------------------->
<!---------------------mahsoolat moshabeh---------------------->
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="overflow: hidden">
    <div class="container-fluid">

        <br><br><br>
        <div class="swiper-container" >
            <h3 style="text-align: center" class="iRANSANSFANNUMMedium">محصولات مشابه داوین استایل</h3>
            <div class="swiper-wrapper">
                <?php
                $productM = $db::Query("SELECT * FROM product WHERE productSubCatid='$subCatId' AND productId!='$id' limit 20");
                while ($fetch = mysqli_fetch_assoc($productM)) {
                    $price55 = $fetch['productPrice'];
                    $oFfeF = $fetch['offer'];
                    $off66 = $price55 / 100 * $oFfeF;

                    $img88 = $fetch['productId'];
                    $qqU = $db::Query("SELECT * FROM gallery WHERE galleryPrId = '$img88' AND galleryStatus='1'");
                    $r25 = mysqli_fetch_assoc($qqU);
                    ?>
                    <div class="swiper-slide">
                        <div class="slider-shose">
                            <div class="slider-shose1">
                                <img src="admin/upload/gallery/<?php echo $r['galleryImg'] ?>.jpg" alt="">
                            </div>
                            <h5 class="slider-shose2"><?php echo $fetch['offer']?>%</h5>
                            <h4 class="slider-shose3"><?php echo $fetch['productName']?></h4>
                            <h4 class="slider-shose5"><?php echo @$db::toMoney($price55 - $off66)?> ریال</h4>
                        </div>
                    </div>
                    <?php
                }
                ?>


            </div>
            <!-- Add Pagination -->
            <!-- Add Arrows -->
            <div class="swiper-button-next" id="next3"></div>
            <div class="swiper-button-prev" id="prev3"></div>
        </div>

        <!-- Swiper -->
        <div class="swiper-container" id="rrrrrrwwwww">
            <h3 style="text-align: center" class="iRANSANSFANNUMMedium">پر فروش ترین های هفته</h3>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-shose">
                        <div class="slider-shose1">
                            <img src="img/prod7410154_1.jpg" alt="">
                        </div>
                        <h5 class="slider-shose2">15%</h5>
                        <h4 class="slider-shose3">کفش</h4>
                        <h4 class="slider-shose4">کفش چرم قهوه ای رسمی</h4>
                        <h4 class="slider-shose5">120,0000 ریال</h4>
                    </div>
                </div>

            </div>
            <!-- Add Pagination -->
            <!-- Add Arrows -->
            <div class="swiper-button-next" id="next3"></div>
            <div class="swiper-button-prev" id="prev3"></div>
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
                        <img src="img/slider2.png" class="last-slider"></div>
                </div>

                <div class="mySlides ">
                    <div>
                        <img src="img/slider3.png" class="last-slider">
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
</body>
<!--js-->
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="js/rSlider.min.js.js"></script>
<script src="js/page3.js"></script>
<script>
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

</script>
<script>
    function fon(id) {
        document.getElementById(id).style.backgroundColor = "black";
        document.getElementById(id).style.color = "white";
    }
</script>
<style>
    @media (max-width: 996px){
        .display-grid1 {
            justify-content: center;
            display: grid;
            grid-template-columns: repeat(2, 50%);
            margin-top: 31px;
            margin-bottom: 137px;
            margin-right: 0%;
        }        .comi2 {
                     position: relative;
                     background-color: #edebed;
                     /* width: 280px; */
                     margin-bottom: 16px;
                 }}

    @media (max-width: 600px){
        .display-grid1 {
            justify-content: center;
            display: grid;
            grid-template-columns: repeat(1, 100%);
            margin-top: 31px;
            margin-bottom: 137px;
            margin-right: 0%;
            align-items: center;
            align-content: center;
            justify-content: center;
            justify-items: center;
        }}
</style>
</html>