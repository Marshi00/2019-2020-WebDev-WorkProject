<?php
//
//session_start();
//if (isset($_SESSION['login']) && $_SESSION['login']==true && $_SESSION['user']='user'){
////    $_SESSION['login']=true;
//} else{?>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!---->
<!--<body >-->
<!---->
<!--<!-----------برای ورود یا ثبت نام...------>-->
<!--<div id="voroodd" class="modal fade IRANSans" role="dialog">-->
<!--    <div class="modal-dialog" style="padding-top:13%;">-->
<!--        <div class="text-modal-vorood">-->
<!--            <br>-->
<!--            <span class="closeBtn close" data-dismiss="modal" onclick="remBc()">&times;</span>-->
<!--            <h4>برای ورود شماره موبایل خود را وارد کنید</h4>-->
<!--            <div class="form-wrapper" style="margin-top: 2rem">-->
<!--                <form action="" class="form Fstyle">-->
<!--                    <div class="form-group">-->
<!--                        <label class="form-label" for="first">شماره موبایل</label>-->
<!--                        <input id="phone" class="form-input number-input" type="tel" />-->
<!--                    </div>-->
<!--                </form>-->
<!--                <form action="" class="form Fstyle">-->
<!--                    <div class="form-group">-->
<!--                        <label class="form-label" for="firstt">رمز عبور</label>-->
<!--                        <input id="pass" class="form-input number-input" type="password" />-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--            <br>-->
<!--            <a class="ramz-q" data-dismiss="modal" data-toggle="modal" data-target="#phoneN" onclick="reModal()"><p>رمز عبور خود را فراموش کرده اید؟</p></a>-->
<!--            <a class="sabteNam" data-dismiss="modal" data-toggle="modal" data-target="#phoneN2" onclick="reModal()"><p>ثبت نام</p></a>-->
<!--            <button onclick="CheckLogIn()" class="IRANSans edameBtn">ورود به سایت</button>-->
<!--        </div>-->
<!--        <script>-->
<!--            function CheckLogIn() {-->
<!--                var phone = $('#phone').val();-->
<!--                var pass = $('#pass').val();-->
<!---->
<!--                if (phone == '') {-->
<!--                    document.getElementById('phone').style.border = '2px solid red';-->
<!--                    let inputTimeOut = setTimeout(function () {-->
<!--                        document.getElementById('phone').style.borderColor = '#ced4da';-->
<!--                        document.getElementById('phone').style.borderWidth = '1px';-->
<!--                        clearTimeout(-->
<!--                            inputTimeOut-->
<!--                        );-->
<!--                    }, 1500);-->
<!--                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                    return;-->
<!--                }-->
<!--                if (pass == '') {-->
<!--                    document.getElementById('pass').style.border = '2px solid red';-->
<!--                    let inputTimeOut = setTimeout(function () {-->
<!--                        document.getElementById('pass').style.borderColor = '#ced4da';-->
<!--                        document.getElementById('pass').style.borderWidth = '1px';-->
<!--                        clearTimeout(-->
<!--                            inputTimeOut-->
<!--                        );-->
<!--                    }, 1500);-->
<!--                    Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                    return;-->
<!--                }-->
<!---->
<!--                Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',-->
<!--                    'بله', 'خیر',-->
<!--                    function () {// Yes button callback-->
<!--                        $.ajax({-->
<!--                            url: "1-5websiteLogin.php",-->
<!--                            data: {-->
<!--                                PhoneNumber: phone,-->
<!--                                Password: pass,-->
<!--                            },-->
<!--                            dataType: "json",-->
<!--                            type: "POST",-->
<!--                            success: function (jsonData) {-->
<!--                                if (jsonData['error']) {-->
<!--                                    Notiflix.Notify.Failure(jsonData['MSG']);-->
<!---->
<!--                                } else {-->
<!--                                    Notiflix.Notify.Success(jsonData['MSG']);-->
<!--                                    $('#voroodd').modal('hide');-->
<!--                                }-->
<!--                            }-->
<!--                        });-->
<!--                    },-->
<!--                    function () { // No button callback-->
<!--                        return;-->
<!--                    }-->
<!--                );-->
<!---->
<!---->
<!--            }-->
<!---->
<!--        </script>-->
<!--    </div>-->
<!--</div>-->
<!--<!----VRUD------------------------------------------------------->-->
<!--<!-----------شماره خود را وارد کنید-------->-->
<!--<div id="phoneN" class="modal fade IRANSans" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="text-modal-vorood">-->
<!--            <br>-->
<!--            <span class="closeBtn close" data-dismiss="modal">&times;</span>-->
<!--            <div class="flex-am" style="margin-top: 2rem">-->
<!--                <div class="parent-input-code">-->
<!--                    <div class="form-wrapper">-->
<!--                        <form action="" class="form ">-->
<!--                            <div class="form-group">-->
<!--                                <label class="form-label label23" for="four">شماره خود را وارد کنید</label>-->
<!--                                <input id="phone2" class="form-input number-input " style="width: 300px" type="tel" />-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                    <button onclick="CheckNumber1()" class="IRANSans daryaft-code" >ادامه </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <script>-->
<!--        function CheckNumber1() {-->
<!--            var phone2 = $('#phone2').val();-->
<!---->
<!--            if (phone2 == '') {-->
<!--                document.getElementById('phone2').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('phone2').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('phone2').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                return;-->
<!--            }-->
<!---->
<!--            Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',-->
<!--                'بله', 'خیر',-->
<!--                function () {// Yes button callback-->
<!--                    $.ajax({-->
<!--                        url: "1-4websiteLogin.php",-->
<!--                        data: {-->
<!--                            phoneNumber: phone2,-->
<!--                        },-->
<!--                        dataType: "json",-->
<!--                        type: "POST",-->
<!--                        success: function (jsonData) {-->
<!--                            if (jsonData['error']) {-->
<!--                                Notiflix.Notify.Failure(jsonData['MSG']);-->
<!---->
<!--                            } else {-->
<!--                                Notiflix.Notify.Success(jsonData['MSG']);-->
<!--                                $('#phoneN').modal('hide');-->
<!--                                $('#code-Dastresi').modal('show');-->
<!--                            }-->
<!--                        }-->
<!--                    });-->
<!--                },-->
<!--                function () { // No button callback-->
<!--                    return;-->
<!--                }-->
<!--            );-->
<!---->
<!---->
<!--        }-->
<!---->
<!--    </script>-->
<!--</div>-->
<!--<!-----------کد دسترسی برای رمز عبور مجدد...-------->-->
<!--<div id="code-Dastresi" class="modal fade IRANSans" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="text-modal-vorood">-->
<!--            <br>-->
<!--            <span class="closeBtn close" data-dismiss="modal">&times;</span>-->
<!--            <div class="flex-am" style="margin-top: 2rem">-->
<!--                <div class="parent-input-code">-->
<!--                    <div class="form-wrapper">-->
<!--                        <form action="" class="form ">-->
<!--                            <div class="form-group">-->
<!--                                <label class="form-label label23" for="fouri">کد دسترسی</label>-->
<!--                                <input id="code22" class="form-input number-input " style="width: 300px" type="tel" />-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                    <button onclick="CheckNumber()" class="IRANSans daryaft-code">"تایید </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <script>-->
<!--        function CheckNumber() {-->
<!--            var phone2 = $('#phone2').val();-->
<!--            var code22 = $('#code22').val();-->
<!---->
<!--            if (code22 == '') {-->
<!--                document.getElementById('code22').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('code22').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('code22').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                return;-->
<!--            }-->
<!---->
<!--            Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',-->
<!--                'بله', 'خیر',-->
<!--                function () {// Yes button callback-->
<!--                    $.ajax({-->
<!--                        url: "1-2websiteLogin.php",-->
<!--                        data: {-->
<!--                            phoneNumber: phone2,-->
<!--                            code: code22,-->
<!--                        },-->
<!--                        dataType: "json",-->
<!--                        type: "POST",-->
<!--                        success: function (jsonData) {-->
<!--                            if (jsonData['error']) {-->
<!--                                Notiflix.Notify.Failure(jsonData['MSG']);-->
<!---->
<!--                            } else {-->
<!--                                Notiflix.Notify.Success(jsonData['MSG']);-->
<!--                                $('#code-Dastresi').modal('hide');-->
<!--                                $('#Ramz-OBUR').modal('show');-->
<!---->
<!--                            }-->
<!--                        }-->
<!--                    });-->
<!--                },-->
<!--                function () { // No button callback-->
<!--                    return;-->
<!--                }-->
<!--            );-->
<!---->
<!---->
<!--        }-->
<!---->
<!--    </script>-->
<!--</div>-->
<!--<!-----------رمز عبور جدید...------->-->
<!--<div id="Ramz-OBUR" class="modal fade IRANSans" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="text-modal-vorood">-->
<!--            <br>-->
<!--            <span class="closeBtn close" data-dismiss="modal">&times;</span>-->
<!--            <div class="flex-am" style="margin-top: 2rem">-->
<!--                <div class="parent-input-code">-->
<!--                    <div class="form-wrapper">-->
<!--                        <form action="" class="form">-->
<!--                            <div class="form-group">-->
<!--                                <label class="form-label label23" for="fourii">رمز عبور جدید</label>-->
<!--                                <input id="fourii" class="form-input number-input " style="width: 300px" type="password" />-->
<!--                            </div>-->
<!--                        </form>-->
<!--                        <form action="" class="form">-->
<!--                            <div class="form-group">-->
<!--                                <label class="form-label label23" for="fourix">تکرار عبور جدید</label>-->
<!--                                <input id="fourix" class="form-input number-input " style="width: 300px" type="password" />-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                    <button  onclick="passwords()" class="IRANSans daryaft-code">تایید </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <script>-->
<!--        function passwords() {-->
<!--            var phone2 = $('#phone2').val();-->
<!--            var fourii = $('#fourii').val();-->
<!--            var fourix = $('#fourix').val();-->
<!--            if (fourii == '') {-->
<!--                document.getElementById('fourii').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('fourii').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('fourii').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                return;-->
<!--            }-->
<!--            if (fourii != fourix) {-->
<!--                document.getElementById('fourii').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('fourii').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('fourii').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('پسورد ها یکسان نیستند');-->
<!--                return;-->
<!--            }-->
<!---->
<!--            Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',-->
<!--                'بله', 'خیر',-->
<!--                function () {// Yes button callback-->
<!--                    $.ajax({-->
<!--                        url: "1-6websiteLogin.php",-->
<!--                        data: {-->
<!--                            phoneNumber: phone2,-->
<!--                            password: fourii,-->
<!--                        },-->
<!--                        dataType: "json",-->
<!--                        type: "POST",-->
<!--                        success: function (jsonData) {-->
<!--                            if (jsonData['error']) {-->
<!--                                Notiflix.Notify.Failure(jsonData['MSG']);-->
<!---->
<!--                            } else {-->
<!--                                Notiflix.Notify.Success(jsonData['MSG']);-->
<!--                                $('#Ramz-OBUR').modal('hide');-->
<!--                                $('#voroodd').modal('show');-->
<!---->
<!--                            }-->
<!--                        }-->
<!--                    });-->
<!--                },-->
<!--                function () { // No button callback-->
<!--                    return;-->
<!--                }-->
<!--            );-->
<!---->
<!---->
<!--        }-->
<!---->
<!--    </script>-->
<!--</div>-->
<!--<!----SABTNAM------------------------------------------------------->-->
<!--<!-----------شماره خود را وارد کنید...-------->-->
<!--<div id="phoneN2" class="modal fade IRANSans" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="text-modal-vorood">-->
<!--            <br>-->
<!--            <span class="closeBtn close" data-dismiss="modal">&times;</span>-->
<!--            <div class="flex-am" style=";margin-top: 2rem">-->
<!--                <div class="parent-input-code">-->
<!--                    <div class="form-wrapper">-->
<!--                        <form action="" class="form">-->
<!--                            <div class="form-group">-->
<!--                                <label class="form-label label23" for="three2"> شماره خود را وارد کنید</label>-->
<!--                                <input id="three2" class="form-input number-input " style="width: 300px" type="tel" />-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                    <br>-->
<!--                    <button onclick="CheckNumber2()" class="IRANSans daryaft-code">ادامه</button>-->
<!--                    <br>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <script>-->
<!--        function CheckNumber2() {-->
<!--            var three2 = $('#three2').val();-->
<!---->
<!--            if (three2 == '') {-->
<!--                document.getElementById('three2').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('three2').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('three2').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                return;-->
<!--            }-->
<!---->
<!--            Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',-->
<!--                'بله', 'خیر',-->
<!--                function () {// Yes button callback-->
<!--                    $.ajax({-->
<!--                        url: "1-1websiteLogin.php",-->
<!--                        data: {-->
<!--                            phoneNumber: three2,-->
<!--                        },-->
<!--                        dataType: "json",-->
<!--                        type: "POST",-->
<!--                        success: function (jsonData) {-->
<!--                            if (jsonData['error']) {-->
<!--                                Notiflix.Notify.Failure(jsonData['MSG']);-->
<!---->
<!--                            } else {-->
<!--                                Notiflix.Notify.Success(jsonData['MSG']);-->
<!--                                $('#phoneN2').modal('hide');-->
<!--                                $('#code-Dastresi2').modal('show');-->
<!---->
<!--                            }-->
<!--                        }-->
<!--                    });-->
<!--                },-->
<!--                function () { // No button callback-->
<!--                    return;-->
<!--                }-->
<!--            );-->
<!---->
<!---->
<!--        }-->
<!---->
<!--    </script>-->
<!--</div>-->
<!--<!-----------کد دسترسی مجدد...-------->-->
<!--<div id="code-Dastresi2" class="modal fade IRANSans" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="text-modal-vorood">-->
<!--            <br>-->
<!--            <span class="closeBtn close" data-dismiss="modal">&times;</span>-->
<!--            <div class="flex-am" style="margin-top: 2rem">-->
<!--                <div class="parent-input-code">-->
<!--                    <div class="form-wrapper">-->
<!--                        <form action="" class="form">-->
<!--                            <div class="form-group">-->
<!--                                <label class="form-label label23" for="four2">کد دسترسی را وارد کنید</label>-->
<!--                                <input id="four2" class="form-input number-input " style="width: 300px" type="tel" />-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                    <button onclick="CheckCode2()" class="IRANSans daryaft-code">ادامه </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <script>-->
<!--        function CheckCode2() {-->
<!--            var three2 = $('#three2').val();-->
<!--            var four2 = $('#four2').val();-->
<!---->
<!--            if (four2 == '') {-->
<!--                document.getElementById('four2').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('four2').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('four2').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                return;-->
<!--            }-->
<!---->
<!--            Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',-->
<!--                'بله', 'خیر',-->
<!--                function () {// Yes button callback-->
<!--                    $.ajax({-->
<!--                        url: "1-2websiteLogin.php",-->
<!--                        data: {-->
<!--                            phoneNumber: three2,-->
<!--                            code: four2,-->
<!--                        },-->
<!--                        dataType: "json",-->
<!--                        type: "POST",-->
<!--                        success: function (jsonData) {-->
<!--                            if (jsonData['error']) {-->
<!--                                Notiflix.Notify.Failure(jsonData['MSG']);-->
<!---->
<!--                            } else {-->
<!--                                Notiflix.Notify.Success(jsonData['MSG']);-->
<!--                                $('#code-Dastresi2').modal('hide');-->
<!--                                $('#vrood-inf').modal('show');-->
<!---->
<!--                            }-->
<!--                        }-->
<!--                    });-->
<!--                },-->
<!--                function () { // No button callback-->
<!--                    return;-->
<!--                }-->
<!--            );-->
<!---->
<!---->
<!--        }-->
<!---->
<!--    </script>-->
<!--</div>-->
<!--<!-----------اطلاعات خود را وارد کنید...-------->-->
<!--<div id="vrood-inf" class="modal fade IRANSans" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="text-modal-vorood">-->
<!--            <br>-->
<!--            <span class="closeBtn close" data-dismiss="modal">&times;</span>-->
<!--            <h3>اطلاعات خود را وارد کنید</h3>-->
<!--            <div class="parent-input-nam">-->
<!--                <div class="form-wrapper">-->
<!--                    <form action="" class="form ">-->
<!--                        <div class="form-group">-->
<!--                            <label class="form-label label23" for="five">نام </label>-->
<!--                            <input id="five" class="form-input number-input " style="width: 300px" type="text" />-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--                <div class="form-wrapper">-->
<!--                    <form action="" class="form">-->
<!--                        <div class="form-group">-->
<!--                            <label class="form-label label23" for="lastName">نام خانوادگی</label>-->
<!--                            <input id="lastName" class="form-input number-input " style="width: 300px" type="text" />-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--                <div class="form-wrapper">-->
<!--                    <form action="" class="form">-->
<!--                        <div class="form-group">-->
<!--                            <label class="form-label label23" for="six">رمز عبور</label>-->
<!--                            <input id="six" class="form-input number-input " style="width: 300px" type="password" />-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--                <div class="form-wrapper">-->
<!--                    <form action="" class="form">-->
<!--                        <div class="form-group">-->
<!--                            <label class="form-label label23" for="seven">تکرار رمز عبور</label>-->
<!--                            <input id="seven" class="form-input number-input " style="width: 300px" type="password" />-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--                <div class="form-wrapper">-->
<!--                    <form action="" class="form">-->
<!--                        <div class="form-group ">-->
<!--                            <label class="form-label label23 control-label myLabel" for="datepicker4"></label>-->
<!--                            <div class="controls">-->
<!--                                <input type="text" id="datepicker4" class="number-input" placeholder="تاریخ تولد" style="width: 300px" />-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--<!--                <a href="index.html">-->-->
<!--                    <button onclick="submitUserData()" class="IRANSans daryaft-code"  style="font-size: 20px;margin-top: 4rem;">ذخیره اطلاعات</button>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <script>-->
<!--        function submitUserData() {-->
<!--            var three2 = $('#three2').val();-->
<!--            var five = $('#five').val();-->
<!--            var lastName = $('#lastName').val();-->
<!--            var datepicker4 = $('#datepicker4').val();-->
<!--            var six = $('#six').val();-->
<!--            var seven = $('#seven').val();-->
<!---->
<!--            if (five == '') {-->
<!--                document.getElementById('five').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('five').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('five').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                return;-->
<!--            }-->
<!--            if (lastName == '') {-->
<!--                document.getElementById('lastName').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('lastName').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('lastName').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                return;-->
<!--            }-->
<!--            if (datepicker4 == '') {-->
<!--                document.getElementById('datepicker4').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('datepicker4').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('datepicker4').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                return;-->
<!--            }-->
<!--            if (six == '') {-->
<!--                document.getElementById('six').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('six').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('six').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                return;-->
<!--            }-->
<!--            if (seven == '') {-->
<!--                document.getElementById('seven').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('seven').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('seven').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');-->
<!--                return;-->
<!--            }-->
<!--            if (six != seven) {-->
<!--                document.getElementById('six').style.border = '2px solid red';-->
<!--                let inputTimeOut = setTimeout(function () {-->
<!--                    document.getElementById('six').style.borderColor = '#ced4da';-->
<!--                    document.getElementById('six').style.borderWidth = '1px';-->
<!--                    clearTimeout(-->
<!--                        inputTimeOut-->
<!--                    );-->
<!--                }, 1500);-->
<!--                Notiflix.Notify.Failure('پسورد ها یکسان نیستند');-->
<!--                return;-->
<!--            }-->
<!---->
<!--            Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',-->
<!--                'بله', 'خیر',-->
<!--                function () {// Yes button callback-->
<!--                    $.ajax({-->
<!--                        url: "1-3websiteLogin.php",-->
<!--                        data: {-->
<!--                            PhoneNumber: three2,-->
<!--                            Name: five,-->
<!--                            LastName: lastName,-->
<!--                            dateOfBirth: datepicker4,-->
<!--                            Password: six,-->
<!--                        },-->
<!--                        dataType: "json",-->
<!--                        type: "POST",-->
<!--                        success: function (jsonData) {-->
<!--                            if (jsonData['error']) {-->
<!--                                Notiflix.Notify.Failure(jsonData['MSG']);-->
<!---->
<!--                            } else {-->
<!--                                Notiflix.Notify.Success(jsonData['MSG']);-->
<!--                                $('#vrood-inf').modal('hide');-->
<!---->
<!--                            }-->
<!--                        }-->
<!--                    });-->
<!--                },-->
<!--                function () { // No button callback-->
<!--                    return;-->
<!--                }-->
<!--            );-->
<!---->
<!---->
<!--        }-->
<!---->
<!--    </script>-->
<!--</div>-->
<!---->
<!--<!------------------------------------------------------->-->
<!--</body>-->
<!--<script>-->
<!--    Notiflix.Notify.Init({-->
<!--        rtl: true,-->
<!--        useGoogleFont: false,-->
<!--        fontFamily: "yekanboldfanum",-->
<!--        timeout: 1500,-->
<!--    });-->
<!--</script>-->
<!--<script>-->
<!--    Notiflix.Confirm.Init({-->
<!--        rtl: true,-->
<!--        useGoogleFont: false,-->
<!--        fontFamily: "yekanboldfanum",-->
<!--        cancelButtonBackground: "#ef2828",-->
<!--    });-->
<!--</script>-->
<!--<script type="text/javascript">-->
<!--    function onloadBody() {-->
<!--        $('#voroodd').css({"opacity": "1" ,"display":"block"});-->
<!--    }-->
<!--    function reModal() {-->
<!--        $('#voroodd').css({"opacity": "0" ,"display":"none"});-->
<!--    }-->
<!--    function remBc() {-->
<!--        $('#voroodd').css({"opacity": "0" ,"display":"none"});-->
<!--    }-->
<!--</script>-->
<!--<script src="JS/jquery.js"></script>-->
<!--<script src="JS/bootstrap.js"></script>-->
<!--<script src="JS/MYjs.js"></script>-->
<!--<script src="JS/jquery-3.4.1.min.js"></script>-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
<!--<script src="JS/clndr/bootstrap-datepicker.min.js"></script>-->
<!--<script src="JS/clndr/bootstrap-datepicker.fa.min.js"></script>-->
<!--</html>-->
<!---->
<?php
//}
//?>