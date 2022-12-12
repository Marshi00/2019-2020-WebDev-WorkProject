<?php
include "0-3loginCheckAdmin3.php";
$user_id = $_SESSION['id'];
$target=$A->Query("SELECT * FROM category");
$target2=$A->Query("SELECT * FROM subcategory");
?>
<html lang="en">
<head>
    <title>افزودن جواب</title>

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
                            ثبت جواب
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
                                <label for="question">سوال را انتخاب کنید</label>
                                <br>
                                <select id="question">
                                    <option value="" selected disabled>انتخاب سوال</option>
                                </select>
                            </div>


                            <div class="form-group container-fluid">
                                <label for="Answer">پاسخ را وارد کنید</label>
                                <br>

                                <input type="text" class="form-control" id="Answer">
                            </div>


                            <button class="btn btn-lg btn-login btn-block" onclick="send()">ثبت</button>

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
    function getSubCat2() {
        var subService = $("#subService").val();
        $.ajax({
            url:"tommyAnsAdd.php",
            data: {
                catId:subService
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if(!data['error']){
                    $("#question").html(" <option value='' selected disabled >سوال را انتخاب کنید</option>");
                    for (var i=0;i<data['subCat'].length;i++){
                        $("#question").append('<option value="'+data['subCat'][i]['id']+'">'+data['subCat'][i]['name']+'</option>');
                    }
                }
            }
        });
    }
</script>
<script>
    function send() {
        var question = document.getElementById('question').value;
        var Answer = $('#Answer').val();
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
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
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
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (question == "") {
            document.getElementById('question').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('question').style.borderColor = '#ced4da';
                document.getElementById('question').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (Answer == "") {
            document.getElementById('Answer').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Answer').style.borderColor = '#ced4da';
                document.getElementById('Answer').style.borderWidth = '1px';
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
                    url: "8-1subCatQuesVal.php",
                    data: {
                        user_id: user_id,
                        subcategoryQuestionsId: question,
                        value: Answer,
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
