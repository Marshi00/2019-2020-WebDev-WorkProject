<?php
include "0-2loginCheckAdmin2.php";
$id = $_GET['id'];
$user_id = $_SESSION['id'];
$infoVal=$A->Query("SELECT * FROM workerspayment WHERE id='$id'");
$infoValFetch=$A->FetchAssoc($infoVal);
$statusGet=$infoValFetch['Status'];
?>
<html lang="en">
<head>
    <title>ویرایش اطلاعات مبلغ واریز شده</title>

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
                            ویرایش اطلاعات مبلغ واریز شده
                        </header>
                        <div class="panel-body">
                            <div class="form-group container-fluid">
                                <label for="expertCode">شناسه متخصص را وارد کنید</label>
                                <input type="number" class="form-control" id="expertCode" value="">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="paymentCode">شماره پیگیری پرداخت را وارد کنید</label>
                                <input type="number" class="form-control" id="paymentCode" value="<?php echo $infoValFetch['PaymentTrackingNumber']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="price">مبلغ را وارد کنید</label>
                                <input type="text" placeholder="مبلغ به ریال" class="form-control" id="price" value="<?php echo $infoValFetch['paymentAmount']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="statusSet">وضعیت را انتخاب کنید</label>
                                <br>
                                <select id="statusSet">
                                    <option value="" selected disabled>وضعیت</option>
                                    <option value="1"<?php if($statusGet=='1')echo "selected"?>>پرداخت شده</option>
                                    <option value="0"<?php if($statusGet=='0')echo "selected"?>>نا موفق</option>
                                </select>
                            </div>

                            <button class="btn btn-lg btn-login btn-block"
                                    onclick="sendData();">ثبت
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
        var paymentCode = $('#paymentCode').val();
        var price = $('#price').val();
        var statusSet = document.getElementById('statusSet').value;
        var id = <?php echo $id ?>;
        var user_id = <?php echo $user_id ?>;

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
        if (price == '') {
            document.getElementById('price').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('price').style.borderColor = '#ced4da';
                document.getElementById('price').style.borderWidth = '1px';
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
        Notiflix.Confirm.Show('ثبت اطلاعات پرداخت', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "15-2upWorkersPayment.php",
                    data: {
                        worker: expertCode,
                        PaymentTrackingNumber: paymentCode,
                        paymentAmount: price,
                        status: statusSet,
                        id: id,
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
