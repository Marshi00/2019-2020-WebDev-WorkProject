<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ثبت عضو جدید باشگاه مشتریان</title>
    <link rel="stylesheet" href="Css/club.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">

    <?php
    include "link.php"
    ?>
</head>
<body class="hold-transition sidebar-mini bal">
<div class="wrapper">

    <?php
    include "nav.php";
    ?>
    <div class="content-wrapper">

        <div class="col-12">
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ثبت عضو جدید باشگاه مشتریان</h3></button>
        </div>

        <div class="col-8 dl3511" align="center">
            <input type="number" id="A2" placeholder="شماره همراه را وارد کنید">

            <input type="text" id="A1" placeholder="رمز عبور را وارد کنید">

            <br>


            <input onclick="sendParams()" type="submit" value="ثبت" class="btn-primary">

            <div class="col-6 alert warning" id="Wrong" align="center">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                سلام
            </div>
            <div class="col-6 alert success" id="Success" align="center">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                سلام
            </div>
        </div>
    </div>

</div>
<script>
    function sendParams() {
        var Password, PhoneNumber;
        Password = document.getElementById('A1').value;
        PhoneNumber = document.getElementById('A2').value;
        if (PhoneNumber == '') {
            document.getElementById('A2').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A2').style.borderColor='#ced4da';
                document.getElementById('A2').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شماره همراه را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Password == '') {
            document.getElementById('A1').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A1').style.borderColor='#ced4da';
                document.getElementById('A1').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا رمز عبور را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }

        $.ajax({
            url: "3-1SubmitUserDavin.php",
            data: {
                Password: Password,
                PhoneNumber: PhoneNumber,
            },
            dataType: "json",
            type: "POST",
            success: function (jsonData) {
                if (jsonData['error']) {
                    document.getElementById('Success').style.visibility = 'hidden';
                    document.getElementById('Wrong').style.display = 'block';
                    document.getElementById('Wrong').innerText = jsonData['MSG'];
                    $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
                } else {
                    document.getElementById('Success').style.visibility = 'visible';
                    document.getElementById('Success').innerText = jsonData['MSG'];
                    $( "div.success" ).delay( 3000 ).fadeOut( 400 );
                }

            }
        });

    }
</script>

</body>

</html>