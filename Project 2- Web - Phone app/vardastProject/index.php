<?php
include "varWebSite.php";
$A = new varWebSite();
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <title>صفحه اصلی</title>
    <meta charset="UTF-8">
    <link href="CSS/MYstyle.css" rel="stylesheet">
    <link href="CSS/2.css" rel="stylesheet">
    <link href="CSS/bootstrap.css" rel="stylesheet">
    <link href="CSS/all.css" rel="stylesheet">
    <link href="CSS/notiflix-1.8.0.css" rel="stylesheet"/>
    <script src="JS/notiflix-1.8.0.js"></script>
    <script src="JS/jquery.js"></script>
    <script src="JS/bootstrap.js"></script>
    <!---------------------SLIDER------------------>
    <link rel="stylesheet" href="CSS/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="CSS/owl.carousel.min.css">
    <link rel="stylesheet" href="CSS/owl.theme.min.css">
    <script src="JS/qqq.js"></script>
</head>
<body>
<!------------------------header------------------------>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 10px 0">
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans div-vorood">
        <a data-toggle="modal" data-target="#voroodd">
        <img src="IMG/vorood.svg" class="button-vorood img-green-vorood" >
        <span class="text-vorood">ورود</span>
        </a>
         <!-----------برای ورود یا ثبت نام...------>
         <div id="voroodd" class="modal fade IRANSans" role="dialog">
             <div class="modal-dialog">
                 <div class="text-modal-vorood">
                     <br>
                     <span class="closeBtn close" data-dismiss="modal">&times;</span>
                     <h4>برای ورود شماره موبایل خود را وارد کنید</h4>
                     <div class="form-wrapper" style="margin-top: 2rem">
                         <form action="" class="form Fstyle">
                             <div class="form-group">
                                 <label class="form-label" for="first">شماره موبایل</label>
                                 <input id="phone" class="form-input number-input" type="tel" />
                             </div>
                         </form>
                         <form action="" class="form Fstyle">
                             <div class="form-group">
                                 <label class="form-label" for="firstt">رمز عبور</label>
                                 <input id="pass" class="form-input number-input" type="password"  />
                             </div>
                         </form>
                     </div>
                     <br>
                     <a class="ramz-q" data-dismiss="modal" data-toggle="modal" data-target="#phoneN"><p>رمز عبور خود را فراموش کرده اید؟</p></a>
                     <a class="sabteNam" data-dismiss="modal" data-toggle="modal" data-target="#phoneN2"><p>ثبت نام</p></a>
                     <a onclick="CheckLogIn()"><button class="IRANSans edameBtn" >ورود به سایت</button></a>
                     </div>
                 <script>
                     function CheckLogIn() {
                         var phone = $('#phone').val();
                         var pass = $('#pass').val();

                         if (phone == '') {
                             document.getElementById('phone').style.border = '2px solid red';
                             let inputTimeOut = setTimeout(function () {
                                 document.getElementById('phone').style.borderColor = '#ced4da';
                                 document.getElementById('phone').style.borderWidth = '1px';
                                 clearTimeout(
                                     inputTimeOut
                                 );
                             }, 1500);
                             Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                             return;
                         }
                         if (pass == '') {
                             document.getElementById('pass').style.border = '2px solid red';
                             let inputTimeOut = setTimeout(function () {
                                 document.getElementById('pass').style.borderColor = '#ced4da';
                                 document.getElementById('pass').style.borderWidth = '1px';
                                 clearTimeout(
                                     inputTimeOut
                                 );
                             }, 1500);
                             Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                             return;
                         }

                         Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                             'بله', 'خیر',
                             function () {// Yes button callback
                                 $.ajax({
                                     url: "1-5websiteLogin.php",
                                     data: {
                                         PhoneNumber: phone,
                                         Password: pass,
                                     },
                                     dataType: "json",
                                     type: "POST",
                                     success: function (jsonData) {
                                         if (jsonData['error']) {
                                             Notiflix.Notify.Failure(jsonData['MSG']);

                                         } else {
                                             Notiflix.Notify.Success(jsonData['MSG']);
                                             $('#voroodd').modal('hide');
                                         }
                                     }
                                 });
                             },
                             function () { // No button callback
                                 return;
                             }
                         );


                     }

                 </script>
                 </div>
             </div>
         <!----VRUD------------------------------------------------------->
         <!-----------شماره خود را وارد کنید-------->
         <div id="phoneN" class="modal fade IRANSans" role="dialog">
             <div class="modal-dialog">
                 <div class="text-modal-vorood">
                     <br>
                     <span class="closeBtn close" data-dismiss="modal">&times;</span>
                     <div class="flex-am" style="margin-top: 2rem">
                         <div class="parent-input-code">
                             <div class="form-wrapper">
                                 <form action="" class="form ">
                                     <div class="form-group">
                                         <label class="form-label label23" for="phone2">شماره خود را وارد کنید</label>
                                         <input id="phone2" class="form-input number-input " style="width: 300px" type="tel" />
                                     </div>
                                 </form>
                             </div>
                             <button onclick="CheckNumber1()"  class="IRANSans daryaft-code"  >ادامه </button>
                         </div>
                     </div>
                 </div>
             </div>
             <script>
                 function CheckNumber1() {
                     var phone2 = $('#phone2').val();

                     if (phone2 == '') {
                         document.getElementById('phone2').style.border = '2px solid red';
                         let inputTimeOut = setTimeout(function () {
                             document.getElementById('phone2').style.borderColor = '#ced4da';
                             document.getElementById('phone2').style.borderWidth = '1px';
                             clearTimeout(
                                 inputTimeOut
                             );
                         }, 1500);
                         Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                         return;
                     }

                     Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                         'بله', 'خیر',
                         function () {// Yes button callback
                             $.ajax({
                                 url: "1-4websiteLogin.php",
                                 data: {
                                     phoneNumber: phone2,
                                 },
                                 dataType: "json",
                                 type: "POST",
                                 success: function (jsonData) {
                                     if (jsonData['error']) {
                                         Notiflix.Notify.Failure(jsonData['MSG']);

                                     } else {
                                         Notiflix.Notify.Success(jsonData['MSG']);
                                         $('#phoneN').modal('hide');
                                         $('#code-Dastresi').modal('show');


                                     }
                                 }
                             });
                         },
                         function () { // No button callback
                             return;
                         }
                     );


                 }

             </script>
         </div>
        <!-----------کد دسترسی برای رمز عبور مجدد...-------->
         <div id="code-Dastresi" class="modal fade IRANSans" role="dialog">
             <div class="modal-dialog">
                 <div class="text-modal-vorood">
                     <br>
                     <span class="closeBtn close" data-dismiss="modal">&times;</span>
                     <div class="flex-am" style="margin-top: 2rem">
                         <div class="parent-input-code">
                             <div class="form-wrapper">
                                 <form action="" class="form ">
                                     <div class="form-group">
                                         <label class="form-label label23" for="fouri">کد دسترسی</label>
                                         <input id="code22" class="form-input number-input " style="width: 300px" type="text" />
                                     </div>
                                 </form>
                             </div>
                             <button onclick="CheckNumber()" class="IRANSans daryaft-code" >تایید </button>
                         </div>
                     </div>
                 </div>
             </div>
             <script>
                 function CheckNumber() {
                     var phone2 = $('#phone2').val();
                     var code22 = $('#code22').val();

                     if (code22 == '') {
                         document.getElementById('code22').style.border = '2px solid red';
                         let inputTimeOut = setTimeout(function () {
                             document.getElementById('code22').style.borderColor = '#ced4da';
                             document.getElementById('code22').style.borderWidth = '1px';
                             clearTimeout(
                                 inputTimeOut
                             );
                         }, 1500);
                         Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                         return;
                     }

                     Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                         'بله', 'خیر',
                         function () {// Yes button callback
                             $.ajax({
                                 url: "1-2websiteLogin.php",
                                 data: {
                                     phoneNumber: phone2,
                                     code: code22,
                                 },
                                 dataType: "json",
                                 type: "POST",
                                 success: function (jsonData) {
                                     if (jsonData['error']) {
                                         Notiflix.Notify.Failure(jsonData['MSG']);

                                     } else {
                                         Notiflix.Notify.Success(jsonData['MSG']);
                                         $('#code-Dastresi').modal('hide');
                                         $('#Ramz-OBUR').modal('show');


                                     }
                                 }
                             });
                         },
                         function () { // No button callback
                             return;
                         }
                     );


                 }

             </script>
         </div>
        <!-----------رمز عبور جدید...------->
         <div id="Ramz-OBUR" class="modal fade IRANSans" role="dialog">
             <div class="modal-dialog">
                 <div class="text-modal-vorood">
                     <br>
                     <span class="closeBtn close" data-dismiss="modal">&times;</span>
                     <div class="flex-am" style="margin-top: 2rem">
                         <div class="parent-input-code">
                             <div class="form-wrapper">
                                 <form action="" class="form">
                                     <div class="form-group">
                                         <label class="form-label label23" for="fourii">رمز عبور جدید</label>
                                         <input id="fourii" class="form-input number-input " style="width: 300px" type="password" />
                                     </div>
                                 </form>
                                 <form action="" class="form">
                                     <div class="form-group">
                                         <label class="form-label label23" for="fourix">تکرار عبور جدید</label>
                                         <input id="fourix" class="form-input number-input " style="width: 300px" type="password" />
                                     </div>
                                 </form>
                             </div>
                             <button onclick="passwords()" class="IRANSans daryaft-code">تایید </button>
                         </div>
                     </div>
                 </div>
             </div>
             <script>
                 function passwords() {
                     var phone2 = $('#phone2').val();
                     var fourii = $('#fourii').val();
                     var fourix = $('#fourix').val();
                     if (fourii == '') {
                         document.getElementById('fourii').style.border = '2px solid red';
                         let inputTimeOut = setTimeout(function () {
                             document.getElementById('fourii').style.borderColor = '#ced4da';
                             document.getElementById('fourii').style.borderWidth = '1px';
                             clearTimeout(
                                 inputTimeOut
                             );
                         }, 1500);
                         Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                         return;
                     }
                     if (fourii != fourix) {
                         document.getElementById('fourii').style.border = '2px solid red';
                         let inputTimeOut = setTimeout(function () {
                             document.getElementById('fourii').style.borderColor = '#ced4da';
                             document.getElementById('fourii').style.borderWidth = '1px';
                             clearTimeout(
                                 inputTimeOut
                             );
                         }, 1500);
                         Notiflix.Notify.Failure('پسورد ها یکسان نیستند');
                         return;
                     }

                     Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                         'بله', 'خیر',
                         function () {// Yes button callback
                             $.ajax({
                                 url: "1-6websiteLogin.php",
                                 data: {
                                     phoneNumber: phone2,
                                     password: fourii,
                                 },
                                 dataType: "json",
                                 type: "POST",
                                 success: function (jsonData) {
                                     if (jsonData['error']) {
                                         Notiflix.Notify.Failure(jsonData['MSG']);

                                     } else {
                                         Notiflix.Notify.Success(jsonData['MSG']);
                                         $('#Ramz-OBUR').modal('hide');
                                         $('#voroodd').modal('show');

                                     }
                                 }
                             });
                         },
                         function () { // No button callback
                             return;
                         }
                     );


                 }

             </script>
         </div>
        <!----SABTNAM------------------------------------------------------->
        <!-----------شماره خود را وارد کنید...-------->
        <div id="phoneN2" class="modal fade IRANSans" role="dialog">
            <div class="modal-dialog">
                <div class="text-modal-vorood">
                    <br>
                    <span class="closeBtn close" data-dismiss="modal">&times;</span>
                    <div class="flex-am" style=";margin-top: 2rem">
                        <div class="parent-input-code">
                            <div class="form-wrapper">
                                <form action="" class="form">
                                    <div class="form-group">
                                        <label class="form-label label23" for="three2"> شماره خود را وارد کنید</label>
                                        <input id="three2" class="form-input number-input " style="width: 300px" type="tel" />
                                    </div>
                                </form>
                            </div>
                            <br>
                           <button onclick="CheckNumber2()" class="IRANSans daryaft-code">ادامه</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function CheckNumber2() {
                    var three2 = $('#three2').val();

                    if (three2 == '') {
                        document.getElementById('three2').style.border = '2px solid red';
                        let inputTimeOut = setTimeout(function () {
                            document.getElementById('three2').style.borderColor = '#ced4da';
                            document.getElementById('three2').style.borderWidth = '1px';
                            clearTimeout(
                                inputTimeOut
                            );
                        }, 1500);
                        Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                        return;
                    }

                    Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                        'بله', 'خیر',
                        function () {// Yes button callback
                            $.ajax({
                                url: "1-1websiteLogin.php",
                                data: {
                                    phoneNumber: three2,
                                },
                                dataType: "json",
                                type: "POST",
                                success: function (jsonData) {
                                    if (jsonData['error']) {
                                        Notiflix.Notify.Failure(jsonData['MSG']);

                                    } else {
                                        Notiflix.Notify.Success(jsonData['MSG']);
                                        $('#phoneN2').modal('hide');
                                        $('#code-Dastresi2').modal('show');

                                    }
                                }
                            });
                        },
                        function () { // No button callback
                            return;
                        }
                    );


                }

            </script>
        </div>
        <!-----------کد دسترسی مجدد...-------->
        <div id="code-Dastresi2" class="modal fade IRANSans" role="dialog">
            <div class="modal-dialog">
                <div class="text-modal-vorood">
                    <br>
                    <span class="closeBtn close" data-dismiss="modal">&times;</span>
                    <div class="flex-am" style="margin-top: 2rem">
                        <div class="parent-input-code">
                            <div class="form-wrapper">
                                <form action="" class="form">
                                    <div class="form-group">
                                        <label class="form-label label23" for="four2">کد دسترسی را وارد کنید</label>
                                        <input id="four2" class="form-input number-input " style="width: 300px" type="tel" />
                                    </div>
                                </form>
                            </div>
                            <button onclick="CheckCode2()" class="IRANSans daryaft-code" >ادامه </button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function CheckCode2() {
                    var three2 = $('#three2').val();
                    var four2 = $('#four2').val();

                    if (four2 == '') {
                        document.getElementById('four2').style.border = '2px solid red';
                        let inputTimeOut = setTimeout(function () {
                            document.getElementById('four2').style.borderColor = '#ced4da';
                            document.getElementById('four2').style.borderWidth = '1px';
                            clearTimeout(
                                inputTimeOut
                            );
                        }, 1500);
                        Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                        return;
                    }

                    Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                        'بله', 'خیر',
                        function () {// Yes button callback
                            $.ajax({
                                url: "1-2websiteLogin.php",
                                data: {
                                    phoneNumber: three2,
                                    code: four2,
                                },
                                dataType: "json",
                                type: "POST",
                                success: function (jsonData) {
                                    if (jsonData['error']) {
                                        Notiflix.Notify.Failure(jsonData['MSG']);

                                    } else {
                                        Notiflix.Notify.Success(jsonData['MSG']);
                                        $('#code-Dastresi2').modal('hide');
                                        $('#vrood-inf').modal('show');

                                    }
                                }
                            });
                        },
                        function () { // No button callback
                            return;
                        }
                    );


                }

            </script>
        </div>
        <!-----------اطلاعات خود را وارد کنید...-------->
         <div id="vrood-inf" class="modal fade IRANSans" role="dialog">
             <div class="modal-dialog">
                 <div class="text-modal-vorood">
                     <br>
                     <span class="closeBtn close" data-dismiss="modal">&times;</span>
                     <h3>اطلاعات خود را وارد کنید</h3>
                     <div class="parent-input-nam">
                         <div class="form-wrapper">
                             <form action="" class="form ">
                                 <div class="form-group">
                                     <label class="form-label label23" for="five">نام </label>
                                     <input id="five" class="form-input number-input " style="width: 300px" type="tel" />
                                 </div>
                             </form>
                         </div>
                         <div class="form-wrapper">
                             <form action="" class="form">
                                 <div class="form-group">
                                     <label class="form-label label23" for="lastName">نام خانوادگی</label>
                                     <input id="lastName" class="form-input number-input " style="width: 300px" type="tel" />
                                 </div>
                             </form>
                         </div>
                         <div class="form-wrapper">
                             <form action="" class="form">
                                 <div class="form-group">
                                     <label class="form-label label23" for="six">رمز عبور</label>
                                     <input id="six" class="form-input number-input " style="width: 300px" type="password" />
                                 </div>
                             </form>
                         </div>
                         <div class="form-wrapper">
                             <form action="" class="form">
                                 <div class="form-group">
                                     <label class="form-label label23" for="seven">تکرار رمز عبور</label>
                                     <input id="seven" class="form-input number-input " style="width: 300px" type="password" />
                                 </div>
                             </form>
                         </div>
                         <div class="form-wrapper">
                             <form action="" class="form">
                                 <div class="form-group ">
                                 <label class="form-label label23 control-label myLabel" for="datepicker4"></label>
                                 <div class="controls">
                                     <input type="text" id="datepicker4" class="number-input" placeholder="تاریخ تولد" style="width: 300px" />
                                 </div>
                                 </div>
                             </form>
                         </div>
