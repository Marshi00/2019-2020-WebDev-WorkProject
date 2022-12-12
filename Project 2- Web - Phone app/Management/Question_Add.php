<?php
include "0-3loginCheckAdmin3.php";
$user_id = $_SESSION['id'];
$target=$A->Query("SELECT * FROM category");
?>
<html lang="en">
<head>
    <title>افزودن سوال</title>

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
                            افزودن سوال
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
                            <br>
                            <br>
                            <div class="form-group container-fluid">
                                <label for="subService">نوع خدمت را انتخاب کنید</label>
                                <br>
                                <select id="subService">
                                    <option selected disabled value="">نوع خدمت</option>
                                </select>
                            </div>
                            <br>
                            <br>
                            <div class="form-group container-fluid">
                                <label for="Question">سوال خود را وارد کنید</label>
                                <br>
                                <input type="text" class="form-control" id="Question">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="level">اولویت سوال خود را وارد کنید</label>
                                <br>
                                <input type="text" class="form-control" id="level">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="typeQues">مدل را انتخاب کنید</label>
                                <br>
                                <select id="typeQues">
                                    <option value="" selected disabled>مدل سوال</option>
                                    <option value="1">بله یا خیر</option>
                                    <option value="0">چند گزینه ای</option>
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
        var typeQues = document.getElementById('typeQues').value;
        var level = document.getElementById('level').value;
        var service = document.getElementById('service').value;
        var subService = document.getElementById('subService').value;
        var Question = $('#Question').val();
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
        if (level == "") {
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
        if (Question == "") {
            document.getElementById('Question').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Question').style.borderColor = '#ced4da';
                document.getElementById('Question').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (typeQues === "") {
            document.getElementById('typeQues').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('typeQues').style.borderColor = '#ced4da';
                document.getElementById('typeQues').style.borderWidth = '1px';
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
                    url: "7-1subSubCatQues.php",
                    data: {
                        level: level,
                        subcategoryId: subService,
                        Question: Question,
                        user_id: user_id,
                        typeQues: typeQues,
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