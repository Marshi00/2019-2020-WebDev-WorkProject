<?php
include "loginCheckAdmin.php";
$userId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش ادمین</title>
    <link rel="stylesheet" href="Css/admin.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <link rel="stylesheet" href="dist/css/newcss.css">

    <?php
    include "link.php"
    ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php
    include "nav.php";
    ?>
    <div class="content-wrapper">

        <div class="col-12">
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ویرایش ادمین ها</h3></button>
        </div>

        <div class="col-10 dl25" align="center">
            <input type="text" id="A1" name="firstname" placeholder="نام خود را وارد کنید ..." autofocus>

            <input type="text" id="A3" name="lastname" placeholder="نام خانوادگی خود را وارد کنید ...">

            <input type="number" id="A7" name="lastname" placeholder="سطح خود را وارد کنید ...">

            <input type="text" id="A8" name="firstname" placeholder="ایمیل خود را وارد کنید ...">

            <input type="text" id="A2" name="lastname" placeholder="رمز عبور خود را وارد کنید ...">

            <input type="number" id="A6" name="firstname" placeholder="شماره تلفن خود را وارد کنید ...">
            <input type="number" id="A5" value="<?php echo $userId?>" disabled name="lastname" >


            <input type="text" id="A9" name="lastname" placeholder="شعبه خود را وارد کنید ...">

            <select id="A10">
                <option disabled selected value="">وضعیت</option>
                <option value="1">فعال</option>
                <option value="0">غیر فعال</option>
            </select>

            <br>


            <input onclick="sendParams()" type="submit" class="btn-primary bsl51" value="ثبت">

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
        var name, Password, LastName, NationalCode, PhoneNumber, Email, branch, Level,Status;
        name = document.getElementById('A1').value;
        Password = document.getElementById('A2').value;
        LastName = document.getElementById('A3').value;
        NationalCode = document.getElementById('A5').value;
        PhoneNumber = document.getElementById('A6').value;
        Level = document.getElementById('A7').value;
        Email = document.getElementById('A8').value;
        branch = document.getElementById('A9').value;
        Status = document.getElementById('A10').value;
        if (name == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا نام را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (LastName == '') {
            document.getElementById('A3').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A3').style.borderColor='#ced4da';
                document.getElementById('A3').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا نام خانوادگی را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Level == '') {
            document.getElementById('A7').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A7').style.borderColor='#ced4da';
                document.getElementById('A7').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا سطح را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Email == '') {
            document.getElementById('A8').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A8').style.borderColor='#ced4da';
                document.getElementById('A8').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا ایمیل را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Password == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا رمز عبور را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (branch == '') {
            document.getElementById('A9').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A9').style.borderColor='#ced4da';
                document.getElementById('A9').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شعبه را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (NationalCode == '') {
            document.getElementById('A5').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A5').style.borderColor='#ced4da';
                document.getElementById('A5').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = ' لطفا کد ملی  را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (PhoneNumber == '') {
            document.getElementById('A6').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A6').style.borderColor='#ced4da';
                document.getElementById('A6').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شماره تلفن همراه را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Status == '') {
            document.getElementById('A10').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A1').style.borderColor='#ced4da';
                document.getElementById('A1').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا وضعیت را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        $.ajax({
            url: "1-3UpdateAdminDavin.php",
            data: {
                name: name,
                Password: Password,
                LastName: LastName,
                NationalCode: NationalCode,
                Level: Level,
                PhoneNumber: PhoneNumber,
                Email: Email,
                branch: branch,
                Status: Status,
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
                    $( "div.success" ).delay( 1900 ).fadeOut( 400 );
                }
            }
        });
    }
</script>
</body>

</html>