<?php
include "0-2loginCheckAdmin2.php";
$id = $_GET['id'];
$user_id = $_SESSION['id'];
$infoVal=$A->Query("SELECT * FROM user WHERE id='$id'");
$infoValFetch=$A->FetchAssoc($infoVal);
?>
<html lang="en">
<head>
    <title>ویرایش لیست مشتریان</title>

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
                            ویرایش لیست مشتریان
                        </header>
                        <div class="panel-body">

                            <div class="form-group container-fluid">
                                <label for="name">نام خود را وارد کنید</label>
                                <input type="text" class="form-control" id="name" value="<?php echo $infoValFetch['Name']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="LastName">نام خانوادگی خود را وارد کنید</label>
                                <input type="text" class="form-control" id="LastName" value="<?php echo $infoValFetch['LastName']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="PhoneNumber">شماره موبایل را وارد کنید</label>
                                <input type="text" class="form-control" id="PhoneNumber" value="<?php echo $infoValFetch['PhoneNumber']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="dateOfBirth">تاریخ تولد را وارد کنید</label>
                                <input type="text" class="form-control" id="dateOfBirth" value="<?php echo $infoValFetch['dateOfBirth']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="Password">رمز عبور جدید را وارد کنید</label>
                                <input type="password" class="form-control" id="Password" value="">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="Password2">رمز عبور جدید را تکرار کنید</label>
                                <input type="password" class="form-control" id="Password2" value="">
                            </div>

                            <button class="btn btn-lg btn-login btn-block"
                                    onclick="send()">ثبت
                            </button>

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
        var PhoneNumber = $('#PhoneNumber').val();
        var dateOfBirth = $('#dateOfBirth').val();
        var Password = $('#Password').val();
        var Password2 = $('#Password2').val();
        var id = <?php echo $id ?>;
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
        if (dateOfBirth == "") {
            document.getElementById('accountBalance').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('accountBalance').style.borderColor = '#ced4da';
                document.getElementById('accountBalance').style.borderWidth = '1px';
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
        Notiflix.Confirm.Show('ویرایش اطلاعات مشتری', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "14-2upUsers.php",
                    data: {
                        Name: name,
                        LastName: LastName,
                        PhoneNumber: PhoneNumber,
                        dateOfBirth: dateOfBirth,
                        Password: Password,
                        id: id,
                        user_id: user_id,

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