<!--                         <a href="index.php">-->
                             <button  onclick="submitUserData()" class="IRANSans daryaft-code"   style="font-size: 20px;margin-top: 4rem;">ذخیره اطلاعات</button>
                         </a>
                     </div>
                 </div>
             </div>
             <script>
                 function submitUserData() {
                     var three2 = $('#three2').val();
                     var five = $('#five').val();
                     var lastName = $('#lastName').val();
                     var datepicker4 = $('#datepicker4').val();
                     var six = $('#six').val();
                     var seven = $('#seven').val();

                     if (five == '') {
                         document.getElementById('five').style.border = '2px solid red';
                         let inputTimeOut = setTimeout(function () {
                             document.getElementById('five').style.borderColor = '#ced4da';
                             document.getElementById('five').style.borderWidth = '1px';
                             clearTimeout(
                                 inputTimeOut
                             );
                         }, 1500);
                         Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                         return;
                     }
                     if (lastName == '') {
                         document.getElementById('lastName').style.border = '2px solid red';
                         let inputTimeOut = setTimeout(function () {
                             document.getElementById('lastName').style.borderColor = '#ced4da';
                             document.getElementById('lastName').style.borderWidth = '1px';
                             clearTimeout(
                                 inputTimeOut
                             );
                         }, 1500);
                         Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                         return;
                     }
                     if (datepicker4 == '') {
                         document.getElementById('datepicker4').style.border = '2px solid red';
                         let inputTimeOut = setTimeout(function () {
                             document.getElementById('datepicker4').style.borderColor = '#ced4da';
                             document.getElementById('datepicker4').style.borderWidth = '1px';
                             clearTimeout(
                                 inputTimeOut
                             );
                         }, 1500);
                         Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                         return;
                     }
                     if (six == '') {
                         document.getElementById('six').style.border = '2px solid red';
                         let inputTimeOut = setTimeout(function () {
                             document.getElementById('six').style.borderColor = '#ced4da';
                             document.getElementById('six').style.borderWidth = '1px';
                             clearTimeout(
                                 inputTimeOut
                             );
                         }, 1500);
                         Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                         return;
                     }
                     if (seven == '') {
                         document.getElementById('seven').style.border = '2px solid red';
                         let inputTimeOut = setTimeout(function () {
                             document.getElementById('seven').style.borderColor = '#ced4da';
                             document.getElementById('seven').style.borderWidth = '1px';
                             clearTimeout(
                                 inputTimeOut
                             );
                         }, 1500);
                         Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                         return;
                     }
                     if (six != seven) {
                         document.getElementById('six').style.border = '2px solid red';
                         let inputTimeOut = setTimeout(function () {
                             document.getElementById('six').style.borderColor = '#ced4da';
                             document.getElementById('six').style.borderWidth = '1px';
                             clearTimeout(
                                 inputTimeOut
                             );
                         }, 1500);
                         Notiflix.Notify.Failure('پسورد ها یکسان نیستند');
                         return;
                     }

                     Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                         'بله', 'خیر',
                         function () {// Yes button callback
                             $.ajax({
                                 url: "1-3websiteLogin.php",
                                 data: {
                                     PhoneNumber: three2,
                                     Name: five,
                                     LastName: lastName,
                                     dateOfBirth: datepicker4,
                                     Password: six,
                                 },
                                 dataType: "json",
                                 type: "POST",
                                 success: function (jsonData) {
                                     if (jsonData['error']) {
                                         Notiflix.Notify.Failure(jsonData['MSG']);

                                     } else {
                                         Notiflix.Notify.Success(jsonData['MSG']);
                                         $('#vrood-inf').modal('hide');


                                     }
                                 }
                             });
                         },
                         function () { // No button callback
                             return;
                         }
                     );


                 }

             </script>
         </div>
         <!------------------------------------------------------->
        <a>
            <img src="IMG/mobile-icon.svg" class="icon-mobile">
        </a>
    </div>
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">

    </div>
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 div-logo">
      <a href="index.php">
        <img src="IMG/vorood.svg" class="back-logo">
        <img src="IMG/logo-white.svg" class="logo-white">
      </a>
    </div>
