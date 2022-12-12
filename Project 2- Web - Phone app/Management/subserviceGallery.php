<html lang="en">
<head>
    <title>گالری عکس خدمت ها</title>

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
                <div class="col-lg-12">
                    <section class="panel sectiontable">
                        <header class="panel-heading">
                            گالری عکس خدمت ها
                        </header>

                        <div class="panel-body">
                            <div class="form-group container-fluid">
                                <label for="service">خدمت را انتخاب کنید</label>
                                <br>
                                <br>
                                <select id="service">
                                    <option selected disabled value=""> خدمت</option>
                                    <option value="1">لالا</option>
                                    <option value="2">لالا</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group container-fluid">
                                <label for="subservice">نوع خدمت را انتخاب کنید</label>
                                <br>
                                <br>
                                <select id="subservice">
                                    <option selected disabled value="">نوع خدمت</option>
                                    <option value="1">لالا</option>
                                    <option value="2">لالا</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-lg btn-login btn-block picturebtn" onclick="sendData()">ثبت</button>


                        <div>
                            <table class="table table-striped border-top" id="sample_1">

                                <thead>

                                <tr>
                                    <th>ردیف</th>
                                    <th>عکس</th>
                                    <th class="hidden-phone">تاریخ ثبت</th>
                                    <th>زمان ثبت</th>
                                    <th>نام مدیر</th>
                                    <th>نوع عکس</th>
                                    <th>حذف</th>

                                </tr>
                                </thead>
                                <?php
                                $i = 1;
                                if (mysqli_num_rows($catquery) > 0) {

                                    ?>
                                    <?php
                                    while ($fetch = mysqli_fetch_assoc($catquery)) {
                                        if ($fetch['galleryStatus'] == '1') {
                                            $image = 'تصویر شاخص';
                                        } elseif ($fetch['galleryStatus'] == '0') {
                                            $image = 'تصاویر گالری';
                                        }

                                        ?>

                                        <tbody>

                                        <tr>
                                            <td class="hidden-phone"><?php echo $i ?></td>
                                            <td style="width: 20%"><img style="    width: 20%;height: 42px;"
                                                                        src="upload/gallery/<?php echo $fetch['galleryImg'] ?>"
                                            </td>
                                            <td class="hidden-phone"><?php echo $fetch['galleryRegDate'] ?></td>
                                            <td class="hidden-phone"><?php echo $fetch['galleryRegTime'] ?></td>
                                            <td class="hidden-phone"><?php echo $fetch['adminName'] ?></td>
                                            <td class="hidden-phone"><?php echo $image ?></td>
                                            <td>
                                                <a href="deletGallery.php?galleryId=<?php echo $fetch['galleryId'] ?>">
                                                    <button class="btn btn-primary btn-xs"><i class="fa fa-trash"></i>
                                                    </button>
                                            </td>
                                        </tr>

                                        </tbody>
                                        <?php
                                        $i++;
                                    } ?>
                                <?php } ?>
                            </table>

                        </div>

                    </section>

                </div>
            </div>


        </section>
        <?php
        include "footer.php";
        ?>

    </section>
</section>
<?php
include "js link.php";
?>
<script type="text/javascript" src="assets/advanced-datatable.media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-table/DT_bootstrap.js"></script>


<!--script for this page only-->
<script src="js/dynamic-table.js"></script>
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

        var service = document.getElementById('service').value;
        var subservice = document.getElementById('subservice').value;

        if (service === "") {
            document.getElementById('service').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('service').style.borderColor = '#ced4da';
                document.getElementById('service').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (subservice === "") {
            document.getElementById('subservice').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('subservice').style.borderColor = '#ced4da';
                document.getElementById('subservice').style.borderWidth = '1px';
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
                    url: "3-4LoginUserDavin.php",
                    data: {
                        service: service,
                        subservice: subservice,
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