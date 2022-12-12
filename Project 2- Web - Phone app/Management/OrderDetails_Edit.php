<?php
include "0-2loginCheckAdmin2.php";
$id = $_GET['id'];
$user_id = $_SESSION['id'];
$infoVal=$A->Query("SELECT * FROM paymentamountlist WHERE id='$id'");
$infoValFetch=$A->FetchAssoc($infoVal);
?>
<html lang="en">
<head>
    <title>ویرایش جزئیات سفارش</title>

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
                    <section class="panel orderSection">
                        <header class="panel-heading">
                            ویرایش جزئیات سفارش
                        </header>
                        <div class="panel-body">

                            <div class="form-group container-fluid">
                                <label for="costcash">میزان پرداخت نقدی را وارد کنید</label><br>
                                <input type="text" class="form-control" id="costcash" value="<?php echo $infoValFetch['cash']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="costcart">میزان هزینه های جانبی را وارد کنید</label><br>
                                <input type="text" class="form-control" id="costcart" value="<?php echo $infoValFetch['operatingCosts']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="costweb">میزان پرداخت از وبسایت را وارد کنید</label><br>
                                <input type="text" class="form-control" id="costweb" value="<?php echo $infoValFetch['webPayment']?>">
                            </div>
<!--                            <div class="form-group container-fluid">-->
<!--                                <label for="expertid">شناسه متخصص را وارد کنید</label><br>-->
<!--                                <input type="text" class="form-control" id="expertid">-->
<!--                            </div>-->
<!--                            <div class="form-group container-fluid">-->
<!--                                <label for="commision">پورسانت را وارد کنید</label><br>-->
<!--                                <input type="text" class="form-control" id="commision">-->
<!--                            </div>-->
<!--                            <div class="form-group container-fluid">-->
<!--                                <label for="finalPrice">مبلغ نهایی را وارد کنید</label><br>-->
<!--                                <input type="text" class="form-control" id="finalPrice">-->
<!--                            </div>-->

                            <span class="btn btn-lg btn-login btn-block" onclick="send()">ثبت</span>

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
    function send() {
        var costcash = $('#costcash').val();
        var costcart = $('#costcart').val();
        var costweb = $('#costweb').val();
        var id = <?php echo $id ?>;
        var user_id = <?php echo $user_id ?>;

        if (costcash == "") {
            document.getElementById('costcash').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('costcash').style.borderColor = '#ced4da';
                document.getElementById('costcash').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (costcart == "") {
            document.getElementById('costcart').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('costcart').style.borderColor = '#ced4da';
                document.getElementById('costcart').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (costweb == "") {
            document.getElementById('costweb').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('costweb').style.borderColor = '#ced4da';
                document.getElementById('costweb').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        // if (expertid == "") {
        //     document.getElementById('expertid').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('expertid').style.borderColor = '#ced4da';
        //         document.getElementById('expertid').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 1500);
        //     Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
        //     return;
        // }
        // if (commision == "") {
        //     document.getElementById('commision').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('commision').style.borderColor = '#ced4da';
        //         document.getElementById('commision').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 1500);
        //     Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
        //     return;
        // }
        // if (finalPrice == "") {
        //     document.getElementById('finalPrice').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('finalPrice').style.borderColor = '#ced4da';
        //         document.getElementById('finalPrice').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 1500);
        //     Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
        //     return;
        // }
        Notiflix.Confirm.Show('تایید پیام', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "11-2upPayAmuntlist.php",
                    data: {
                        cash: costcash,
                        operatingCosts: costcart,
                        webPayment: costweb,
                        id: id,
                        user_id: user_id,
                    },
                    dataType: "json",
                    type: "POST",
                    success: function (jsonData) {
                        if (jsonData['error']) {
                            Notiflix.Notify.Failure(jsonData['MSG']);
                        } else {
                            Notiflix.Notify.Failure(jsonData['MSG']);
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