</div>
<!------------------------MEGA-menu-------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
     <nav class="nav-bar">
         <ul>
             <li>mega1
                 <div class="mega-menu">
                   <div class="inner-mega-menu">
                       <a><p>mga1</p></a>
                       <a><p>mga2</p></a>
                       <a><p>mga3</p></a>
                       <a><p>mga4</p></a>
                       <a><p>mga5</p></a>
                   </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>


                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>
               </div>
             </li>

             <li>mega5
                 <div class="mega-menu">
                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>


                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>
                 </div>
             </li>
             <li>mega6
                 <div class="mega-menu">
                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>


                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>
                 </div>
             </li>
             <li>mega7
                 <div class="mega-menu">
                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>


                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>
                 </div>
             </li>
             <li>mega8
                 <div class="mega-menu">
                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>


                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>
                 </div>
             </li>
             <li>mega9
                 <div class="mega-menu">
                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>


                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>
                 </div>
             </li>
             <li>mega10
                 <div class="mega-menu">
                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>


                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>

                     <div class="inner-mega-menu">
                         <a><p>mga1</p></a>
                         <a><p>mga2</p></a>
                         <a><p>mga3</p></a>
                         <a><p>mga4</p></a>
                         <a><p>mga5</p></a>
                     </div>
                 </div>
             </li>
         </ul>
     </nav>
   </div>
