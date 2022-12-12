<?php
include "0-3loginCheckAdmin3.php";
$user_id = $_SESSION['id'];
$target=$A->Query("SELECT * FROM category");
?>
<html lang="en">
<head>
    <title> ثبت اطلاعات ارائه شده</title>

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
                            ثبت اطلاعات ارائه شده
                        </header>
                        <div class="panel-body">
                            <div class="form-group container-fluid">
                                <label for="service">خدمت را انتخاب کنید</label>
                                <br>
                                <select id="service" onchange="getSubCat()">
                                    <option selected disabled value="">خدمت</option>
                                    <?php
                                    while ($rows = mysqli_fetch_assoc($target)) {
                                        ?>
                                        <option value="<?php echo $rows['id'] ?>"><?php echo $rows['category'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group container-fluid">
                                <label for="subService">نوع خدمت را انتخاب کنید</label>
                                <br>
                                <select id="subService" onchange="getSubCat2()">
                                    <option selected disabled value="">نوع خدمت</option>
                                </select>
                            </div>
                            <div class="form-group container-fluid">
                                <label for="title">عنوان</label>
                                <br>
                                <input type="text" class="form-control" id="title">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="text">پاراگراف 1</label>
                                <br>
                                <textarea class="form-control" style="width: 400px" id="text"></textarea>
                            </div>
                            <div class="form-group container-fluid">
                                <label for="text2">پاراگراف 2</label>
                                <br>
                                <textarea class="form-control" style="width: 400px" id="text2"></textarea>
                            </div>
                            <div class="form-group container-fluid">
                                <label for="text3">پاراگراف 3</label>
                                <br>
                                <textarea class="form-control" style="width: 400px" id="text3"></textarea>
                            </div>
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
    function getSubCat() {
        var service = $("#service").val();
        $.ajax({
            url:"tommyQuesAdd.php",
            data: {
                catId:service
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if(!data['error']){
                    $("#subService").html(" <option value='' selected disabled >نوع خدمت را انتخاب کنید</option>");
                    for (var i=0;i<data['subCat'].length;i++){
                        $("#subService").append('<option value="'+data['subCat'][i]['id']+'">'+data['subCat'][i]['name']+'</option>');
                    }
                }
            }
        });
    }
</script>
<script>
    function send() {
        var title = document.getElementById('title').value;
        var service = document.getElementById('service').value;
        var subService = document.getElementById('subService').value;
        var text = $('#text').val();
        var text2 = $('#text2').val();
        var text3 = $('#text3').val();
        var user_id = <?php echo $user_id ?>;

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
                    url: "28-1subCatInfo.php",
                    data: {
                        title: title,
                        subcategoryId: subService,
                        text: text,
                        text2: text2,
                        text3: text3,
                        user_id: user_id,
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
