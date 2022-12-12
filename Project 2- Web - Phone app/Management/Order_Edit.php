<?php
include "0-2loginCheckAdmin2.php";
$id = $_GET['id'];
$want1=$A->Query("SELECT * FROM orderlist WHERE id='$id'");
$want2=$A->FetchAssoc($want1);
$want3=$want2['addressId'];
$user_id = $_SESSION['id'];
$target=$A->Query("SELECT * FROM subcategory");
$infoVal=$A->Query("SELECT * FROM orderlist WHERE id='$id'");
$infoValFetch=$A->FetchAssoc($infoVal);
$subVar=$infoValFetch['subcategoryId'];
$statusGet=$infoValFetch['status'];
?>
<html lang="en">
<head>
    <title>وبرایش سفارش</title>

    <?php
    include "link.php";
    ?>
    <!--    date -->
    <link rel="stylesheet" href="css/calendar-blue2.css">
    <script src="js/jalali.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/calendar-setup.js"></script>
    <script src="js/calendar-fa.js"></script>
    <!--time-->
    <link rel="stylesheet" href="css/timepicker.min.css">
    <script src="js/timepicker.min.js"></script>
    // time
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
                            ویرایش سفارشات
                        </header>
                        <div class="panel-body">
<!--                            <div class="form-group container-fluid">-->
<!--                                <label for="code">شناسه پیگیری را وارد کنید</label><br>-->
<!--                                <input type="number" class="form-control" id="code">-->
<!--                            </div>-->
<!--                            <div class="form-group container-fluid">-->
<!--                                <label for="userCode">شناسه کاربر را وارد کنید</label><br>-->
<!--                                <input type="text" placeholder="شماره همراه" class="form-control" id="userCode">-->
<!--                            </div>-->
                            <div class="form-group container-fluid">
                                <label for="subService">نوع خدمت را وارد کنید</label><br>
                                <select id="subService">
                                    <option selected disabled value="">نوع خدمت را وارد کنید</option>
                                    <?php
                                    while ($rows = mysqli_fetch_assoc($target)) {
                                        ?>
                                        <option value="<?php echo $rows['id'] ?>"<?php if($rows['id']==$subVar) echo "selected"?>><?php echo $rows['subcategory'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group container-fluid">
                                <label for="A4">برای انتخاب زمان انجام خدمت کلیک کنید</label><br>
                                <input type="text" class="form-control" id="A4" value="<?php echo $infoValFetch['neededTime']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="DateAdd">برای انتخاب تاریخ انجام خدمت کلیک کنید</label><br>
                                <input type="text" class="form-control" id="DateAdd" value="<?php echo $infoValFetch['neededDate']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="status">وضعیت را انتخاب کنید</label><br>
                                <select id="status">
                                    <option selected disabled value="">وضعیت را انتخاب کنید</option>
                                    <option value="1"<?php if($statusGet=='1')echo "selected"?>>در حال انتظار</option>
                                    <option value="0"<?php if($statusGet=='0')echo "selected"?>>لغو شده</option>
                                    <option value="2"<?php if($statusGet=='2')echo "selected"?>>انجام شده</option>
                                </select>
                            </div>
                            <div class="form-group container-fluid">
                                <label for="expertCode">شناسه متخصص را وارد کنید</label><br>
                                <input type="text" placeholder="کد ملی" class="form-control" id="expertCode" >
                            </div>
                            <div class="form-group container-fluid">
                                <label for="address">آدرس را وارد کنید</label><br>
                                <input type="text" class="form-control" id="address" >
                            </div>
<!--                            <div class="form-group container-fluid">-->
<!--                                <label for="discountCode">کد تخفیف را وارد کنید</label><br>-->
<!--                                <input type="text" class="form-control" id="discountCode">-->
<!--                            </div>-->
                            <div class="form-group container-fluid">
                                <label for="description">توضیحات را وارد کنید</label><br>
                                <input type="text" class="form-control" id="description" value="<?php echo $infoValFetch['details']?>">
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

<!--time js -->
<script>// time
    var timepicker = new TimePicker('A4', {
        lang: 'en',
        theme: 'dark'
    });
    timepicker.on('change', function (evt) {
        var value = (evt.hour || '00') + ':' + (evt.minute || '00');
        evt.element.value = value;
    });
</script>
<script>
    Calendar.setup({
        inputField: 'DateAdd',
        button: 'DateAdd',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
</script>
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
        var subService = document.getElementById('subService').value;
        var A4 = $('#A4').val();
        var DateAdd = $('#DateAdd').val();
        var status = document.getElementById('status').value;
        var expertCode = $('#expertCode').val();
        var address = $('#address').val();
        var description = $('#description').val();
        var id = <?php echo $id ?>;
        var user_id = <?php echo $user_id ?>;
        var addressId = <?php echo $want3 ?>;

        // if (code == "") {
        //     document.getElementById('code').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('code').style.borderColor = '#ced4da';
        //         document.getElementById('code').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 1500);
        //     Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
        //     return;
        // }
        // if (userCode == "") {
        //     document.getElementById('userCode').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('userCode').style.borderColor = '#ced4da';
        //         document.getElementById('userCode').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 1500);
        //     Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
        //     return;
        // }
        if (subService == "") {
            document.getElementById('subService').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('subService').style.borderColor = '#ced4da';
                document.getElementById('subService').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (A4 == "") {
            document.getElementById('A4').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A4').style.borderColor = '#ced4da';
                document.getElementById('A4').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (DateAdd == "") {
            document.getElementById('DateAdd').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('DateAdd').style.borderColor = '#ced4da';
                document.getElementById('DateAdd').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (status == "") {
            document.getElementById('status').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('status').style.borderColor = '#ced4da';
                document.getElementById('status').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (expertCode == "") {
            document.getElementById('expertCode').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('expertCode').style.borderColor = '#ced4da';
                document.getElementById('expertCode').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (address == "") {
            document.getElementById('address').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('address').style.borderColor = '#ced4da';
                document.getElementById('address').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        // if (discountCode == "") {
        //     document.getElementById('discountCode').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('discountCode').style.borderColor = '#ced4da';
        //         document.getElementById('discountCode').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 1500);
        //     Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
        //     return;
        // }
        // if (description == "") {
        //     document.getElementById('description').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('description').style.borderColor = '#ced4da';
        //         document.getElementById('description').style.borderWidth = '1px';
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
                    url: "9-2upOrderList.php",
                    data: {
                        subcategoryId: subService,
                        neededTime: A4,
                        neededDate: DateAdd,
                        status: status,
                        worker: expertCode,
                        address: address,
                        user_id: user_id,
                        details: description,
                        id: id,
                        addressId:addressId,
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