<!------------------------MEGA-menu-------------------->
<!--------------------------جستجو--------------------->
<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" id="content" style="padding: 0">
    <div style="padding: 0; display: flex;flex-direction: column;justify-content: center;align-items: center;">
    <img src="IMG/back-orang.png" class="img-orange" id="img">
    <div class="mysearch-input IRANSans">
       <h2>بهترین متخصصان ما در کنار شما</h2>
       <h2>خدمات مطمئن و با کیفیت</h2>
        <br>
        <!----------------->
        <form autocomplete="off" action="/action_page.php" style="position: relative;">
            <div class="autocomplete" style="width:370px;color: black">
                <input id="myInput" type="text" class="searchib navsearch" name="" placeholder="جستجو بین خدمات">
                <a><img class="search-icon" src="IMG/search-icon22.png"></a>
                <button class="loc-btnnn">
                    <img src="IMG/cursor.png" class="cursorW">
                    اهواز
                </button>
                <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" id="searchResult" style="background-color: white;display: none;position: absolute;">

                </div>
            </div>
            <!--<input type="submit">-->
        </form>
        <!----------------->
    </div>
</div>
    <script>
        $("#myInput").on("keydown keyup copy delete paste",function () {
            var search = $("#myInput").val();
            $("#searchResult").html('');

            $.ajax({
                url: "search.php",
                data:{
                    search:search
                },
                dataType:"json",
                type:"POST",
                success : function (data) {
                    if(data['subCat'].length > 0){
                        $("#searchResult").show('fast');


                        for (var i=0;i<data['subCat'].length;i++){
                        $("#searchResult").append('<a class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding: 10px 0;border-bottom:1px solid #e4e4e4" href="page1.php?id='+data['subCat'][i]['id']+'">' +
                            '<img src="../Management/Management/upload/'+data['subCat'][i]['subCatImg']+'.jpg" style="width: 50px"> ' +
                            ''+data['subCat'][i]['subcategory']+'</a>');
                    }
                    }else{
                        $("#searchResult").hide('fast');

                    }
                }
            });

        });

    </script>
