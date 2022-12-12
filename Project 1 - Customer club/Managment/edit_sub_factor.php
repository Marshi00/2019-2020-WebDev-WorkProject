<?php
include "loginCheckAdmin.php";
$userId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش محصول فاکتور</title>
    <link rel="stylesheet" href="Css/factor.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
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
            <button class="btn btn-primary col-12 btnl25"><h3>ویرایش محصول فاکتور</h3></button>
        </div>
        <div class="col-8 div1">

            <input type="number" id="B2" class="it1" placeholder="شناسه ی محصول را وارد کنید ..." autofocus>

            <input type="number" id="A3" class="it2" placeholder="تعداد محصول را وارد کنید ...">
            <br>

            <select id="A4">
                <option selected disabled value="">وضعیت</option>
                <option value="1">پرداخت شده</option>
                <option value="0">مرجوع شده</option>
            </select>
            <br>
            <input onclick="sendParams()" class="btn-primary" id="AAA" type="submit" value="ثبت">

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
    var input10 = document.getElementById("A1");
    var input11 = document.getElementById("A2");
    input11.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("AAA").click();
        }
    });
    input10.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            $("#A2").focus();
        }
    });

</script>
<script>
    function sendParams() {
        var ProductID,NumbersProduct,ID,Status;
        ProductID=document.getElementById('B2').value;
        NumbersProduct=document.getElementById('A3').value;
        Status=document.getElementById('A4').value;
        ID=<?php echo $userId?>;
        if (ProductID==''){
            document.getElementById('B2').style.border='2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('B2').style.borderColor='#ced4da';
                document.getElementById('B2').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility='hidden';
            document.getElementById('Wrong').style.display='block';
            document.getElementById('Wrong').innerText='لطفا شناسه محصول  را وارد کنید';

            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (NumbersProduct==''){
            document.getElementById('A3').style.border='2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A3').style.borderColor='#ced4da';
                document.getElementById('A3').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility='hidden';
            document.getElementById('Wrong').style.display='block';
            document.getElementById('Wrong').innerText='لطفا تعداد محصول را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        if (Status==''){
            document.getElementById('A4').style.border='2px solid red';
            let inputTimeOut = setTimeout(function(){
                document.getElementById('A4').style.borderColor='#ced4da';
                document.getElementById('A4').style.borderWidth='1px';
                clearTimeout(
                    inputTimeOut
                );
            },2000);
            document.getElementById('Success').style.visibility='hidden';
            document.getElementById('Wrong').style.display='block';
            document.getElementById('Wrong').innerText='لطفا وضعیت را وارد کنید';
            $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
            return;
        }
        $.ajax({
            url: "12-2UPdateFactorDataDavin.php",
            data:{
                ID:ID,
                ProductID:ProductID,
                NumbersProduct:NumbersProduct,
                Status:Status,
            },
            dataType:"json",
            type:"POST",
            success : function (jsonData) {
                if (jsonData['error']){

                    document.getElementById('Success').style.visibility='hidden';
                    document.getElementById('Wrong').style.display='block';
                    document.getElementById('Wrong').innerText=jsonData['MSG'];
                    $( "div.warning" ).delay( 1900 ).fadeOut( 400 );
                }
                else {
                    // var x = "<td>";
                    // #("tbody").append(x);
                    document.getElementById('Success').style.visibility='visible';
                    document.getElementById('Success').innerText=jsonData['MSG'];
                    $( "div.success" ).delay( 1900 ).fadeOut( 400 );

                }

            }
        });

    }
</script>
</body>
</html>