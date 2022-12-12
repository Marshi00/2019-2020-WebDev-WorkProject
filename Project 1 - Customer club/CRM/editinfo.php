<?php
include "loginCheckUser.php";
$setInfo = $_SESSION['PhoneNumber'];
$getinfo = $A->Query("SELECT * FROM user WHERE PhoneNumber='$setInfo'");
$info = $A->FetchAssoc($getinfo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش اطلاعات</title>
    <link rel="stylesheet" href="css/infoeditingstyle.css">
    <!--    bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery(bootstrap).js"></script>
    <script src="js/bootstrap.js"></script>
    <!--calender-->
    <link rel="stylesheet" href="css/calendar-blue2.css">
    <script src="js/jalali.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/calendar-setup.js"></script>
    <script src="js/calendar-fa.js"></script>
</head>
<body>
<div>
    <div id="Wrong" class="alert warning">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        سلام
    </div>
    <div id="Success" class="alert success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        سلام
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="n1">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div01" align="right">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                <input type="text" id="A1" placeholder="نام خود را وارد کنید" class="inputinfo" autofocus>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="text" id="A2" placeholder="نام خانوادگی خود را وارد کنید" class="inputinfo">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                <input type="number" id="A3" placeholder="کد ملی خود را وارد کنید" class="inputinfo">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="text" id="date_input" placeholder="برای انتخاب تاریخ تولد خود کلیک کنید" class="inputinfo">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                <input type="text" id="marriageinput" placeholder="برای انتخاب تاریخ ازدواج خود کلیک کنید"
                       class="inputinfo">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <select class="inputinfo" id="A6">
                    <option disabled selected value="">جنسیت خود را انتخاب کنید</option>
                    <option value="0">خانم</option>
                    <option value="1">آقا</option>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                <input type="number" id="A5" placeholder="شماره ی تلفن ثابت خود را وارد کنید" class="inputinfo">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="number" id="A12" value="<?php echo $info['PhoneNumber'] ?>" class="inputinfo" disabled>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                <input type="text" id="A4" placeholder="آدرس خود را وارد کنید" class="inputinfo">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="number" id="A10" placeholder="شماره ی موبایل دعوت کننده را وارد کنید" class="inputinfo">
            </div>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                <input type="text" id="A11" placeholder="رمز عبور جدید را وارد کنید" class="inputinfo">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="text" id="A8" placeholder="رمز عبور جدید را تکرار کنید" class="inputinfo">
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 divbtn52">
                <input id="AAA" onclick="sendParams()" type="submit" value="ثبت" class="btn-primary">
            </div>
        </div>
    </div>
</div>
<script>
    Calendar.setup({
        inputField: 'date_input',
        button: 'date_input',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
    Calendar.setup({
        inputField: 'marriageinput',
        button: 'marriageinput',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
</script>
<script>
    // -----------------------press enter to trigger
    var input20 = document.getElementById("A8");
    input20.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("AAA").click();
        }
    });

    // -----------------------send to database
    function sendParams() {
        var name, LastName, NationalCode, Address, FixedPhoneNumber, Gender, DateOfBirth, Password, DateOfMarriage,
            InviterID, ConfirmPassword, PhoneNumber;
        name = document.getElementById('A1').value;
        LastName = document.getElementById('A2').value;
        NationalCode = document.getElementById('A3').value;
        Address = document.getElementById('A4').value;
        FixedPhoneNumber = document.getElementById('A5').value;
        Gender = document.getElementById('A6').value;
        DateOfBirth = document.getElementById('date_input').value;
        Password = document.getElementById('A11').value;
        DateOfMarriage = document.getElementById('marriageinput').value;
        InviterID = document.getElementById('A10').value;
        ConfirmPassword = document.getElementById('A8').value;
        PhoneNumber = document.getElementById('A12').value;
        if (name == '') {
            document.getElementById('A1').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A1').style.borderColor = '#ced4da';
                document.getElementById('A1').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2400);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا نام خود را وارد کنید';
            $("div.warning").delay(2000).fadeOut(400);
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
            }, 2400);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا نام خانوادگی خود را وارد کنید';
            $("div.warning").delay(2000).fadeOut(400);
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
            }, 2400);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا کد ملی خود را وارد کنید';
            $("div.warning").delay(2000).fadeOut(400);
            return;
        }
        if (DateOfBirth == '') {
            document.getElementById('date_input').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('date_input').style.borderColor = '#ced4da';
                document.getElementById('date_input').style.borderWidth = '1px';

                clearTimeout(
                    inputTimeOut
                );
            }, 2400);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا تاریخ تولد خود را وارد کنید';
            $("div.warning").delay(2000).fadeOut(400);
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
            }, 2400);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا جنسیت خود را انتخاب کنید';
            $("div.warning").delay(2000).fadeOut(400);
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
            }, 2400);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شماره تلفن ثابت خود را وارد کنید';
            $("div.warning").delay(2000).fadeOut(400);
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
            }, 2400);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا آدرس خود را وارد کنید';
            $("div.warning").delay(2000).fadeOut(400);
            return;
        }
        if (Password == '') {
            document.getElementById('A11').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A11').style.borderColor = '#ced4da';
                document.getElementById('A11').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2400);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا گذر واژه ی جدید را وارد کنید';
            $("div.warning").delay(2000).fadeOut(400);
            return;
        }
        if (ConfirmPassword == '') {
            document.getElementById('A8').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A8').style.borderColor = '#ced4da';
                document.getElementById('A8').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2400);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا تکرار گذر واژه جدید را وارد کنید';
            $("div.warning").delay(2000).fadeOut(400);
            return;
        }
        if (ConfirmPassword != Password) {
            alert("گذر واژه ها مطایقت ندارند.");
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
                    $("div.warning").delay(2000).fadeOut(400);
                } else {
                    document.getElementById('Success').style.visibility = 'visible';
                    document.getElementById('Wrong').style.display = 'none';
                    document.getElementById('Success').innerText = jsonData['MSG'];
                    $("div.success").delay(2000).fadeOut(400);
                }

            }
        });

    }
</script>
</body>
</html>