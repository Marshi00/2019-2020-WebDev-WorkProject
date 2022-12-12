<?php
include "loginCheckAdmin.php";
$kalaId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش کالاها</title>
    <link rel="stylesheet" href="Css/kala.css">
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ویرایش کالا</h3></button>
        </div>

        <div class="col-10 div01" align="center">

            <input type="text" id="A2" name="firstname" placeholder="نام محصول را وارد کنید ..." autofocus>

            <input type="text" value="<?php echo $kalaId ?>" disabled id="A1" name="firstname" ">

            <input type="text" id="A3" name="lastname" placeholder="قیمت را وارد کنید ...">

            <br>
            <input onclick="sendParams()" class="btn-primary" type="submit" value="ثبت">

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
        var ProductID, ProductName, Price;
        ProductID = document.getElementById('A1').value;
        ProductName = document.getElementById('A2').value;
        Price = document.getElementById('A3').value;
        if (ProductID == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا شناسه محصول را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (ProductName == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا نام محصول را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (Price == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا قیمت را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        $.ajax({
            url: "8-2UPdateProduct.php",
            data: {
                ProductID: ProductID,
                ProductName: ProductName,
                Price: Price,
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