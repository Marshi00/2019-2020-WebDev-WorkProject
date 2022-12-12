<?php
include "loginCheckAdmin.php";
$setInfo = $_SESSION['nationalCode'];
$getinfo = $A->Query("SELECT * FROM admin WHERE `ID(national code)`='$setInfo'");
$info = $A->FetchAssoc($getinfo);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>اضافه کردن امتیاز به اعضا</title>
    <link rel="stylesheet" href="Css/points.css">
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>اضافه کردن امتیاز به اعضا</h3></button>
        </div>

        <div class="col-8 dl3511" align="center">

            <input type="text" id="A1" name="phoneNumber" placeholder="شماره ی همراه کاربر را وارد کنید ..." autofocus>
            <input type="text" value="<?php echo $info['ID(national code)'] ?>" disabled id="A3"
                   name="firstname">
            <input type="text" id="A2" name="lastname" placeholder="مقدار  امتیاز را وارد کنید ...">
            <select id="A4">
                <option value="" disabled selected>دلیل را وارد کنید</option>
                <option value="تولد">تولد</option>
                <option value="سالگرد ازدواج">سالگرد ازدواج</option>
                <option value="غیره">غیره</option>
            </select>

            <input class="btn-primary" onclick="sendParams()" type="submit" value="ثبت">
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
        var UserID, Points, AdminID, Reason;
        UserID = document.getElementById('A1').value;
        Points = document.getElementById('A2').value;
        AdminID = document.getElementById('A3').value;
        Reason = document.getElementById('A4').value;
        if (UserID == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا شماره همراه کاربر را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (Points == '') {
            document.getElementById('A2').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A2').style.borderColor = '#ced4da';
                document.getElementById('A2').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا امتیاز را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (AdminID == '') {
            document.getElementById('A3').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A3').style.borderColor = '#ced4da';
                document.getElementById('A3').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شناسه ادمین را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (Reason == '') {
            document.getElementById('A4').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A4').style.borderColor = '#ced4da';
                document.getElementById('A4').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا دلیل را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        $.ajax({
            url: "14-1SubmitOtherPointsDavin.php",
            data: {
                UserID: UserID,
                Points: Points,
                AdminID: AdminID,
                Reason: Reason,
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