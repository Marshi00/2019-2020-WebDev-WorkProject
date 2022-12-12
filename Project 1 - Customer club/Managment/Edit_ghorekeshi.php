<?php
include "loginCheckAdmin.php";
$userId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش قرعه کشی</title>
    <link rel="stylesheet" href="Css/events.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <link rel="stylesheet" href="dist/css/newcss.css">
    <link rel="stylesheet" href="Css/timepicker.min.css">
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ویرایش قرعه کشی</h3></button>
        </div>

        <div class="col-8 dl34" align="center" >
            <input type="text" id="A1"  placeholder="نام قرعه کشی را وارد کنید ...">
            <input type="text" id="A6"  placeholder="جایزه را وارد کنید ...">
            <input type="number" id="A5"  placeholder="تعداد برندگان را وارد کنید ...">
            <input type="number" id="A4"  placeholder="حداقل امتیاز را وارد کنید ...">
            <input type="text" id="time"  placeholder="برای انتخاب زمان کلیک کنید ...">
            <input type="text" id="DateGhorekeshi" placeholder="برای انتخاب تاریخ کلیک کنید ..."
                   class="inputinfo">
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
<script src="JS/timepicker.min.js"></script>// time
<script>// time
    var timepicker = new TimePicker('time', {
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
        inputField: 'DateGhorekeshi',
        button: 'DateGhorekeshi',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
</script>

<script>
    function sendParams() {
        var Name, Time, Date, MinPoints, NumberOfWinners, Prize, ID;
        Name = document.getElementById('A1').value;
        Time = document.getElementById('time').value;
        Date = document.getElementById('DateGhorekeshi').value;
        MinPoints = document.getElementById('A4').value;
        NumberOfWinners = document.getElementById('A5').value;
        Prize = document.getElementById('A6').value;
        ID =<?php echo $userId?>;
        if (Name == '') {
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
        if (Prize == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا قیمت را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (NumberOfWinners == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا تعداد برندگان را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (MinPoints == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا حداقل امتیاز را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Time == '') {
            document.getElementById('time').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('time').style.borderColor='#ced4da';
                document.getElementById('time').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'برای انتخاب زمان کلیک کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Date == '') {
            document.getElementById('DateGhorekeshi').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('DateGhorekeshi').style.borderColor='#ced4da';
                document.getElementById('DateGhorekeshi').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'برای انتخاب تاریخ کلیک کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        $.ajax({
            url: "7-2UPdateLotteryDavin.php",
            data: {
                Name: Name,
                Time: Time,
                Date: Date,
                MinPoints: MinPoints,
                NumberOfWinners: NumberOfWinners,
                Prize: Prize,
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