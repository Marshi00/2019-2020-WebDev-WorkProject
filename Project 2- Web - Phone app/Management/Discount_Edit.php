<html lang="en">
<head>
    <title>ویرایش تخفیف</title>

    <?php
    include "link.php";
    ?>
    <!--alert-->
    <link href="css/notiflix-1.8.0.css" rel="stylesheet"/>
    <script src="js/notiflix-1.8.0.js"></script>


</head>

<body>

<section id="container">
    <?php
    include "header.php";
    ?>
    <?php
    include "sidebar.php";
    ?>
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="adminform">
        <section class="panel discountSection">
            <header class="panel-heading">
                ویرایش تخفیف
            </header>
            <div class="panel-body">

                <div class="form-group container-fluid">
                    <label for="discountCode">کد تخفیف را وارد کنید</label>
                    <br>
                    <input type="number" class="form-control" id="discountCode" >
                </div>

                <div class="form-group container-fluid">
                    <label for="discountValue">ارزش تخفیف را وارد کنید</label>
                    <br>
                    <input type="number" class="form-control" id="discountValue" placeholder="مبلغ به ریال">
                </div>





                <span class="btn btn-lg btn-login btn-block" onclick="sendData()">ثبت</span>

            </div>
        </section>

    </div>
                <?php
                include "footer.php";
                ?>

            </div>
        </section>
    </section>
</section>

<?php
include "js link.php";
?>

<script>
    Notiflix.Notify.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        timeout: 1500,
    });
</script>
<script>
    Notiflix.Confirm.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        cancelButtonBackground: "#ef2828",
    });
</script>
<script>
    function sendData() {
        var discountCode = $('#discountCode').val();
        var discountValue = $('#discountValue').val();

        if (discountCode == '') {
            document.getElementById('discountCode').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('discountCode').style.borderColor = '#ced4da';
                document.getElementById('discountCode').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (discountValue == '') {
            document.getElementById('discountValue').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('discountValue').style.borderColor = '#ced4da';
                document.getElementById('discountValue').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }

        Notiflix.Confirm.Show('افزودن پیام', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "3-4LoginUserDavin.php",
                    data: {
                        discountCode: discountCode,
                        discountValue: discountValue,

                    },
                    dataType: "json",
                    type: "POST",
                    success: function (jsonData) {
                        if (jsonData['error']) {
                            Notiflix.Notify.Failure(jsonData['MSG']);

                        } else {
                            Notiflix.Notify.Success(jsonData['MSG']);
                        }
                    }
                });
            },
            function () { // No button callback
                return;
            }
        );


    }
</script>

</body>
</html>
