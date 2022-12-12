<?php
include "0-4loginCheckAdmin4.php";
$user_id = $_SESSION['id']
?>
<html lang="en">
<head>
    <title>افزودن پورسانت های پرداخت شده</title>

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
                <div class="col-lg-12" id="adminform">
                    <section class="panel adminSection">
                        <header class="panel-heading">
                            افزودن پورسانت های پرداخت شده
                        </header>

                        <div class="panel-body">

                            <div class="form-group container-fluid">
                                <label for="expertCode">شناسه متخصص را وارد کنید</label>
                                <input type="number" placeholder="کد ملی" class="form-control" id="expertCode" value="">
                            </div>

                            <div class="form-group container-fluid">
                                <label for="paidPrice">مبلغ پرداخت شده را وارد کنید</label>
                                <input type="number" placeholder="مبلغ به ریال" class="form-control" id="paidPrice" value="">
                            </div>

                            <div class="form-group container-fluid">
                                <label for="paymentCode">شماره پیگیری پرداخت را وارد کنید</label>
                                <input type="number" class="form-control" id="paymentCode" value="">
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
        var worker = $('#expertCode').val();
        var paidPrice = $('#paidPrice').val();
        var paymentCode = $('#paymentCode').val();
        var user_id = <?php echo $user_id ?>;


        if (expertCode == "") {
            document.getElementById('expertCode').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('expertCode').style.borderColor = '#ced4da';
                document.getElementById('expertCode').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }

        if (paidPrice == "") {
            document.getElementById('paidPrice').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('paidPrice').style.borderColor = '#ced4da';
                document.getElementById('paidPrice').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (paymentCode == "") {
            document.getElementById('paymentCode').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('paymentCode').style.borderColor = '#ced4da';
                document.getElementById('paymentCode').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }

        Notiflix.Confirm.Show('افزودن به پرداخت شده ها', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "3-1subCoPay.php",
                    data: {
                        worker: worker,
                        amount: paidPrice,
                        PaymentTrackingNumber: paymentCode,
                        user_id: user_id,
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
