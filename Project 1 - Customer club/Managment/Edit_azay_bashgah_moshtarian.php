<?php
include "loginCheckAdmin.php";
$userId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش اعضای باشگاه مشتریان</title>
    <link rel="stylesheet" href="Css/club.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <!--calender-->
    <link rel="stylesheet" href="Css/calendar-blue2.css"><script src="JS/jalali.js"></script>
    <script src="JS/calendar.js"></script>
    <script src="JS/calendar-setup.js"></script>
    <script src="JS/calendar-fa.js"></script>
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ویرایش عضو باشگاه مشتریان</h3></button>
        </div>

        <div class="col-8 div01" align="center">
            <input type="text" id="A1" name="firstname" placeholder="نام را وارد کنید ...">

            <input type="text" id="A2" name="lastname" placeholder="نام خانوادگی را وارد کنید ...">
            <input type="number" id="A3" name="lastname" placeholder="کد ملی را وارد کنید ...">

            <input type="text" id="A11" value="<?php echo $userId ?>" disabled name="firstname">
            <select id="A6">
                <option disabled selected value="">جنسیت را انتخاب کنید ...</option>
                <option value="1">آقا</option>
                <option value="0">خانم</option>
            </select>

            <input type="number" id="A5" name="lastname" placeholder="شماره تلفن ثابت را وارد کنید ...">
            <input type="text" id="A8" name="lastname" placeholder="رمز عبور را وارد کنید ...">
            <input type="text" id="A10" name="lastname" placeholder="شناسه دعوت کننده را وارد کنید ...">
            <input type="text" id="DateTavalod" placeholder="برای انتخاب تاریخ تولد کلیک کنید" class="inputinfo">

            <input type="text" id="A4" name="firstname" placeholder="آدرس محل سکونت را وارد کنید ...">

            <input type="text" id="DateEzdevaj" placeholder="برای انتخاب تاریخ ازدواج کلیک کنید" class="inputinfo">

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
    Calendar.setup({
        inputField: 'DateEzdevaj',
        button: 'DateEzdevaj',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
    Calendar.setup({
        inputField: 'DateTavalod',
        button: 'DateTavalod',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
</script>
<script>
    function sendParams() {
        var name, LastName, NationalCode, Address, FixedPhoneNumber, Gender, DateOfBirth, Password, DateOfMarriage,
            InviterID, PhoneNumber;
        name = document.getElementById('A1').value;
        LastName = document.getElementById('A2').value;
        NationalCode = document.getElementById('A3').value;
        Address = document.getElementById('A4').value;
        FixedPhoneNumber = document.getElementById('A5').value;
        Gender = document.getElementById('A6').value;
        DateOfBirth = document.getElementById('DateTavalod').value;
        Password = document.getElementById('A8').value;
        DateOfMarriage = document.getElementById('DateEzdevaj').value;
        InviterID = document.getElementById('A10').value;
        PhoneNumber = document.getElementById('A11').value;
        if (name == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا نام را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (LastName == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا نام خانوادگی را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (NationalCode == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا کد ملی را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (Gender == '') {
            document.getElementById('A6').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A6').style.borderColor = '#ced4da';
                document.getElementById('A6').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا جنسیت را انتخاب کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (FixedPhoneNumber == '') {
            document.getElementById('A5').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A5').style.borderColor = '#ced4da';
                document.getElementById('A5').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شماره تلفن ثابت را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (Password == '') {
            document.getElementById('A8').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A8').style.borderColor = '#ced4da';
                document.getElementById('A8').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا گذر واژه را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (DateOfBirth == '') {
            document.getElementById('DateTavalod').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('DateTavalod').style.borderColor = '#ced4da';
                document.getElementById('DateTavalod').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا تاریخ تولد را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }

        if (Address == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا آدرس را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        $.ajax({
            url: "3-2UPdateUserDavin.php",
            data: {
                name: name,
                LastName: LastName,
                NationalCode: NationalCode,
                Address: Address,
                FixedPhoneNumber: FixedPhoneNumber,
                Gender: Gender,
                DateOfBirth: DateOfBirth,
                Password: Password,
                DateOfMarriage: DateOfMarriage,
                InviterID: InviterID,
                PhoneNumber: PhoneNumber,
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