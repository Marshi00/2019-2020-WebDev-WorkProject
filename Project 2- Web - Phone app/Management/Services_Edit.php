<?php
include "0-2loginCheckAdmin2.php";
$id = $_GET['id'];
$user_id = $_SESSION['id'];
$target=$A->Query("SELECT * FROM imgbase WHERE brand='CAT' AND status='0'");
$infoVal=$A->Query("SELECT * FROM category WHERE id='$id'");
$infoValFetch=$A->FetchAssoc($infoVal);
$imgVar=$infoValFetch['img'];
$statusGet=$infoValFetch['Status'];
?>
<html lang="en">
<head>
    <title>فرم ویرایش خدمت</title>

    <?php
    include "link.php";
    ?>

    <!--    date -->
    <link rel="stylesheet" href="css/calendar-blue2.css">
    <script src="js/jalali.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/calendar-setup.js"></script>
    <script src="js/calendar-fa.js"></script>
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
                    <section class="panel expertSection">
                        <header class="panel-heading">
                            فرم ویرایش خدمت
                        </header>
                        <div class="panel-body">

                            <div class="form-group container-fluid">
                                <label for="service">خدمت را وارد کنید</label>
                                <input type="text" value="<?php echo $infoValFetch['category']?>" id="service" class="form-control">
                            </div>

                            <div class="form-group container-fluid">
                                <label for="imgid">شناسه عکس را انتخاب کنید</label>
                                <br>
                                <select id="imgid">
                                    <option value="" selected disabled></option>
                                    <?php
                                    while ($rows = mysqli_fetch_assoc($target)) {
                                        ?>
                                        <option value="<?php echo $rows['img'] ?>"<?php if($rows['img']==$imgVar) echo "selected"?>><?php echo $rows['img'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group container-fluid">
                                <label for="Status">وضعیت را انتخاب کنید</label>
                                <br>
                                <select id="Status">
                                    <option value="" selected disabled></option>
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
        var service = $('#service').val();
        var imgid = document.getElementById('imgid').value;
        var Status = document.getElementById('Status').value;
        var user_id = <?php echo $user_id ?>;
        var id = <?php echo $id ?>;

        if (service == "") {
            document.getElementById('service').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('service').style.borderColor = '#ced4da';
                document.getElementById('service').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (imgid == "") {
            document.getElementById('imgid').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('imgid').style.borderColor = '#ced4da';
                document.getElementById('imgid').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (Status == "") {
            document.getElementById('Status').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Status').style.borderColor = '#ced4da';
                document.getElementById('Status').style.borderWidth = '1px';
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
                    url: "4-2upCat.php",
                    data: {
                        category: service,
                        img: imgid,
                        Status: Status,
                        user_id: user_id,
                        id: id,

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
