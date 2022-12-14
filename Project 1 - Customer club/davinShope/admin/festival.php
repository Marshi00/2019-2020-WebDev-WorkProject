<?php
include"inc/header.php";
?>
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
        border-radius: 0px;
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
<div class="row">

    <div class="col-lg-12" id="adminform">
        <div class="form-group" style="text-align: center;
    background-color: #79797a;
    border-radius: 10px;
    width: 100%;">
            <span style="color: #FFFFFF">راهنما افزودن جشنواره</span>
            <img src="img/rahnama.png" style="width: 16%">
            <span style="color: #FFFFFF">نوع نمایش خود را انتخاب کنید</span>
        </div>
        <section class="panel">
            <header class="panel-heading">
                اضافه کردن جشنواره
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="ergio" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succc" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان جشنواره</label>
                    <input type="text" class="form-control" id="title" placeholder="عنوان فستیوال">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">متن تخفیف</label>
                    <input type="text" class="form-control" id="festivalName" placeholder="نام جشنواره">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">درصد تخفیف فستیوال</label>
                    <input type="text" class="form-control" id="festivalOfferPercentage" placeholder="درصد تخفیف فستیوال">
                </div>
                <div class="form-group" style="text-align: center">
                    <select name="" id="status">
                        <option value="" selected disabled>انتخاب نوع نمایش</option>
                        <option value="1">نمایش شماره یک</option>
                        <option value="2">نمایش شماره دو</option>
                        <option value="3">نمایش شماره سه</option>
                        <option value="4">نمایش شماره چهار</option>
                        <option value="5">نمایش شماره پنج</option>
                        <option value="6">نمایش شماره شش</option>
                        <option value="7">نمایش شماره هفت</option>
                    </select>
                </div>
                <div class="form-group">
                    <select id="onOff" onchange="slideOne()">
                        <option value='' disabled selected>نمایش یا عدم نمایش</option>
                        <option value='1'>روشن</option>
                        <option value='0'>خاموش</option>
                    </select>
                </div>
                <div class="form-group" >
                <div class="image-editor" style="text-align: center;direction: ltr;">
                    <input type="file" class="cropit-image-input" style="display:none;" id="img">
                    <a type="button" onclick="show_img()" class="btn btn-info "><i
                                class="icon-plus"></i>اضافه
                        کردن تصویر</a>
                    <div class="cropit-preview">
                    </div>
                </div>
                </div>



                    <span class="btn btn-lg btn-login btn-block" onclick="submit()">ثبت</span>

            </div>
        </section>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js" ></script>
<script src="js/jquery.customSelect.min.js" ></script>

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.js"></script>


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

    function submit() {

        var imgprofile = $('.image-editor').cropit('export', {
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        var festivalName = $("#festivalName").val();
        var title = $("#title").val();
        var festivalOfferPercentage = $("#festivalOfferPercentage").val();
        var status = $("#status").val();
        var onOff = $("#onOff").val();
        $.ajax({
            url:"request/addFestival.php",
            data:{
                festivalName:festivalName,
                title:title,
                festivalOfferPercentage:festivalOfferPercentage,
                status:status,
                onOff:onOff,
                img:imgprofile
            },
            dataType:"json",
            type:"POST",
            success:function (data) {
                if (data['error']) {
                    $("#ergio").show("fast").html(data['MSG']);

                }else {
                    $("#succc").show("fast");
                }
            }
        });
    }


</script>
