<?php
include "0-3loginCheckAdmin3.php";
$user_id = $_SESSION['id'];
$target2=$A->Query("SELECT * FROM category");
?>
<html lang="en">
<head>
    <title>ثبت نوع خدمت</title>

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
                            ثبت نوع خدمت
                        </header>

                        <div class="panel-body">
                            <div class="form-group container-fluid">
                                <label for="serviceid">شناسه خدمت را انتخاب کنید</label>
                                <br>
                                <select id="serviceid" onchange="getSubCat()">
                                    <option value="" selected disabled></option>
                                    <?php
                                    while ($rows2 = mysqli_fetch_assoc($target2)) {
                                        ?>
                                        <option value="<?php echo $rows2['id'] ?>"><?php echo $rows2['category'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group container-fluid">
                                <label for="servicetype">نوع خدمت را وارد کنید</label>
                                <input type="text" id="servicetype" class="form-control">
                            </div>

                            <div class="form-group container-fluid">
                                <label for="imgid">شناسه عکس را انتخاب کنید</label>
                                <br>
                                <select id="imgid">
                                    <option value="" selected disabled></option>
                                </select>
                            </div>

                            <div class="form-group container-fluid">
                                <label for="commisionid">درصد پورسانت را وارد کنید</label>
                                <input type="text" id="commisionid" class="form-control">
                            </div>
                            <div class="form-group container-fluid">
                                <label for="minCost">حداقل هزینه اجرا</label>
                                <input type="text" id="minCost" class="form-control">
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
<script>
    function getSubCat() {
        var serviceid = $("#serviceid").val();
        $.ajax({
            url:"tommySubCatPic.php",
            data: {
                catId:serviceid
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if(!data['error']){
                    $("#imgid").html(" <option value='' selected disabled >شناسه عکس را انتخاب کنید</option>");
                    for (var i=0;i<data['subCat'].length;i++){
                        $("#imgid").append('<option value="'+data['subCat'][i]['name']+'">'+data['subCat'][i]['name']+'</option>');
                    }
                }
            }
        });
    }
</script>
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
        var minCost = document.getElementById('minCost').value;
        var serviceid = document.getElementById('serviceid').value;
        var servicetype = $('#servicetype').val();
        var imgid = document.getElementById('imgid').value;
        var commisionid = $('#commisionid').val();
        var user_id = <?php echo $user_id ?>;

        if (serviceid == "") {
            document.getElementById('serviceid').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('serviceid').style.borderColor = '#ced4da';
                document.getElementById('serviceid').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (servicetype == "") {
            document.getElementById('servicetype').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('servicetype').style.borderColor = '#ced4da';
                document.getElementById('servicetype').style.borderWidth = '1px';
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
        if (commisionid == "") {
            document.getElementById('commisionid').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('commisionid').style.borderColor = '#ced4da';
                document.getElementById('commisionid').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (minCost == "") {
            document.getElementById('minCost').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('minCost').style.borderColor = '#ced4da';
                document.getElementById('minCost').style.borderWidth = '1px';
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
                    url: "5-1subSubCat.php",
                    data: {
                        minCost: minCost,
                        categoryId: serviceid,
                        subcategory: servicetype,
                        subCatImg: imgid,
                        Commission: commisionid,
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
