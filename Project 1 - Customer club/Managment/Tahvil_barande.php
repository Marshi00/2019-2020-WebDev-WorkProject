<?php
include "loginCheckAdmin.php";
$userId = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تحویل جایزه</title>
    <link rel="stylesheet" href="Css/events.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <link rel="stylesheet" href="Css/timepicker.min.css"><!--time style-->
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>تحویل جایزه</h3></button>
        </div>

        <div class="col-8 dl34 aa" align="center">

            <input type="text" id="time" placeholder="برای انتخاب زمان کلیک کنید ...">
            <input type="text" id="DateTahvil" placeholder="برای انتخاب تاریح کلیک کنید" class="inputinfo">

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
    <script src="JS/timepicker.min.js"></script>
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
            inputField: 'DateTahvil',
            button: 'DateTahvil',
            ifFormat: '%Y/%m/%d',
            dateType: 'jalali'
        });
    </script>
    <script>
        function sendParams() {
            var DeliveryDate, DeliveryTime, ID;
            DeliveryDate = document.getElementById('DateTahvil').value;
            DeliveryTime = document.getElementById('time').value;
            ID =<?php echo $userId?>;
            if (DeliveryTime == '') {
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
                document.getElementById('Wrong').innerText = 'لطفا زمان را وارد کنید';
                $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
                return;
            }
            if (DeliveryDate == '') {
                document.getElementById('DateTahvil').style.border = '2px solid red';
                let inputTimeOut = setTimeout(function(){
                    document.getElementById('DateTahvil').style.borderColor='#ced4da';
                    document.getElementById('DateTahvil').style.borderWidth='1px';
                    clearTimeout(
                        inputTimeOut
                    );
                },2000);
                document.getElementById('Success').style.visibility = 'hidden';
                document.getElementById('Wrong').style.display = 'block';
                document.getElementById('Wrong').innerText = 'لطفا تاریخ را وارد کنید';
                $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
                return;
            }
            $.ajax({
                url: "15-2DeliveryCompletedWinnerTableDavin.php",
                data: {
                    DeliveryDate: DeliveryDate,
                    DeliveryTime: DeliveryTime,
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