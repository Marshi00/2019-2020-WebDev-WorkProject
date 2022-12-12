<?php
include "0-2loginCheckAdmin2.php";
$id = $_GET['id'];
$user_id = $_SESSION['id'];
$need = $A->Query("SELECT * FROM comments,workers,user WHERE comments.id=$id AND comments.workerId=workers.id AND comments.userId=user.id ");
$select=$A->FetchAssoc($need);
$table=$A->Query("SELECT * FROM comments WHERE id=$id");
$tbData=$A->FetchAssoc($table);
$statusGet=$tbData['Status'];
?>
<html lang="en">
<head>
    <title>ویرایش کامنت ها</title>

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
                            ویرایش کامنت ها
                        </header>
                        <div class="panel-body">

                            <div class="form-group container-fluid">
                                <label for="expertCode">شناسه متخصص را وارد کنید</label>
                                <input type="number" class="form-control" disabled id="expertCode" value="<?php echo $select['nationalCode']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="orderCode">شناسه سفارش را وارد کنید</label>
                                <input type="number" class="form-control" disabled id="orderCode" value="<?php echo $select['orderListId']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="customerCode">شناسه مشتری را وارد کنید</label>
                                <input type="number" class="form-control" disabled id="customerCode" value="<?php echo $select['PhoneNumber']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="comment">نظر را وارد کنید</label>
                                <input type="text" class="form-control" id="comment" value="<?php echo $select['Comment']?>">
                            </div>

                            <div class="form-group container-fluid">
                                <label for="status">وضعیت را انتخاب کنید</label>
                                <br>
                                <select id="status">
                                    <option value="" selected disabled>وضعیت</option>
                                    <option value="0"<?php if($statusGet=='0')echo "selected"?>>تایید نشده</option>
                                    <option value="1"<?php if($statusGet=='1')echo "selected"?>>در انتظار</option>
                                    <option value="2"<?php if($statusGet=='2')echo "selected"?>>تایید شده</option>
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
        var expertCode = <?php echo $tbData['workerId'] ?>;
        var orderCode = <?php echo $tbData['orderListId'] ?>;
        var customerCode = <?php echo $tbData['userId'] ?>;
        var comment = $('#comment').val();
        var status = document.getElementById('status').value;
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
                    url: "13-2upComment.php",
                    data: {
                        workerId: expertCode,
                        orderListId: orderCode,
                        userId: customerCode,
                        Comment: comment,
                        id: id,
                        Status: status,
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
