<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ثبت کالاها</title>
    <link rel="stylesheet" href="Css/kala.css">
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
        <button type="button" class="btn btn-primary col-12 btnl48"><h3>ثبت کالا</h3></button>
    </div>

    <div class="col-12" align="center">
        <div class="col-lg-8 div01">
            <input type="text" id="A2" placeholder="نام محصول را وارد کنید ..." autofocus>

            <input type="text" id="A1" placeholder="شناسه محصول را وارد کنید ...">

            <input type="number" id="A3" placeholder="قیمت را وارد کنید ...">


            <br>

            <input id="AAA" type="submit" class="btn-primary" onclick="sendParams()" value="ثبت">
            <div class="col-12">
                <div class="col-6 alert warning" id="Wrong" align="center">
                    سلام
                </div>
                <div class="col-6 alert success" id="Success" align="center">
                    سلام
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // trigger
    var input11 = document.getElementById("A4");
    input11.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("AAA").click();
        }
    });
    // send database
    function sendParams() {
        var ProductID, ProductName, Price;
        ProductID = document.getElementById('A1').value;
        ProductName = document.getElementById('A2').value;
        Price = document.getElementById('A3').value;
        if (ProductName == '') {
            document.getElementById('A2').style.border = '2px solid #f44336';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A2').style.borderColor='#ced4da';
                document.getElementById('A2').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا نام محصول را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (ProductID == '') {
            document.getElementById('A1').style.border = '2px solid #f44336';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A1').style.borderColor='#ced4da';
                document.getElementById('A1').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شناسه محصول را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Price == '') {
            document.getElementById('A3').style.border = '2px solid #f44336';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A3').style.borderColor='#ced4da';
                document.getElementById('A3').style.borderWidth='1px';
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
        $.ajax({
            url: "8-1SubmitProduct.php",
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