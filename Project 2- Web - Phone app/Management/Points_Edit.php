<?php
include "0-2loginCheckAdmin2.php";
$id = $_GET['id'];
$user_id = $_SESSION['id'];
$need = $A->Query("SELECT *,points.id as pid FROM POINTS,workers,user WHERE points.workerId=workers.id AND points.userId=user.id");
$select=$A->FetchAssoc($need);
$it=$A->Query("SELECT * FROM points WHERE id='$id'");
$items=$A->FetchAssoc($it);
?>
<html lang="en">
<head>
    <title>ویرایش امتیاز</title>

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
                            ویرایش امتیاز
                        </header>
                        <div class="panel-body">

                            <div class="form-group container-fluid">
                                <label for="point"> امتیاز را انتخاب کنید</label><br>
                                <input type="text" class="form-control"  id="point" value="">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="pointList">شناسه متخصص را انتخاب کنید</label><br>
                                <input type="text" class="form-control" disabled value="<?php echo $select['nationalCode']?>" id="pointList">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="costumerCode">شناسه مشتری را وارد کنید</label><br>
                                <input type="text" class="form-control" disabled value="<?php echo $select['PhoneNumber']?>" id="costumerCode">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="orderPoint">شناسه سفارش را وارد کنید</label><br>
                                <input type="text" class="form-control" disabled value="<?php echo $select['orderListId']?>" id="orderPoint">
                            </div>

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
        var user_id = <?php echo $user_id ?>;
        var id = <?php echo $id ?>;
        var costumerCode = <?php echo $items['userId'] ?>;
        var point = $('#point').val();
        var orderListId = <?php echo $items['orderListId'] ?>;
        var workerId = <?php echo $items['workerId'] ?>;

        // if (costumerCode == "") {
        //     document.getElementById('pointList').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('pointList').style.borderColor = '#ced4da';
        //         document.getElementById('pointList').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 1500);
        //     Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
        //     return;
        // }
        if (point == "") {
            document.getElementById('point').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('point').style.borderColor = '#ced4da';
                document.getElementById('point').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        // if (orderListId == "") {
        //     document.getElementById('costumerCode').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('costumerCode').style.borderColor = '#ced4da';
        //         document.getElementById('costumerCode').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 1500);
        //     Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
        //     return;
        // }
        // if (workerId == "") {
        //     document.getElementById('point').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('point').style.borderColor = '#ced4da';
        //         document.getElementById('point').style.borderWidth = '1px';
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
                    url: "12-2upPoint.php",
                    data: {
                        userId: costumerCode,
                        points: point,
                        orderListId: orderListId,
                        workerId: workerId,
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
            return
            }
        );


    }

</script>
</body>
</html>
