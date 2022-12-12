<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>فراموشی رمز عبور</title>
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
    <!--style -->
    <link rel="stylesheet" href="css/newcss.css">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="css2/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="css2/custom-style.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>فراموشی رمز عبور</b>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg pp35">بازیابی رمز عبور با شماره ی تلفن همراه</p>
<!--            <form action="my point.php" method="post">-->
                <div class="input-group mb-3">
                    <input type="text" id="A1" class="form-control" placeholder="شماره ی تلفن همراه">
                    <div class="input-group-append">
                        <span class="fa fa-mobile input-group-text dl40"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7 dl44">
                        <button onclick="sendParams()" class="btn btn-primary btn-block btn-flat">ارسال رمز عبور به موبایل</button>
                    </div>
                </div>
<!--            </form>-->
        </div>
        <div class="alert warning">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            سلام            </div>
        <div class="alert success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
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
            radioClass   : 'iradio_square-blue',
            increaseArea : '20%' // optional
        })
    })
</script>
<script>
    function sendParams() {
        var phoneNumber;
        phoneNumber = document.getElementById('A1').value;
        if (phoneNumber == '') {
            document.getElementById('A1').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A1').style.borderColor = '#ced4da';
                document.getElementById('A1').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا نام شرکت را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        $.ajax({
            url: "sms.php",
            data: {
                phoneNumber: phoneNumber,
            },
            dataType: "json",
            type: "POST",
            success: function (jsonData) {
                if (jsonData['error']) {
                    document.getElementById('Success').style.visibility = 'hidden';
                    document.getElementById('Wrong').style.display = 'block';
                    document.getElementById('Wrong').innerText = jsonData['MSG'];
                    $("div.warning").delay(1900).fadeOut(400);
                } else {
                    document.getElementById('Success').style.visibility = 'visible';
                    document.getElementById('Success').innerText = jsonData['MSG'];
                    $("div.success").delay(1900).fadeOut(400);
                }

            }
        });

    }
</script>
</body>
</html>
