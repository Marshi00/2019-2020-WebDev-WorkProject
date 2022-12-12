<?php
include "loginCheckAdmin.php";
$setInfo = $_SESSION['nationalCode'];
$getinfo = $A->Query("SELECT * FROM admin WHERE `ID(national code)`='$setInfo'");
$info = $A->FetchAssoc($getinfo);
$FactorId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش فاکتور</title>
    <link rel="stylesheet" href="Css/factor.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <link rel="stylesheet" href="dist/css/newcss.css">

    <?php
    include "link.php"
    ?>

</head>

<body class="hold-transition sidebar-mini bsk">

<?php
include "nav.php";
?>
<div class="content-wrapper">
    <div class="col-12">
        <button type="button" class="btn btn-primary col-12 btnl482"><h3>ویرایش فاکتور</h3></button>
    </div>

    <div class="col-8 div1">
        <input type="text" id="A1" value="<?php echo $FactorId ?>" disabled name="firstname" ">

        <input type="text" id="cat" onkeypress="getSubCat()" name="lastname" placeholder="شماره همراه کاربر را وارد کنید ...">

        <input type="text" id="A3" value="<?php echo $info['ID(national code)'] ?>" disabled name="lastname">
        <?php
        $companyContract = $A->Query("SELECT * FROM companycontract ");
        ?>
        <input type="text" id="subCat" value="" name="lastname" disabled placeholder="امتیاز مجاز،لطفا شماره همراه کاربر را وارد کند">
        <select id="A4">
            <option selected disabled value="">روش پرداخت</option>
            <option value="1">نقدی</option>
            <option value="0">اقساطی</option>
        </select>

        <select id="A5">
            <option selected disabled value="">وضعیت پرداخت</option>
            <option value="1">پرداخت شده است</option>
            <option value="0">پرداخت نشده است</option>
        </select>

        <select id="A6">
            <option selected disabled value="">شناسه قرارداد</option>
            <?php
            while ($rowCompanyContract = mysqli_fetch_assoc($companyContract)) {
                ?>
                <option value="<?php echo $rowCompanyContract['ID'] ?>"><?php echo $rowCompanyContract['ID'] . '-->' . $rowCompanyContract['CompanyName'] ?></option>
                <?php
            }
            ?>
        </select>

        <input type="text" id="A7" name="lastname" placeholder="مبلغ فاکتور را وارد کنید ...">

        <input type="text" id="A8" name="lastname" placeholder="امتیازات مصرف شده را وارد کنید ...">

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
<script>
    function getSubCat() {
        var cat = $("#cat").val();
        $.ajax({
            url:"getSubCat2.php",
            data: {
                catId:cat
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if(!data['error']){
                    document.getElementById('subCat').value = data['MSG'];
                }
            }
        });
    }
</script>
<script>
    function sendParams() {
        var FactorID, UserID, AdminID, PaymentMethod, PaymentStatus, ContractID, finalPrice, UsedCredit;
        FactorID = document.getElementById('A1').value;
        UserID = document.getElementById('cat').value;
        AdminID = document.getElementById('A3').value;
        PaymentMethod = document.getElementById('A4').value;
        PaymentStatus = document.getElementById('A5').value;
        ContractID = document.getElementById('A6').value;
        finalPrice = document.getElementById('A7').value;
        UsedCredit = document.getElementById('A8').value;
        if (FactorID == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا شناسه فاکتور را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (UserID == '') {
            document.getElementById('cat').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('cat').style.borderColor='#ced4da';
                document.getElementById('cat').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شماره همراه کاربر را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (AdminID == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا کد ملی ادمین را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (PaymentMethod == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا روش پرداخت را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (PaymentStatus == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا وضعیت پرداخت را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (finalPrice == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا مبلغ فاکتور را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        $.ajax({
            url: "11-2UPdateFactorDavin.php",
            data: {
                FactorID: FactorID,
                UserID: UserID,
                AdminID: AdminID,
                PaymentMethod: PaymentMethod,
                PaymentStatus: PaymentStatus,
                ContractID: ContractID,
                finalPrice: finalPrice,
                UsedCredit: UsedCredit,
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