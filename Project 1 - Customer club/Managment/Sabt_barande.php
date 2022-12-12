<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ثبت برنده</title>
    <link rel="stylesheet" href="Css/events.css">
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ثبت برنده</h3></button>
        </div>


        <div class="col-8 dl30" align="center">
            <?php
            $lotteryId=$A->Query("SELECT * FROM lottery ");
            ?>
            <select id="A2">
                <option selected disabled value="">شناسه ی قرعه کشی را انتخاب کنید</option>
                <?php
                while ($lotteryIdGet = mysqli_fetch_assoc($lotteryId)){
                ?>
                <option value="<?php echo $lotteryIdGet['ID']?>"><?php echo $lotteryIdGet['ID'].'-->'.$lotteryIdGet['Name']?></option>
                    <?php
                }
                ?>
            </select>

            <input type="number" id="A1" placeholder="شناسه برنده را وارد کنید ...">

            <input onclick="sendParams() " type="submit" class="btn-primary" value="ثبت">

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
    <script>
        function sendParams() {
            var WinnerID, LotteryID;
            WinnerID = document.getElementById('A1').value;
            LotteryID = document.getElementById('A2').value;
            if (LotteryID == '') {
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
                document.getElementById('Wrong').innerText = 'لطفا شناسه قرعه کشی را وارد کنید';
                $("div.warning").delay(1900).fadeOut(400);
                return;
            }
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
                document.getElementById('Wrong').innerText = 'لطقا شماره همراه برنده را وارد کنید';
                $("div.warning").delay(1900).fadeOut(400);
                return;
            }

            $.ajax({
                url: "15-1SubmitWinnersTableDavin.php",
                data: {
                    WinnerID: WinnerID,
                    LotteryID: LotteryID,
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