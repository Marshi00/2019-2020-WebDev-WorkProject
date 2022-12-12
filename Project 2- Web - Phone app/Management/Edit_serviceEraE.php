<?php
include "0-2loginCheckAdmin2.php";
$user_id = $_SESSION['id'];
$id = $_GET['id'];
$infoVal=$A->Query("SELECT * FROM subcategoryservices WHERE id='$id'");
$infoValFetch=$A->FetchAssoc($infoVal);
$statusGet=$infoValFetch['status'];
?>
<html lang="en">
<head>
    <title>ویرایش سرویس های ارائه شده</title>

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
                            ویرایش سرویس های ارائه شده
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
                                <label for="service" >سرویس</label>
                                <br>
                                <input type="text" class="form-control" id="service" value="<?php echo $infoValFetch['text']?>">
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
<!--<script>-->
<!--    function getSubCat() {-->
<!--        var service = $("#service").val();-->
<!--        $.ajax({-->
<!--            url:"tommyQuesAdd.php",-->
<!--            data: {-->
<!--                catId:service-->
<!--            },-->
<!--            dataType:'json',-->
<!--            type:'POST',-->
<!--            success:function (data) {-->
<!--                if(!data['error']){-->
<!--                    $("#subService").html(" <option value='' selected disabled >نوع خدمت را انتخاب کنید</option>");-->
<!--                    for (var i=0;i<data['subCat'].length;i++){-->
<!--                        $("#subService").append('<option value="'+data['subCat'][i]['id']+'">'+data['subCat'][i]['name']+'</option>');-->
<!--                    }-->
<!--                }-->
<!--            }-->
<!--        });-->
<!--    }-->
<!--</script>-->
<script>
    function send() {
        var statusSet = document.getElementById('statusSet').value;
        // var service = document.getElementById('service').value;
        // var subService = document.getElementById('subService').value;
        var service = $('#service').val();
        var user_id = <?php echo $user_id ?>;
        var id = <?php echo $id ?>;
        // if (service == "") {
        //     document.getElementById('service').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('service').style.borderColor = '#ced4da';
        //         document.getElementById('service').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 1500);
        //     Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
        //     return;
        // }
        // if (sebService == "") {
        //     document.getElementById('sebService').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('sebService').style.borderColor = '#ced4da';
        //         document.getElementById('sebService').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 1500);
        //     Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
        //     return;
        // }
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

        Notiflix.Confirm.Show('تایید پیام', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "26-2upSubCatServices.php",
                    data: {
                        Status: statusSet,
                        // subcategoryId: subService,
                        service: service,
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
