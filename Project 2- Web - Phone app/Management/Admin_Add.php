<?php
include "0-1loginCheckAdmin1.php";
$user_id = $_SESSION['id']
?>
<html lang="en">
<head>
    <title>اضافه کردن مدیر</title>

    <?php
    include "link.php";
    ?>
    <!--alert-->
    <link href="css/notiflix-1.8.0.css" rel="stylesheet"/>
    <script src="js/notiflix-1.8.0.js"></script>


</head>

<body>

<section id="container">
    <?php
    include "header.php";
    ?>
    <?php
    include "sidebar.php";
    ?>
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12" id="adminform">
                    <section class="panel adminSection">
                        <header class="panel-heading">
                            فرم ثبت نام مدیر
                        </header>
                        <div class="panel-body">

                            <div class="form-group container-fluid">
                                <label for="name">نام خود را وارد کنید</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="LastName">نام خانوادگی خود را وارد کنید</label>
                                <input type="text" class="form-control" id="LastName">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="NationalCode">کد ملی خود را وارد کنید</label>
                                <input type="number" class="form-control" id="NationalCode">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="Password">رمز عبور جدید را وارد کنید</label>
                                <input type="password" class="form-control" id="Password">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="Password2">رمز عبور جدید را تکرار کنید</label>
                                <input type="password" class="form-control" id="Password2">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="Email">ایمیل خود را وارد کنید</label>
                                <input type="email" class="form-control" id="Email">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="PhoneNumber">شماره موبایل خود را وارد کنید</label>
                                <input type="number" class="form-control" id="PhoneNumber">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="levelSet">سطح خود را انتخاب کنید</label>
                                <br>
                                <select id="levelSet">
                                    <option value="" selected disabled>سطح</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <button class="btn btn-lg btn-login btn-block" onclick="send()">ثبت</button>

                        </div>
                    </section>
                </div>
                <?php
                include "footer.php";
                ?>

            </div>
        </section>
    </section>
</section>
<?php
include "js link.php";
?>
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
    function send() {
        var name = $('#name').val();
        var LastName = $('#LastName').val();
        var NationalCode = $('#NationalCode').val();
        var Password = $('#Password').val();
        var Password2 = $('#Password2').val();
        var Email = $('#Email').val();
        var PhoneNumber = $('#PhoneNumber').val();
        var levelSet = document.getElementById('levelSet').value;
        var user_id = <?php echo $user_id ?>;


        if (name == "") {
            document.getElementById('name').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('name').style.borderColor = '#ced4da';
                document.getElementById('name').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }

        if (LastName == "") {
            document.getElementById('LastName').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('LastName').style.borderColor = '#ced4da';
                document.getElementById('LastName').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (NationalCode == "") {
            document.getElementById('NationalCode').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('NationalCode').style.borderColor = '#ced4da';
                document.getElementById('NationalCode').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (Password == "") {
            document.getElementById('Password').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Password').style.borderColor = '#ced4da';
                document.getElementById('Password').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (Password2 == "") {
            document.getElementById('Password2').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Password2').style.borderColor = '#ced4da';
                document.getElementById('Password2').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (Password!=Password2) {
            document.getElementById('Password').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Password2').style.borderColor = '#ced4da';
                document.getElementById('Password2').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);

            Notiflix.Notify.Failure('گذرواژه ها یکسان نیستند');
            return;

        }
        if (Email == "") {
            document.getElementById('Email').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Email').style.borderColor = '#ced4da';
                document.getElementById('Email').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (PhoneNumber == "") {
            document.getElementById('PhoneNumber').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('PhoneNumber').style.borderColor = '#ced4da';
                document.getElementById('PhoneNumber').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (levelSet === "") {
            document.getElementById('levelSet').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('levelSet').style.borderColor = '#ced4da';
                document.getElementById('levelSet').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }

        Notiflix.Confirm.Show('افزودن به مدیر ها', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "1-1subAdmin.php",
                    data: {
                        Name: name,
                        LastName: LastName,
                        nationalCode: NationalCode,
                        Password: Password,
                        user_id: user_id,
                        Email: Email,
                        PhoneNumber: PhoneNumber,
                        Level: levelSet,
                    },
                    dataType: "json",
                    type: "POST",
                    success: function (jsonData) {
                        if (jsonData['error']) {
                            Notiflix.Notify.Failure(jsonData['MSG']);

                        } else {
                            Notiflix.Notify.Success(jsonData['MSG']);
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
</body>
</html>