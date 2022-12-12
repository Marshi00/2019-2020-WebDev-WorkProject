<?php
include "0-3loginCheckAdmin3.php";
$user_id = $_SESSION['id']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>افزودن عکس به خدمت</title>
    <style>
        .cropit-preview-image {
            border-radius: 0px !important;
        }

        .cropit-preview-image-container {
            border-radius: 0px !important;
        }

        .cropit-preview {
            margin: auto;
            background: #f8f8f8;
            background-size: cover;
            border: 5px solid #ccc;
            border-radius: 0;
            margin-top: 7px;
            width: 250px !important;
            height: 250px !important;
        }

        .cropit-preview-image-container {
            cursor: move;
        }

        .cropit-preview-background {
            opacity: .2;
            cursor: auto;
        }

        div#cropit-preview {
            width: 741px !important;
            height: 142px !important;
        }
    </style>

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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                    <section class="panel pictureSectionv">
                        <header class="panel-heading">
                            افزودن عکس به خدمت
                        </header>

                        <div class="panel-body">
                            <div class="form-group container-fluid" style="text-align: right">
                                <label for="service">نام عکس را انتخاب کنید</label>
                                <input type="text" class="form-control" id="service" style="width: 30%">
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="image-editor" style="text-align: center;direction: ltr;">
                                <input type="file" class="cropit-image-input" style="display:none;" id="img">
                                <a type="button" onclick="show_img()" class="btn btn-info ">
                                    اضافه کردن تصویر
                                    <i class="fa fa-plus"></i></a>
                                <div class="cropit-preview">
                                </div>
                            </div>
                            <button class="btn btn-lg btn-login btn-block" onclick="sendData()">ثبت</button>

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
<!--    crop pic-->
<script src="js/jquery.cropit.js"></script>


<script>
    function show_img() {
        $("#img").click();
    }

    (function ($) {
        $('.image-editor').cropit({
            exportZoom: 1.25,
            imageBackground: true,
            imageBackgroundBorderWidth: 20,
            imageState: {
                src: ''
            }
        });
    })(jQuery);
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
    function sendData() {
        var service = $('#service').val();
        var imgprofile = $('.image-editor').cropit('export', {
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        var user_id = <?php echo $user_id?>;

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

        Notiflix.Confirm.Show('تایید پیام', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "17-1subCatImg.php",
                    data: {
                        iName: service,
                        img: imgprofile,
                        user_id: user_id,
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