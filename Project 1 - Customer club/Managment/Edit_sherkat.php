<?php
include "loginCheckAdmin.php";
$companyId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش شرکت</title>
    <link rel="stylesheet" href="Css/gharardad.css">
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ویرایش شرکت</h3></button>
        </div>


        <div class=" col-8 div01" align="center">
            <input type="text" id="A1" name="firstname" placeholder="نام شرکت را وارد کنید ...">

            <input type="number" id="A5" name="lastname" placeholder="کد اقتصادی شرکت را وارد کنید ...">
            <input type="number" id="A3" name="firstname" placeholder="شناسه ملی شرکت را وارد کنید ...">

            <input type="number" id="A2" name="lastname" placeholder="شماره ثبت شرکت را وارد کنید ...">
            <input type="number" id="A4" name="firstname" placeholder="شماره تلفن شرکت را وارد کنید ...">

            <input type="text" id="A6" name="lastname" placeholder="استان را وارد کنید ...">

            <input type="text" id="A7" name="lastname" placeholder="شهر را وارد کنید ...">

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
    function sendParams() {
        var CompanyName, CompanyRegistrationNumber, CompanyNationalID, FixedPhoneNumber, EconomicCode, Province, City,
            ID;
        CompanyName = document.getElementById('A1').value;
        CompanyRegistrationNumber = document.getElementById('A2').value;
        CompanyNationalID = document.getElementById('A3').value;
        FixedPhoneNumber = document.getElementById('A4').value;
        EconomicCode = document.getElementById('A5').value;
        Province = document.getElementById('A6').value;
        City = document.getElementById('A7').value;
        ID =<?php echo $companyId ?>;

        if (CompanyName == '') {
            document.getElementById('A1').style.border = '2px solid red';
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا اسم شرکت را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (EconomicCode == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا کد اقتصادی را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (CompanyNationalID == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا شماره ملی شرکت را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (CompanyRegistrationNumber == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا شماره ثبت شرکت را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (FixedPhoneNumber == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا شماره تلفن ثابت را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Province == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا استان را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (City == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا شهر را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        $.ajax({
            url: "6-2UPdateCompanyTableDavin.php",
            data: {
                CompanyName: CompanyName,
                CompanyRegistrationNumber: CompanyRegistrationNumber,
                CompanyNationalID: CompanyNationalID,
                FixedPhoneNumber: FixedPhoneNumber,
                EconomicCode: EconomicCode,
                Province: Province,
                City: City,
                ID: ID,
            },
            dataType: "json",
            type: "POST",
            success: function (jsonData) {
                if (jsonData['error']) {
                    document.getElementById('Success').style.visibility = 'hidden';
                    document.getElementById('Wrong').style.display = 'block';
                    document.getElementById('Wrong').innerText = jsonData['MSG'];
                } else {
                    document.getElementById('Success').style.visibility = 'visible';
                    document.getElementById('Wrong').style.display = 'none';
                    document.getElementById('Success').innerText = jsonData['MSG'];
                }

            }
        });

    }
</script>
</body>

</html>