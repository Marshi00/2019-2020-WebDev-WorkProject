
<?php
include "inc/header.php";
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<!--Navbar-->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center;padding:30px">

    <h1 class="h1dastebandi SansBold">سبد خرید</h1>
    <br>
    <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52"></div>
    <br><br>
    <table align="right" style="direction: rtl;border: 1px solid #f8f8f8;width: 100%">
        <tbody>
        <tr class="sabad-kharid IRANSans" style="background-color: #dc1a52;">
            <th>#</th>
            <th>عکس محصول</th>
            <th>نام محصول</th>
            <th>تعداد محصول</th>
            <th>قیمت واحد</th>
            <th>قیمت</th>
            <th>تخفیف</th>
            <th>قیمت نهایی</th>
            <th>حذف</th>
        </tr>
        <?php
        $laster=0;
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
                                                   shoppingbasket.SHBPay='0' AND (SHBUserId='$shbUserId' OR SHBGuest='$shbUserId')");
        while ($rowPr = mysqli_fetch_assoc($SELECT)){
        $price = $rowPr['productPrice'];
        $Offer = $rowPr['offer'];
        $off = $price / 100 * $Offer;
        ?>


        <tr class="sabad-kharid1 IRANSans">
            <th>1</th>
            <th class="picsabad">
                <?php
                $idProduct = $rowPr['productId'];
                $selectGallery = $db::Query("SELECT * FROM gallery where galleryPrId='$idProduct' and galleryStatus='1'",$db::$RESULT_ARRAY);

                ?>

                <a href="Product.php?productId=<?php echo $rowPr['productId'] ?>">
                    <img src="admin/upload/gallery/<?php echo $selectGallery['galleryImg']?>.jpg" style="height: 70px;"></a></th>

            <th>
                <p><?php echo $rowPr['productName']?></p>
            </th>
            <th>

                <div style="text-align: center;margin-left: 12%;">
                    <input type="button" size="2px" value="+" class="nexNum" id="divnex"
                           onclick="changePluss('<?php echo $rowPr['productId'] ?>')"
                           style="width:30px;height:30px;border-radius:3px;background-color: #dc1a52;">
                    <input id="pr<?php echo $rowPr['productId'] ?>" type="number" step="1" max="99" min="1"
                           value="<?php echo $rowPr['PSHBCount'] ?>" title="Qty" class="qty btnnumbrik SansBold"
                           size="4" disabled="" style="font-size:16px;color: #dc1a52">
                    <input type="button" value="-" class="prevNum" id="divprev"
                           onclick="changePluss2('<?php echo $rowPr['productId'] ?>')"
                           style="width:30px;height:30px;border-radius: 3px;background-color: #dc1a52">
                </div>
            </th>
            <th><?php echo @$db::toMoney($price) ?></th>
            <th><?php echo @$db::toMoney($price * $rowPr['PSHBCount']) ?></th>
            <th><?php echo @$db::toMoney($off * $rowPr['PSHBCount']) ?></th>
            <th><?php echo @$db::toMoney($price * $rowPr['PSHBCount'] - $off * $rowPr['PSHBCount']); ?></th>
            <th class="vImgPuser"><img src="img/clearbanafsh@2x.png" alt="" width="20%" id="im"
                                       onclick="pak('<?php echo $rowPr['productId'] ?>')"></th>
            <?php
            $laster += $price * $rowPr['PSHBCount'] - $off * $rowPr['PSHBCount'];
            }
            ?>
        </tr>

        <tr style="background-color:#f3f3f3;height: 70px">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tbody>
    </table>
    <script>
        function changePluss(id) {
            var pr = $("#pr" + id).val();
            pr++;
            $.ajax({
                url: 'request/shoppingCard.php',
                data: {
                    PrId: id,
                    count: pr
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    location.reload();
                }
            });
        }

        function changePluss2(id) {
            var pr = $("#pr" + id).val();
            pr--;
            $.ajax({
                url: 'request/shoppingCard.php',
                data: {
                    PrId: id,
                    count: pr
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    location.reload();
                }
            });
        }

        function pak(id) {

            $.ajax({
                url: 'request/shoppingCard.php',
                data: {
                    PrId: id,
                    count: 'delete'
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
    var container = document.getElementById('image-container');

    function change_img(image) {
        container.src = image.src;
    }

    // plusss
    function changePluss33(id, operator) {
        if (operator == '+') {
            $(`#${id}`).next().val(parseInt($(`#${id}`).next().val()) + 1);
        } else {
            if ($(`#${id}`).prev().val() <= 1) {
                $(`#${id}`).parent().parent().parent().hide();
                $(`#${id}`).parent().parent().parent().parent().next().hide();
            } else {
                $(`#${id}`).prev().val(parseInt($(`#${id}`).prev().val()) - 1);
            }
        }
    }

    // dispalynone
    function changeDisplay(id) {
        if ($id = true) {
            $(`#${id}`).parent().parent().hide();
        } else {
            $(`#${id}`).parent().css('display', 'block');
        }
    }

</script>
<!-------------------------------------مشخصات آدرس شما----------------------------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center;padding:30px">
    <br>
    <div class="alert alert-danger" id="errorrigg" style="display: none">
        tamam fild ha por she
    </div>
    <h1 class="h1dastebandi SansBold">مشخصات آدرس شما</h1>


    <br>
    <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52"></div>
    <br><br><br>

    <?php
    $select = $db::Query("SELECT * FROM address where addressUserId='$shbUserId'");
    if(mysqli_num_rows($select)>0){
    ?>


    <div class="
    col-lg-offset-4
    col-md-offset-4
    col-xs-offset-4
    col-sm-offset-4
    col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans " style="font-size: 17px;">

        <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8 pull-right">
            <select dir="rtl" id="adr" class="inputmoshakhasat pull-right" onchange="getAddreses()">
                <option disabled selected>
                    انتخاب آدرس
                </option>
                <?php
                while ($row = mysqli_fetch_assoc($select)) {
                    ?>
                    <option value="<?php echo $row['addressId'] ?>"><?php echo $row['addressText'] ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4 pull-left" >
                <input type="button" onclick="$('#submitAddress').show()" class="btn btn-success pull-left" style="position: relative;bottom: 6px;" value="اضافه کردن آدرس جدید">
            </div>
        </div>
        <?php
        }
        ?>
        <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4 pull-left" >
            <a href=../davin/l"></a>
            <input type="button"  class="btn btn-success pull-left" style="position: relative;bottom: 6px;" value="ابتدا وارد شوید">
        </div>
    </div>

    <script>
        function getAddreses() {
            var adr = $("#adr").val();
            $.ajax({
                url: "request/getAdres.php",
                data: {
                    addresId: adr
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    if (!data['error']) {
                        $("#dis1").show();
                        $("#dis3").show();
                        $("#cityName").html(data['cityName']);
                        $("#provinceName").html(data['provinceName']);
                        $("#addressText").html(data['addressText']);
                        $("#postCode").html(data['postCode']);
                    }
                }
            });
        }
    </script>
    <div id="submitAddress" style="display: none" class="col-md-12 col-xs-12 col-sm-12 col-lg-12">

        <div class="container">

            <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans" style="font-size: 17px;">
                <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8">
                    <input id="postCodeText" type="number" class="inputmoshakhasat">
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4">
                    <p>کد پستی</p>
                </div>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans" style="font-size: 17px;">
                <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8">
                    <select id="city" class="inputmoshakhasat">
                        <option selected disabled> شهر خود را انتخاب کنید</option>
                        <option disabled>ابتدا استان مورد نظر را انتخاب کنید</option>
                    </select>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4">
                    <p>شهر</p>
                </div>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans" style="font-size: 17px;">
                <div class="col-xs-8 col-sm-8 col-lg-8 col-md-8">
                    <select id="province" onchange="getCity()" class="inputmoshakhasat">
                        <option selected disabled>استان خود را انتخاب کنید</option>
                        <?php

                        $select2 = $db::Query("SELECT * FROM province");
                        while ($fetch = mysqli_fetch_assoc($select2)) {
                            ?>
                            <option value="<?php echo $fetch['provinceId'] ?>"><?php echo $fetch['provinceName'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4 col-md-4">
                    <p>استان</p>
                </div>
            </div>
            <script>
                function getCity() {
                    var province = $("#province").val();
                    $.ajax({
                        url: "request/getCity.php",
                        data: {
                            provinceId: province
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            if (!data['error']) {
                                $("#city").html(" <option selected disabled>استان خود را انتخاب کنید</option>");
                                for (var i = 0; i < data['city'].length; i++) {
                                    $("#city").append('<option value="' + data['city'][i]['id'] + '">' + data['city'][i]['name'] + '</option>');
                                }
                            }
                        }
                    });
                }
            </script>
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12  IRANSans"
                 style="    direction: rtl;
    text-align: right;
    float: right;
    margin-right: 23px;
    font-size: 17px;
    margin-top: 20px;">

                <div class="col-xs-11 col-sm-11 col-lg-11 col-md-11">

                    <input id="ady" type="text" style="width:98%;background-color: #f3f3f3;border: 0;height: 100px;padding: 2%">
                </div>
                <div class="col-xs-1 col-sm-1 col-lg-1 col-md-1">

                    <p>آدرس</p>
                </div>
            </div>

            <input type="button" class="btn btn-primary"
                   style="margin-top: 20px" onclick="submit()" value="ثبت آدرس جدید">
        </div>
    </div>

</div>



<script>
    function submit() {
        var postCode = $("#postCodeText").val();
        var province = $("#province").val();
        var city = $("#city").val();
        var ady = $("#ady").val();

        $.ajax({
            url: "request/addAdres.php",
            data: {
                postCode: postCode,
                province: province,
                city: city,
                ady: ady,

            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data["error"]) {
                    $("#errorrigg").show("fast").html(data['MSG']);
                } else {
                    $("#dis1").show();
                    $("#dis3").show();
                    $("#cityName").html(city);
                    $("#provinceName").html(province);
                    $("#addressText").html(ady);
                    $("#postCode").html(postCode);
                }
            }
        });

    }
</script>

<!------------------------------------------------تاییدیه سبد خرید----------------------------------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center;padding:30px;display: none" id="dis1">
    <h1 class="h1dastebandi SansBold">تاییدیه سبد خرید</h1>
    <br>

    <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1" style="float:none;margin: auto;background-color:#dc1a52"></div>
    <br><br>
    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12 IRANSans"
             style="background-color: #dc1a52;height: 60px;color: white;font-size:25px">
            <p style="margin-top: 14px">اطلاعات شخصی</p>
        </div>

        <div class="col-md-4 hidden-sm hidden-xs col-lg-4 IRANSans etelaat-shakhsi-item">
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p id="postCode"></p>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p>کد پستی</p>
            </div>
        </div>
        <div class="col-md-4 col-xs-6 col-sm-6 col-lg-4 IRANSans etelaat-shakhsi-item"
             style="border-right:1px solid #e7e7e7;border-left: 1px solid #e7e7e7;">
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p id="cityName"></p>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p>شهر</p>
            </div>
        </div>
        <div class="col-md-4 col-xs-6 col-sm-6 col-lg-4 IRANSans etelaat-shakhsi-item">
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p id="provinceName"></p>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <p>استان</p>
            </div>
        </div>


        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans"
             style="background-color:#f3f3f3;border-top: 1px solid #e7e7e7;text-align: right;padding-top: 17px;padding-bottom:40px;padding-right:92px;font-size:17px;">
            <p>آدرس</p>
            <p id="addressText" type="text"
               style="border: 0;background-color:#f3f3f3;width: 100%;text-align: right;direction: rtl"></p>
        </div>

    </div>
</div>
<!---------------------------------------محصولات سبد-------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
    var container = document.getElementById('image-container');

    function change_img(image) {
        container.src = image.src;
    }

    // plusss


</script>
<!---------------------------------------------پرداخت-------------------------------------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center" style="display: none" id="dis3">
    <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6 col-xs-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 IRANSans pardakht text-center">
        <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6"  onclick="payClick()" style="border-right: 3px solid;cursor: pointer">
            <input type="radio" name="pardakht" value="" style="display: none" >
            <img id="pay" src="IMG/checkBox.png" style="width: 30px">

            پرداخت درب منزل
        </div>

        <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6" style="cursor: pointer" onclick="onlineClick()">
            <img id="online" src="IMG/box.png"  style="width: 30px">
            <input type="radio" name="pardakht" value="" style="display: none">پرداخت آنلاین
        </div>
    </div>

    <script>
        function onlineClick() {
            $("#online").attr("src","IMG/checkBox.png");
            $("#pay").attr("src","IMG/box.png");
        }
        function payClick() {
            $("#pay").attr("src","IMG/checkBox.png");
            $("#online").attr("src","IMG/box.png");

        }

    </script>

    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center">

        <a href="zarinpal.php?price=<?php echo $laster ?>">

            <p type="button"  class="btn btn-primary SansBold"
               style="
           padding: 15px 50px;
           margin-bottom: 20px;
           font-size: 20px;
           margin-top: 20px
"
               id="dis4">
                تایید نهایی و پرداخت
            </p>
        </a>

    </div>
</div>
<br>
<br>
<br>
<br>
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