</div>
<!--------------------------دایره ها-------------------->
<script>
    function showModal(id) {
        $("#kitty"+id).click();
    }
</script>
<div class="allCorlee SansBold">
    <?php
    $getCatCircles=$A->Query("SELECT * FROM category WHERE Status='1'");
    while ($rowCatCircles = mysqli_fetch_assoc($getCatCircles)){
    ?>
    <div class="childFive " data-toggle="modal" data-target="#myModal" onclick="showModal('<?php echo $rowCatCircles['id']?>')" >
            <div class="imgAll">
            <img src="../Management/Management/upload/<?php echo $rowCatCircles['img']?>.jpg" alt="">
                </div>
            <h3>
                <?php echo $rowCatCircles['category']?></h3>
    </div>
      <?php
            }
            ?>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <div class="modal-content">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans tab-circle " >
        <div class="">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">

                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 bhoechie-tab-menu" >
                        <?php
                        $getCatModal=$A->Query("SELECT * FROM category WHERE Status='1'");
                        while ($rowCatModal = mysqli_fetch_assoc($getCatModal)){
                        ?>
                        <div class="list-group">
                            <button id="kitty<?php echo $rowCatModal['id']?>" onclick="getli('<?php echo $rowCatModal['id'] ?>')" value="<?php echo $rowCatModal['id'] ?>" class="list-group-item active text-center">
                                <div class="flex-of">
                                    <img src="../Management/Management/upload/<?php echo $rowCatModal['img']?>.jpg" class="img-category">
                                    <p class="p-gp1"><?php echo $rowCatModal['category']?></p>
                                </div>
                            </button>


                        </div>
                            <?php
                        }
                        ?>
                    </div>
                    <script>
                        function getli(id) {
                            var kitty = $("#kitty"+id).val();
                            $.ajax({
                                url:"ulKitty.php",
                                data: {
                                    kitty:kitty
                                },
                                dataType:'json',
                                type:'POST',
                                success:function (data) {
                                    if(!data['error']){
                                        $("#ulSub").html('<br/>');
                                        for (var i=0;i<data['subCat'].length;i++){
                                            $("#ulSub").append('<ul class="my-ul-style"><li><div class="myflex-style"><img src="../Management/Management/upload/'+data['subCat'][i]['subCatImg']+'.jpg " style="width:20%;"><a href="page1.php?id='+data['subCat'][i]['id']+'" target="_blank"><p class="tab-p">'+data['subCat'][i]['subcategory']+'</p></a></div></li></ul>');
                                        }
                                    }
                                }
                            })
                        }
                    </script>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 bhoechie-tab" style="padding: 0">
                        <!-- flight section -->
                        <div class="bhoechie-tab-content active">
                            <center id="ulSub" class="myflex-style2">
