<?php
include "loginCheckAdmin.php";
$userId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش جشنواره</title>
    <link rel="stylesheet" href="Css/events.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <!--    calender-->
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ویرایش جشنواره</h3></button>
        </div>

        <div class="col-8 dl36" align="center">
            <input type="text" id="A3" placeholder="نام جشنواره را وارد کنید ...">
            <input type="number" id="A4" placeholder="ضریب امتیاز را وارد کنید ...">

            <input type="text" id="DateStart" placeholder="برای انتخاب تاریخ شروع کلیک کنید ..." class="inputinfo">

            <input type="text" id="DateEnd" placeholder="برای انتخاب تاریخ پایان کلیک کنید ..." class="inputinfo">

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
        inputField: 'DateStart',
        button: 'DateStart',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
    Calendar.setup({
        inputField: 'DateEnd',
        button: 'DateEnd',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
</script>
<script>
    function sendParams() {
        var StartDate, ExpireDate, Multiplier, EventName, ID;
        StartDate = document.getElementById('DateStart').value;
        ExpireDate = document.getElementById('DateEnd').value;
        Multiplier = document.getElementById('A4').value;
        EventName = document.getElementById('A3').value;
        ID =<?php echo $userId ?>;
        if (EventName == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا نام جشنواره را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Multiplier == '') {
            document.getElementById('A4').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A4').style.borderColor='#ced4da';
                document.getElementById('A4').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا ضریب را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }

        if (StartDate == '') {
            document.getElementById('DateStart').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('DateStart').style.borderColor='#ced4da';
                document.getElementById('DateStart').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا تاریخ شروع را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (ExpireDate == '') {
            document.getElementById('DateEnd').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('DateEnd').style.borderColor='#ced4da';
                document.getElementById('DateEnd').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا تاریخ پایان را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        $.ajax({
            url: "5-2UPdateEventDavin.php",
            data: {
                StartDate: StartDate,
                ExpireDate: ExpireDate,
                Multiplier: Multiplier,
                EventName: EventName,
                ID: ID,
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