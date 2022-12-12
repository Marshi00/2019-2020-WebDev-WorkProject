<?php
include "0-2loginCheckAdmin2.php";
$user_id = $_SESSION['id'];
$id = $_GET['id'];
$infoVal=$A->Query("SELECT * FROM subcategoryinformation WHERE id='$id'");
$infoValFetch=$A->FetchAssoc($infoVal);
$statusGet=$infoValFetch['status'];
?>
<html lang="en">
<head>
    <title>ویرایش اطلاعات ارائه شده</title>

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
                            ویرایش اطلاعات ارائه شده
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
                                <label for="title" > عنوان</label>
                                <br>
                                <input type="text" class="form-control" id="title" value="<?php echo $infoValFetch['title']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="text">پاراگراف 1</label>
                                <br>
                                <input type="text" class="form-control" id="text" value="<?php echo $infoValFetch['text']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="text2">پاراگراف 2</label>
                                <br>
                                <input type="text" class="form-control" id="text2" value="<?php echo $infoValFetch['text2']?>">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="text3">پاراگراف 3</label>
                                <br>
                                <input type="text" class="form-control" id="text3" value="<?php echo $infoValFetch['text3']?>">
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
        var title = document.getElementById('title').value;
        var text = document.getElementById('text').value;
        var text2 = document.getElementById('text2').value;
        var text3 = $('#text3').val();
        var user_id = <?php echo $user_id ?>;
        var id = <?php echo $id ?>;
        if (title == "") {
            document.getElementById('title').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('title').style.borderColor = '#ced4da';
                document.getElementById('title').style.borderWidth = '1px';
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
        if (text == "") {
            document.getElementById('text').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('text').style.borderColor = '#ced4da';
                document.getElementById('text').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (text2 == "") {
            document.getElementById('text2').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('text2').style.borderColor = '#ced4da';
                document.getElementById('text2').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (text3 == "") {
            document.getElementById('text3').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('text3').style.borderColor = '#ced4da';
                document.getElementById('text3').style.borderWidth = '1px';
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
                    url: "28-2upSubCatInfo.php",
                    data: {
                        title: title,
                        status: statusSet,
                        text: text,
                        text2: text2,
                        text3: text3,
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
