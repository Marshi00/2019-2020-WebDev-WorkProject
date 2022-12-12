<?php
include "loginCheckAdmin.php";
$userId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش قرارداد</title>
    <link rel="stylesheet" href="Css/gharardad.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ویرایش قرارداد</h3></button>
        </div>

        <div class="col-8 div01" align="center">
            <?php
            $company = $A->Query("SELECT * FROM company ");
            ?>
            <select id="A2">
                <option disabled selected value="">نام شرکت</option>
                <?php
                while ($rowCompany = mysqli_fetch_assoc($company)) {
                    ?>
                    <option value="<?php echo $rowCompany['ID'] ?>"><?php echo $rowCompany['ID'].'---->'.$rowCompany['CompanyName']?></option>
                    <?php
                }
                ?>
            </select>

            <input type="text" id="A7" name="lastname" placeholder="مبلغ مجاز خرید را وارد کنید ...">

            <input type="text" id="A6" name="firstname" placeholder="تعداد اقساط را وارد کنید ...">


            <input type="text" id="A3" name="lastname" placeholder="دوره اقساط را وارد کنید ...">


            <input type="text" id="DateStart" placeholder="برای انتخاب تاریح شروع کلیک کنید">


            <input type="text" id="DateEnd" placeholder="برای انتخاب تاریح شروع کلیک کنید">

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
        var  CompanyID, InstallmentPeriod, StartDate, ExpDate, InstallmentNumbers, PaymentAmount,
            ID;
        CompanyID = document.getElementById('A2').value;
        InstallmentPeriod = document.getElementById('A3').value;
        StartDate = document.getElementById('DateStart').value;
        ExpDate = document.getElementById('DateEnd').value;
        InstallmentNumbers = document.getElementById('A6').value;
        PaymentAmount = document.getElementById('A7').value;
        ID =<?php echo $userId ?>;
        if (CompanyID == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا شناسه شرکت را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (PaymentAmount == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا میلغ مجاز را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (InstallmentNumbers == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا تعداد اقساط را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }

        if (InstallmentPeriod == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا دوره اقساط را وارد کنید';
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
        if (ExpDate == '') {
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
            url: "4-2UPdateCompanyContractTableDavin.php",
            data: {
                CompanyID: CompanyID,
                InstallmentPeriod: InstallmentPeriod,
                StartDate: StartDate,
                ExpDate: ExpDate,
                InstallmentNumbers: InstallmentNumbers,
                PaymentAmount: PaymentAmount,
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