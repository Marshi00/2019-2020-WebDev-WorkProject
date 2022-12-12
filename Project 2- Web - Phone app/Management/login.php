<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>ورود به صفحه ی مدیریت</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <!--    dontawesome-->
    <link href="css/all.css" rel="stylesheet"/>
    <link href="css/notiflix-1.8.0.css" rel="stylesheet"/><!--    alert-->
    <script src="js/notiflix-1.8.0.js"></script><!--    alert-->

    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.ico">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body dl73">
<!--<div class="dll72 hidden" >--><!--loader-->
<!--    <img src="img/preloader.gif" id="il73" alt="loading ..." >-->
<!--</div>--><!--loader-->

<div class="dll37">

    <div class="col-lg-8 col-md-8 hidden-sm hidden-xs dlogin32" align="center"><!--colorful field-->

        <img src="img/VardastLogoM@3x.png" alt="سایت وردست">
        <h1>
            به تابلوی مدیریت خوش آمدید
        </h1>
    </div><!--colorful field-->


    <form class="form-signin col-lg-4 col-md-4 col-sm-6 col-xs-6 "><!--inputs-->
        <div class="login-wrap sl83">
            <h4>
                ورود به تابلوی مدیریت
            </h4>
            <input type="number" id="A1" class="form-control" placeholder="کد ملی" autofocus>
            <input type="password" id="A2" class="form-control" placeholder="رمز عبور">
            <i class="fas fa-eye" onmouseover="mouseoverPass()" onmouseout="mouseoutPass()"></i>
            <span class="pull-left ">
                    <a data-toggle="modal" href="">فراموشی رمز عبور؟</a>
            </span>
            <input class="pull-right" id="checkbox" type="checkbox" value="remember-me"><label for="checkbox">مرا به یاد
                بسپار</label>
            <br>
            <br>
            <button class="btn btn-lg btn-login btn-block" type="button" onclick="sendParams()" id="AAA">ورود</button>
            <br>
        </div>
    </form><!--inputs-->

</div>


<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--alert-->
<script>
    Notiflix.Report.Init({
        fontFamily: "yekanboldfanum",
        useGoogleFont: false,
        titleFontSize: "17px",
        backOverlay: true,
        buttonFontSize: "18px",
        rtl:true
    });
</script>
<script>
    function mouseoverPass(obj) {
        var obj = document.getElementById('A2');
        obj.type = "text";
    }

    function mouseoutPass(obj) {
        var obj = document.getElementById('A2');
        obj.type = "password";
    }
</script>
<!--<script>-->
<!--    $(function () {-->
<!--        $('input').iCheck({-->
<!--            checkboxClass: 'icheckbox_square-blue',-->
<!--            radioClass: 'iradio_square-blue',-->
<!--            increaseArea: '20%' // optional-->
<!--        })-->
<!--    })-->
<!--</script>-->
<script>
    // -----------------------press enter to trigger
    var input10 = document.getElementById("A1");
    var input11 = document.getElementById("A2");
    input10.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            $("#A2").focus();
        }
    });
    input11.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("AAA").click();
        }
    });

    // -----------------------send to database
    function sendParams() {
        var nationalCode, Password;
        nationalCode = document.getElementById('A1').value;
        Password = document.getElementById('A2').value;
        if (nationalCode == '') {
            document.getElementById('A1').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A1').style.borderColor = '#ced4da';
                document.getElementById('A1').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Report.Failure('لطفا کد ملی خود را وارد کنید', '', 'بستن');
            let reportTimeout = setTimeout(function(){
                document.getElementById("NXReportButton").click();
                clearTimeout(
                    reportTimeout
                );
            },1500);
            return;
        }
        if (Password == '') {
            document.getElementById('A2').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A2').style.borderColor = '#ced4da';
                document.getElementById('A2').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Report.Failure('لطفا رمز عبور خود را وارد کنید', '', 'بستن');
            let reportTimeout = setTimeout(function(){
                document.getElementById("NXReportButton").click();
                clearTimeout(
                    reportTimeout
                );
            },1500);
            return;
        }
        $.ajax({
            url: "1-3loginAdmin.php",
            data: {
                nationalCode: nationalCode,
                Password: Password,
            },
            dataType: "json",
            type: "POST",
            success: function (jsonData) {
                if (jsonData['error']) {
                    Notiflix.Report.Failure(jsonData['MSG'], '', 'بستن');
                    let reportTimeout = setTimeout(function(){
                        document.getElementById("NXReportButton").click();
                        clearTimeout(
                            reportTimeout
                        );
                    },1500);
                } else {
                    // document.getElementById('Success').style.visibility='visible';
                    window.location.href = "index1.php";
                }
            }
        });
    }
</script>


</body>
</html>
