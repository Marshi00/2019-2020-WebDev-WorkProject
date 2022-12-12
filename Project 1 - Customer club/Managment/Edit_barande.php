<?php
include "loginCheckAdmin.php";
$userId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش برنده</title>
    <link rel="stylesheet" href="Css/events.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <link rel="stylesheet" href="dist/css/newcss.css">
    <link rel="stylesheet" href="Css/timepicker.min.css">
    <!--calender-->
    <link rel="stylesheet" href="Css/calendar-blue2.css">
    <script src="JS/jalali.js"></script>
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ویرایش برنده</h3></button>
        </div>

        <div class="col-8 dl321" align="center">
            <input type="number" id="A1" placeholder="شماره همراه برنده">
            <?php
            $lotteryId=$A->Query("SELECT * FROM lottery ");
            ?>
            <select id="A3">
                <option selected disabled value="">شناسه ی قرعه کشی را انتخاب کنید</option>
                <?php
                while ($lotteryIdGet = mysqli_fetch_assoc($lotteryId)){
                    ?>
                    <option value="<?php echo $lotteryIdGet['ID']?>"><?php echo $lotteryIdGet['ID'].'-->'.$lotteryIdGet['Name']?></option>
                    <?php
                }
                ?>
            </select>

            <input type="text" id="A2" placeholder="برای انتخاب تاریخ تحویل کلیک کنید">

            <input type="text" id="A4" placeholder="برای انتخاب زمان تحویل کلیک کنید">
            <br>
            <select id="A5">
                <option disabled selected value="">وضعیت را انتخاب کنید</option>
                <option value="1">تحویل شده است</option>
                <option value="0">تحویل نشده است</option>
            </select>

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
<script src="JS/timepicker.min.js"></script>
// time
<script>// time
    var timepicker = new TimePicker('A4', {
        lang: 'en',
        theme: 'dark'
    });
    timepicker.on('change', function (evt) {
        var value = (evt.hour || '00') + ':' + (evt.minute || '00');
        evt.element.value = value;
    });
</script>
<script><!--calender-->
    Calendar.setup({
        inputField: 'A2',
        button: 'A2',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
</script>
<script>
    function sendParams() {
        var WinnerID, DeliveryDate, LotteryID, DeliveryTime, Status, ID;
        WinnerID = document.getElementById('A1').value;
        DeliveryDate = document.getElementById('A2').value;
        LotteryID = document.getElementById('A3').value;
        DeliveryTime = document.getElementById('A4').value;
        Status = document.getElementById('A5').value;
        ID =<?php echo $userId?>;
        if (WinnerID == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا شماره همراه برنده را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (LotteryID == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا شناسه قرعه کشی را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (DeliveryDate == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا تاریخ تحویل را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (DeliveryTime == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا زمان تحویل را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (Status == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا وضعیت تحویل را انتخاب کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        $.ajax({
            url: "15-3UPdateWinnerTable.php",
            data: {
                WinnerID: WinnerID,
                DeliveryDate: DeliveryDate,
                LotteryID: LotteryID,
                DeliveryTime: DeliveryTime,
                Status: Status,
                ID: ID,
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