<!--                                <ul  class="my-ul-style">-->
<!--                                    <li></li>-->
<!---->
<!--                                </ul>-->
                            </center>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
         </div>
        </div>
    </div>

</div>
<!----------------پرکاربردترین ها----------------------->
<div class="demo">
    <div class="container">
        <div class="row" style="position: relative;">
            <div id="testimonial-slider" class="owl-carousel">
                <!----->
                <?php
                $mostFrequent=$A->Query("SELECT * from orderlist WHERE status='2'GROUP BY subcategoryId ORDER BY COUNT(*) DESC LIMIT 8");
                while ($rowmostFrequent = mysqli_fetch_assoc($mostFrequent)) {
                    $mostFrequentSubId = $rowmostFrequent['subcategoryId'];
                    $mostFrequentSub = $A->Query("SELECT * FROM subcategory WHERE id='$mostFrequentSubId'");
                    while ($rowMostFrequentSubIdFetch = mysqli_fetch_assoc($mostFrequentSub)) {
                        ?>
                        <div class="testimonial">
                            <div class="testimonial-content">
                                <div class="pic">
                                    <img src="../Management/Management/upload/<?php echo $rowMostFrequentSubIdFetch['subCatImg']?>.jpg">
                                </div>
                                <span class="post"><?php echo $rowMostFrequentSubIdFetch['subcategory']?></span>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>

        </div>
    </div>
</div>
<!-------------------------------چرا وردست ؟--------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center">
    <br> <br>
    <div class="container">
        <h2 class="SansBold h2-porkarbord">چرا وردست؟</h2>
        <div class=" col-sm-1 col-xs-1 col-lg-1 col-md-1 khat"></div>
        <br><br><br><br>

        <!---------------------------------------------------------->
    <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6 mycard">
        <img src="IMG/cleaner_filled@2x.png" class="cleaner-img">
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center IRANSans back-white">
            <div class="text-center div-h2-mycard">
              <h2 class="h2-mycard SansBold">قابل برنامه ریزی</h2>
           </div>
            <div class="div-p-mycard" >
               <p class="p-mycard">لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم </p>
            </div>
        </div>
    </div>
    <!---------------------------------------------------------->

        <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6 mycard">
            <img src="IMG/cleaner_filled@2x.png" class="cleaner-img">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center IRANSans back-white">
                <div class="text-center div-h2-mycard">
                    <h2 class="h2-mycard SansBold">قابل برنامه ریزی</h2>
                </div>
                <div class="div-p-mycard" >
                    <p class="p-mycard">لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم </p>
                </div>
            </div>
        </div>
        <!---------------------------------------------------------->
        <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6 mycard">
            <img src="IMG/cleaner_filled@2x.png" class="cleaner-img">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center IRANSans back-white">
                <div class="text-center div-h2-mycard">
                    <h2 class="h2-mycard SansBold">قابل برنامه ریزی</h2>
                </div>
                <div class="div-p-mycard" >
                    <p class="p-mycard">لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم </p>
                </div>
            </div>
        </div>
        <!---------------------------------------------------------->
        <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6 mycard">
            <img src="IMG/cleaner_filled@2x.png" class="cleaner-img">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center IRANSans back-white">
                <div class="text-center div-h2-mycard">
                    <h2 class="h2-mycard SansBold">قابل برنامه ریزی</h2>
                </div>
                <div class="div-p-mycard" >
                    <p class="p-mycard">لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم </p>
                </div>
            </div>
        </div>
        <!---------------------------------------------------------->
        <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6 mycard">
            <img src="IMG/cleaner_filled@2x.png" class="cleaner-img">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center IRANSans back-white">
                <div class="text-center div-h2-mycard">
                    <h2 class="h2-mycard SansBold">قابل برنامه ریزی</h2>
                </div>
                <div class="div-p-mycard" >
                    <p class="p-mycard">لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم </p>
                </div>
            </div>
        </div>
        <!---------------------------------------------------------->
        <div class="col-md-4 col-xs-6 col-lg-4 col-sm-6 mycard">
            <img src="IMG/cleaner_filled@2x.png" class="cleaner-img">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center IRANSans back-white">
                <div class="text-center div-h2-mycard">
                    <h2 class="h2-mycard SansBold">قابل برنامه ریزی</h2>
                </div>
                <div class="div-p-mycard" >
                    <p class="p-mycard">لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم لورم ایپسوم </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-----------------------خدمات ارایه شده در وردست---------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center" style="padding: 20px 60px">
    <br> <br>
    <div class="container">
        <h2 class="SansBold h2-porkarbord">خدمات ارایه شده در وردست</h2>
        <div class=" col-sm-3 col-xs-3 col-lg-3 col-md-3 khat"></div>
        <br><br>
        <!-------------------card1----->
        <?php
        $getCatCard=$A->Query("SELECT * FROM category WHERE Status='1'");
        while ($rowgetCatCard = mysqli_fetch_assoc($getCatCard)) {
            $getCatCardId=$rowgetCatCard['id'];

            ?>
            <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 khadamat-card">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans">
                    <img src="../Management/Management/upload/<?php echo $rowgetCatCard['img']?>.jpg" class="picCard">
                    <br><br>
                    <h4 class="h4-khadamat-card SansBold"><?php echo $rowgetCatCard['category'] ?></h4>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 khadamat-card2">
                        <?php
                        $getSubCard=$A->Query("SELECT * FROM subcategory WHERE categoryId='$getCatCardId' AND Status='1'");
                        while ($rowgetSubCard = mysqli_fetch_assoc($getSubCard)) {
                        ?>
                        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6 p-khadamat">
                            <a href="page1.php?=<?php echo $rowgetSubCard['id'] ?>"><p><?php echo $rowgetSubCard['subcategory'] ?></p></a>
                        </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>


    </div>
</div>
<!--------------------------اپلیکیشن وردست------------------------>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans" style="padding-top:80px">
    <div class="container">
        <h1 class="h1-div-app">اپلیکیشن مشتری وردست را دانلود کنید</h1>
   <br>
        <p class="p-div-app">خدمات مطمئن در وردست در اختیار شما می باشد</p>
     <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 div-app">
       <img src="IMG/green1.png" class="green1">
       <img src="IMG/green2.png" class="green2">
       <img src="IMG/mobile.svg" class="mobile">
    </div>
  <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 div-store" >
      <a href="#"><img src="IMG/apple-store@2x.png" class="apple-store"></a>
      <br><br>
      <a href="#"><img src="IMG/google-play@2x.png" class="google-play"></a>
  </div>
    </div>
</div>
<!-------------------------اگر متخصص هستی ملحق شو-------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans div-back-green">
    <!--<img src="IMG/back-green@2x.png" class="back-green">-->
    <div class="div-child-green">
        <div class="h1-back-green">
            <h1  style="font-size: 25px">اگر متخصص هستی ملحق شو</h1>
        </div>
        <div class="p-back-green">
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم با تولید سادگی نامفهوم با تولید سادگی نامفهوم با تولید سادگی نامفهوم با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.  </p>
        </div>
        <a href=""><div class="SansBold dl-app-btn">
            <p style="margin: 10px 0px;">دانلود اپلیکیشن متخصص</p>
        </div></a>
    </div>
</div>
<!-------------------------تماس با ما و ...------------------------>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 tamas-etc">
        <ul class="SansBold">
        <li><a href="#"> تماس با ما</a></li>
            <li><a href="#">درباره وردست</a></li>
          <li><a href="#">پشتیبانی </a></li>
          <li><a href="#">سوالات متداول </a></li>
         <li><a href="#">قوانین و مقررات</a></li>
        </ul>
</div>
<!-----------------------------------فوتر------------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:60px 25px">
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="text-align: center">
       <h3 class="SansBold text-social-media bigSizeHeader">در شبکه های اجتماعی وردست را دنبال کنید</h3>
        <br>
         <a href=""><img src="IMG/insta@2x.png" class="instagram-img"></a>
        <br> <br>
         <a href=""><img src="IMG/facebook@2x.png" class="facebook-img"></a>
        <br> <br>
         <a href=""><img src="IMG/whats@2x.png" class="whatsapp-img"></a>
        <br><br>
         <a href=""><img src="IMG/tweeter@2x.png" class="twitter-img"></a>
    </div>
    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="text-align: center">
        <h3 class="SansBold tamas-ba-ma bigSizeHeader">تماس با ما</h3>
        <br>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:16px 0">
             <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 IRANSans" style="padding: 0"><p class="text-address bigSize">اهواز بلوار پاسداران خیابان زاویه</p></div>
             <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3" style="padding: 0"><img src="IMG/location-pin@2x.png" class="location-pin"></div>
        </div>

        <!------------>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:16px 0">
             <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 IRANSans" style="padding: 0">
                 <p class="text-call bigSize">پشتیبانی و جذب متخصص : 02191009019</p>
                 <p class="text-call bigSize">اداری : 02191009019</p>
             </div>
             <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3" style="padding: 0">
                 <img src="IMG/call-answer@2x.png" class="call-answer">
             </div>
        </div>

        <!------------>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:16px 0">
            <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 IRANSans" style="padding: 0">
                <p class="mail-text bigSize">info @piratil.com</p>
            </div>
            <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3" style="padding: 0">
                <img src="IMG/mail@2x.png" class="mail-img">
            </div>
        </div>
    </div>
        <!------------>
    <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3" style="text-align:right">
        <div style="text-align: center">
        <img src="IMG/logo@2x.png" style="width:50%">
        <br>
        <img src="IMG/vardast@2x.png" style="width: 33%">
    </div>
    </div>
</div>
<!-----------------------------------حقوق------------------------>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans back-black">
<p>تمامی حقوق مادی و معنوی این سایت متعلق به شرکت پیراتیل می باشد</p>
</div>
<!--------------------------------------------------------------->
<script>

///////
    $(document).ready(function() {
         $("#content").css("height",$("#img").height()+"px");
         $("#searchResult").css("top",$("#myInput").height()+"px");
    });
    $(window).on('resize', function() {
        $("#content").css("height",$("#img").height()+"px");
    });
        $(document).ready(function () {
        let slider = $("#testimonial-slider");
        slider.owlCarousel({
            items:4,
            itemsDesktop:[1000,3],
            loop:true,
            itemsDesktopSmall:[979,2],
            itemsTablet:[768,2],
            itemsMobile:[650,1],
            pagination:true,
            navigation:true,
            navigationText:["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"]
        });
    });

</script>
<script src="JS/clndr/bootstrap-datepicker.min.js"></script>
<script src="JS/clndr/bootstrap-datepicker.fa.min.js"></script>
<script src="JS/MYjs.js"></script>
<script>
    $(document).ready(function() {
        $("#datepicker0").datepicker();

        $("#datepicker1").datepicker();
        $("#datepicker1btn").click(function(event) {
            event.preventDefault();
            $("#datepicker1").focus();
        })

        $("#datepicker2").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

        $("#datepicker3").datepicker({
            numberOfMonths: 3,
            showButtonPanel: true
        });

        $("#datepicker4").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy/m/d"
        });

        $("#datepicker5").datepicker({
            minDate: 0,
            maxDate: "+14D"
        });

        $("#datepicker6").datepicker({
            isRTL: true,
            dateFormat: "d/m/yy"
        });
    });
</script>

<script>
    Notiflix.Notify.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        timeout: 1500,
    });
</script>
<script>
    Notiflix.Confirm.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        cancelButtonBackground: "#ef2828",
    });
</script>
<script>
    //////////////animation login input////////////////

    $('input').focus(function(){
        $(this).parents('.form-group').addClass('focused');
    });

    $('input').blur(function(){
        var inputValue = $(this).val();
        if ( inputValue == "" ) {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    });
</script>
</body>
</html>