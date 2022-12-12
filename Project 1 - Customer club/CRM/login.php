<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>صفحه ی ورود</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css2/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="css2/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--    style   -->
    <link rel="stylesheet" href="css/newcss.css">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="css2/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="css2/custom-style.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>ورود به پنل پشتریان</b>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود را بزنید</p>
            <div class="input-group mb-3">
                <input id="A1" type="number" class="form-control" placeholder="شماره ی تلفن همراه" autofocus>
                <div class="input-group-append">
                    <span class="fa fa-phone input-group-text"></span>
                </div>
            </div>
            <div class="input-group mb-3">
                <input id="A2" type="password" class="form-control" placeholder="رمز عبور">
                <div class="input-group-append dl45">
                    <span class="fa fa-lock input-group-text"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="checkbox icheck">
                        <input type="checkbox" class="reminder"> من را به خاطر بسپار
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" id="AAA" onclick="sendParams()"
                            class="btn btn-primary btn-block btn-flat btnl59">ورود
                    </button>
                </div>
            </div>
            <p class="mb-1">
                <a href="forgot%20password.php">رمز عبورم را فراموش کرده ام</a>
            </p>
        </div>
        <div id="Wrong" class="alert warning">
            سلام
        </div>
        <div id="Success" class="alert success">
            سلام
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        })
    })
</script>
<script>
    // -----------------------press enter to trigger
    var input10 = document.getElementById("A2");
    var input11 = document.getElementById("A1");
    input10.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("AAA").click();
        }
    });
    input11.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            $("#A2").focus();
        }
    });

    // -----------------------send to database
    function sendParams() {
        var PhoneNumber, PassWord;
        PhoneNumber = document.getElementById('A1').value;
        PassWord = document.getElementById('A2').value;
        if (PhoneNumber == '') {
            document.getElementById('A1').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A1').style.borderColor = '#ced4da';
                document.getElementById('A1').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            // document.getElementById('Success').style.visibility='hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شماره تلفن همراه خود را وارد کنید.';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (PassWord == '') {
            document.getElementById('A2').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A2').style.borderColor = '#ced4da';
                document.getElementById('A2').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            // document.getElementById('Success').style.visibility='hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا رمز عبور خود را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        $.ajax({
            url: "3-4LoginUserDavin.php",
            data: {
                PhoneNumber: PhoneNumber,
                PassWord: PassWord,
            },
            dataType: "json",
            type: "POST",
            success: function (jsonData) {
                if (jsonData['error']) {
                    document.getElementById('Success').style.visibility = 'hidden';
                    document.getElementById('Wrong').style.display = 'block';
                    document.getElementById('Wrong').innerText = jsonData['MSG'];
                    $("div.warning").delay(1500).fadeOut(400);
                } else {
                    // document.getElementById('Success').style.visibility='visible';
                    window.location.href = "my point.php";
                }
            }
        });
    }
</script>
</body>
</html>
