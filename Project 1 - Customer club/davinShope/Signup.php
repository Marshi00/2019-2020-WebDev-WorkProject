<?php
include "inc/header.php";
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<!--Navbar-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="line92"></div>
<!--heading-->

<div class="gradi col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
<div class="sabt" id="login">
    <img id="img-davin-icon" src="img/2ddavin.png" alt="">
    <h3 id="name3">ثبت نام حساب کاربری</h3>
    <div class="border-botton1"></div>
    <br>
    <div class="alert alert-danger" id="pru" style="display: none">
        tamam fild ha por she
    </div>
    <div class="alert alert-success" id="prd" style="display: none">
        ثبت با موفقیت انجام شد.
    </div>

    <div class="parent-input">
        <input class="input-number" type="text" placeholder="نام کاربری" id="userName">
        <input class="input-number" type="tel" placeholder="شماره موبایل" id="phoneNumber">
        <input class="input-number" type="email" placeholder="ایمیل" id="userEmail">
        <input class="input-number" type="password" placeholder=" رمز عبور" id="userPassword">
        <input class="input-number" type="password" placeholder="تکرار رمز عبور" id="confirm_password">
        <p id='message'></p>

    </div>


    <div>
        <button class="button1" type="submit" onclick="submit()" n>ثبت نام</button>
    </div>
    <div>
        <button class="button2" type="button">انصراف</button>
    </div>
    <h1 class="h1-link" style="display: inline-flex;color: #2F358F;">اگر کاربر جدید هستید <p onclick="dani()" class="a-new-user">ساخت حساب کاربری کلیک کنید</p></h1>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
<script>



    function submit() {
        var userName = $("#userName").val();
        var phoneNumber = $("#phoneNumber").val();
        var userEmail = $("#userEmail").val();
        var userPassword = $("#userPassword").val();

        if (document.getElementById('userPassword').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').style.backgroundColor = '#ddd8d8';
            document.getElementById('message').style.fontSize = '30px';
            document.getElementById('message').style.borderRadius = '25px';
            document.getElementById('message').innerHTML = 'پسورد یکسان';

        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').style.backgroundColor = '#ddd8d8';
            document.getElementById('message').style.fontSize = '30px';
            document.getElementById('message').style.borderRadius = '25px';
            document.getElementById('message').innerHTML = 'پسورد ها یکسان نیستند';
            return;
        }


        $.ajax({
            url:"request/adduser.php",
            data:{
                userName:userName,
                phoneNumber:phoneNumber,
                userEmail:userEmail,
                userPassword:userPassword,
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if (data["error"]){
                    $("#pru").show("fast").html(data['MSG']);


                }else  {
                    $("#prd").show("fast");
                }
            }
        });

    }
</script>

<script>
    function dani() {
        alert("");
        $.ajax({
            data:{},
            type:"get",
            url:"",
            success:function (zangene) {
                alert("");
            }
        })
    }
</script>
























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
