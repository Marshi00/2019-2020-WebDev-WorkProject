<?php
include "0-2loginCheckAdmin2.php";
$user_id = $_SESSION['id'];
$id = $_GET['id'];
$infoVal=$A->Query("SELECT * FROM subcategorycosts WHERE id='$id'");
$infoValFetch=$A->FetchAssoc($infoVal);
$statusGet=$infoValFetch['status'];
?>
<html lang="en">
<head>
    <title>ویرایش قیمت ارائه شده</title>

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
                    <section class="panel questionSection">
                        <header class="panel-heading">
                            ویرایش قیمت ارائه شده
                        </header>
                        <div class="panel-body">

                            <!--                            <div class="form-group container-fluid">-->
                            <!--                                <label for="service">خدمت را انتخاب کنید</label>-->
                            <!--                                <br>-->
                            <!--                                <select id="service" onchange="getSubCat()">-->
                            <!--                                    <option selected disabled value="">خدمت</option>-->
                            <!--                                    --><?php
                            //                                    while ($rows = mysqli_fetch_assoc($target)) {
                            //                                        ?>
                            <!--                                        <option value="--><?php //echo $rows['id'] ?><!--">--><?php //echo $rows['category'] ?><!--</option>-->
                            <!--                                        --><?php
                            //                                    }
                            //                                    ?>
                            <!--                                </select>-->
                            <!--                            </div>-->
                            <!--                            <div class="form-group container-fluid">-->
                            <!--                                <label for="subService">نوع خدمت را انتخاب کنید</label>-->
                            <!--                                <br>-->
                            <!--                                <select id="subService">-->
                            <!--                                    <option selected disabled value="">نوع خدمت</option>-->
                            <!--                                </select>-->
                            <!--                            </div>-->

                            <div class="form-group container-fluid">
                                <label for="description" >توضیحات</label>
                                <br>
                                <input type="text" class="form-control" id="description" value="<?php echo $infoValFetch['description']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="cost"> هزینه</label>
                                <br>
                                <input type="text" class="form-control" id="cost" value="<?php echo $infoValFetch['cost']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="statusSet">وضعیت را انتخاب کنید</label>
                                <br>
                                <select id="statusSet">
                                    <option value="" selected disabled>وضعیت</option>
                                    <option value="1"<?php if($statusGet=='1')echo "selected"?>>فعال</option>
                                    <option value="0"<?php if($statusGet=='0')echo "selected"?>>غیر فعال</option>
                                </select>
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
        var statusSet = document.getElementById('statusSet').value;
        var cost = document.getElementById('cost').value;
        // var service = document.getElementById('service').value;
        // var subService = document.getElementById('subService').value;
        var description = $('#description').val();
        var user_id = <?php echo $user_id ?>;
        var id = <?php echo $id ?>;
        if (statusSet === "") {
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
        if (cost == "") {
            document.getElementById('cost').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('cost').style.borderColor = '#ced4da';
                document.getElementById('cost').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (description == "") {
            document.getElementById('description').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('description').style.borderColor = '#ced4da';
                document.getElementById('description').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }

        Notiflix.Confirm.Show('تایید پیام', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "27-2upSubCatCosts.php",
                    data: {
                        cost: cost,
                        statusSet: statusSet,
                        description: description,
                        user_id: user_id,
                        id:id,
                    },
                    dataType: "json",
                    type: "POST",
                    success: function (jsonData) {
                        if (jsonData['error']) {
                            Notiflix.Notify.Success(jsonData['MSG']);
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
