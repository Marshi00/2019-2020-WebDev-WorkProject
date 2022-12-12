<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | صفحه ورود</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="dist/css/newcss.css">

    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="dist/css/custom-style.css">
    <link rel="stylesheet" href="Css/all.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
<!--        <a href="ZZZindex.php"><b>ورود به سایت</b></a>-->
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body" >
            <h5 class="login-box-msg pl36">فرم زیر را تکمیل کنید و ورود را بزنید</h5>
                <div class="input-group mb-3">
                    <input id="A2" type="text" class="form-control" placeholder="کد ملی" autofocus>
                    <div class="input-group-append">
                        <span class="fas fa-id-card input-group-text"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="A4" type="password" class="form-control" placeholder="رمز عبور">
                    <div class="input-group-append">
                        <span class="fa fa-key input-group-text"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox">من را به یاد بسپار
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button onclick="sendParams()" id="AAA" type="submit" class="btn btn-primary btn-block btn-flat btnl61">ورود</button>
                    </div>
                </div>
            <div class="col-12 alert warning" id="Wrong" align="center">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                سلام            </div>
            <div class="col-12 alert success" id="Success" align="center">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                سلام
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

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
    // -----------------------press enter to trigger
    var input10 = document.getElementById("A2");
    var input11 = document.getElementById("A4");
    input10.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            $("#A4").focus();
        }
    });
    input11.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("AAA").click();
        }
    });
    // -----------------------send to database

    function sendParams() {
        var NationalID,PassWord;
        PassWord=document.getElementById('A4').value;
        NationalID=document.getElementById('A2').value;
        if (NationalID==''){
            document.getElementById('A2').style.border='2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A2').style.borderColor='#ced4da';
                document.getElementById('A2').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility='hidden';
            document.getElementById('Wrong').style.display='block';
            document.getElementById('Wrong').innerText='لطفا کد ملی خود را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (PassWord==''){
            document.getElementById('A4').style.border='2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A4').style.borderColor='#ced4da';
                document.getElementById('A4').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility='hidden';
            document.getElementById('Wrong').style.display='block';
            document.getElementById('Wrong').innerText='لطفا رمز خود را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        $.ajax({
            url: "1-2LogInAdminDavin.php",
            data:{
                PassWord:PassWord,
                NationalID:NationalID,
            },
            dataType:"json",
            type:"POST",
            success : function (jsonData) {
                if (jsonData['error']){
                    document.getElementById('Success').style.visibility='hidden';
                    document.getElementById('Wrong').style.display='block';
                    document.getElementById('Wrong').innerText=jsonData['MSG'];
                    $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
                }
                else {
                    window.location.href="ZZZindex.php";
                }

            }
        });

    }
</script>
</body>
</html>
