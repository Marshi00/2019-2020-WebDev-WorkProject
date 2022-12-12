<?php
include "0-2loginCheckAdmin2.php";
$id = $_GET['id'];
$user_id = $_SESSION['id'];
$infoVal=$A->Query("SELECT * FROM commissionpayment WHERE id='$id'");
$infoValFetch=$A->FetchAssoc($infoVal);
$statusGet=$infoValFetch['Status'];
?>
<html lang="en">
<head>
    <title>ویرایش اطلاعات پورسانت پرداخت شده</title>

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
                            ویرایش اطلاعات پورسانت پرداخت شده
                        </header>
                        <div class="panel-body">

                            <div class="form-group container-fluid">
                                <label for="expertCode">شناسه متخصص را وارد کنید</label>
                                <input type="number" class="form-control" id="expertCode" value="">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="paidPrice">مبلغ پرداخت شده را وارد کنید</label>
                                <input type="number" placeholder="مبلغ به ریال" class="form-control" id="paidPrice" value="<?php echo $infoValFetch['amount']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="paymentCode">شماره پیگیری پرداخت را وارد کنید</label>
                                <input type="number" class="form-control" id="paymentCode" value="<?php echo $infoValFetch['PaymentTrackingNumber']?>">
                            </div>

                            <div class="form-group container-fluid">
                                <label for="statusSet">وضعیت را انتخاب کنید</label>
                                <br>
                                <select id="statusSet">
                                    <option value="" selected disabled>وضعیت</option>
                                    <option value="1"<?php if($statusGet=='1')echo "selected"?>>پرداخت شده</option>
                                    <option value="0"<?php if($statusGet=='0')echo "selected"?>>ناموفق</option>
                                </select>
                            </div>

                            <button class="btn btn-lg btn-login btn-block"
                                    onclick="sendData()">ثبت
                            </button>

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
        var expertCode = $('#expertCode').val();
        var paidPrice = $('#paidPrice').val();
        var paymentCode = $('#paymentCode').val();
        var statusSet = document.getElementById('statusSet').value;
        var user_id = <?php echo $user_id ?>;
        var id = <?php echo $id ?>;


        if (expertCode == '') {
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
        if (paidPrice == '') {
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
        if (paymentCode == '') {
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
        if (statusSet == '') {
            document.getElementById('statusSet').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('statusSet').style.borderColor = '#ced4da';
                document.getElementById('statusSet').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        Notiflix.Confirm.Show('تایید پیام', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "3-2upCoPay.php",
                    data: {
                        worker: expertCode,
                        amount: paidPrice,
                        PaymentTrackingNumber: paymentCode,
                        Status: statusSet,
                        user_id: user_id,
                        id: id,
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
