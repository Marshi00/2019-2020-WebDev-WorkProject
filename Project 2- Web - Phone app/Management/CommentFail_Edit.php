<html lang="en">
<head>
    <title>ویرایش کامنت های تائید نشده</title>

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
                            ویرایش کامنت های تائید نشده
                        </header>
                        <div class="panel-body">

                            <div class="form-group container-fluid">
                                <label for="expertCode">شناسه متخصص را وارد کنید</label>
                                <input type="text" class="form-control" id="expertCode" value="">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="orderCode">شناسه سفارش را وارد کنید</label>
                                <input type="text" class="form-control" id="orderCode" value="">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="customerCode">شناسه مشتری را وارد کنید</label>
                                <input type="number" class="form-control" id="customerCode" value="">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="comment">نظر را وارد کنید</label>
                                <input type="password" class="form-control" id="comment" value="">
                            </div>

                            <div class="form-group container-fluid">
                                <label for="status">وضعیت را انتخاب کنید</label>
                                <br>
                                <select id="status">
                                    <option value="" selected disabled>وضعیت</option>
                                    <option value="1">فعال</option>
                                    <option value="2">غیرفعال</option>
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
        var orderCode = $('#orderCode').val();
        var customerCode = $('#customerCode').val();
        var comment = $('#comment').val();
        var status = document.getElementById('status').value;

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
        if (orderCode == '') {
            document.getElementById('orderCode').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('orderCode').style.borderColor = '#ced4da';
                document.getElementById('orderCode').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (customerCode == '') {
            document.getElementById('customerCode').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('customerCode').style.borderColor = '#ced4da';
                document.getElementById('customerCode').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (comment == '') {
            document.getElementById('comment').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('comment').style.borderColor = '#ced4da';
                document.getElementById('comment').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (status == '') {
            document.getElementById('status').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('status').style.borderColor = '#ced4da';
                document.getElementById('status').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }

        Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "3-4LoginUserDavin.php",
                    data: {
                        expertCode: expertCode,
                        orderCode: orderCode,
                        customerCode: customerCode,
                        comment: comment,
                        status: status,
                    },
                    dataType: "json",
                    type: "POST",
                    success: function (jsonData) {
                        if (jsonData['error']) {
                            Notiflix.Report.Failure(jsonData['MSG'], '', 'بستن');
                            let reportTimeout = setTimeout(function () {
                                document.getElementById("NXReportButton").click();
                                clearTimeout(
                                    reportTimeout
                                );
                            }, 1500);
                        } else {
                            Notiflix.Notify.Success(jsonData['MSG']);
                        }
                    }
                });
            },
            function () { // No button callback
                return;
            });


    }


</script>
</body>
</html>
