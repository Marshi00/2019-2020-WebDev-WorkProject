<?php
include "inc/header.php";
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
<?php
$id = '';


include "class/dataBase.php";


$db = new dataBase();

$_GET = $db::RealString($_GET);
$id = $_GET['productId'];


$query = $db::Query("select * from product ,subcategory WHERE productId='$id'");
$fetched = mysqli_fetch_assoc($query);
?>
<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                اضافه کردن محصول
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="pru" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="prd" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>
                <select id="cat" onchange="getSubCat()">
                    <option selected disabled>دسته بندی خود را انتخاب کنید</option>
                    <?php
                    $select = $db::Query("SELECT * FROM category");
                    while ($rowSelect = mysqli_fetch_assoc($select)) {
                        ?>
                        <option value="<?php echo $rowSelect['catId'] ?>"><?php echo $rowSelect['catName'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <select id="subCat">
                    <option selected disabled>زیر دسته بندی خود را انتخاب کنید</option>
                    <option disabled>ابتدا دسته بندی را انتخاب کنید</option>

                </select>
                <div class="form-group">
                    <select id="brand">
                        <option selected disabled>برند خود را انتخاب کنید</option>

                        <?php
                        $query = $db::Query("select * from brand");

                        while ($fetch = mysqli_fetch_assoc($query)) {

                            ?>
                            <label>برند</label>
                            <option value="<?php echo $fetch['brandId']?>"><?php echo $fetch['brand'] ?></option>
                            <?php
                        } ?>
                        <?php ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">نام محصول</label>
                    <input type="text" class="form-control" id="productName" placeholder="نام محصول "
                           value="<?php echo $fetched['productName'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">مبلغ محصول</label>
                    <input type="text" class="form-control" id="productPrice" placeholder="مبلغ محصول"
                           value="<?php echo $fetched['productPrice'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">توضیحات محصول</label>
                    <input type="text" class="form-control" id="description" placeholder="توضیحات محصول"
                           value="<?php echo $fetched['Description'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">تخفیف محصول</label>
                    <input type="text" class="form-control" id="offer" placeholder="تخفیف محصول"
                           value="<?php echo $fetched['offer'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">گارانتی محصول</label>
                    <input type="text" class="form-control" id="guarantee" placeholder="گارانتی محصول "
                           value="<?php echo $fetched['guarantee'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">کد محصول</label>
                    <input type="text" class="form-control" id="productCode" placeholder="کد محصول "
                           value="<?php echo $fetched['productCode'] ?>">
                </div>
                <span class="btn btn-lg btn-login btn-block" onclick="submit()">ثبت</span>
            </div>
        </section>
    </div>

    <div class="col-lg-12" id="adminform" style="margin-top: 0">
        <section class="panel">
            <header class="panel-heading">
                رنگ بندی
            </header>
            <div class="alert alert-danger" id="pru1" style="display: none">
                tamam fild ha por she
            </div>
            <div class="alert alert-success" id="prd2" style="display: none">
                ثبت با موفقیت انجام شد.
            </div>
            <select id="colorPicker" style="margin-right: 20px;margin-top: 10px">
                <?php
                $selectColor = $db::Query("SELECT * FROM color");
                while ($rowColor = mysqli_fetch_assoc($selectColor)) {
                    ?>
                    <option style="background-color: <?php echo $rowColor['colorName']?>" value="<?php echo $rowColor['colorId'] ?>"><?php echo $rowColor['colorName'] ?></option>
                    <?php
                }
                ?>
            </select>
            <select id="sizePicker" style="margin-right: 20px;margin-top: 10px">
                <?php
                $selectSize = $db::Query("SELECT * FROM size");
                while ($rowSize = mysqli_fetch_assoc($selectSize)) {
                    ?>
                    <option style="background-color: <?php echo $rowColor['colorName']?>" value="<?php echo $rowSize['sizeId'] ?>"><?php echo $rowSize['sizeName'] ?></option>
                    <?php
                }
                ?>
            </select>
            <input type="number" id="count" placeholder="تعداد موجودی" style="margin-right: 20px;">
            <input type="number" id="price" placeholder="مبلغ" style="margin-right: 20px;">
            <input type="button" value="ثبت" class="btn btn-primary btn-sm" style="margin-right: 20px;"
                   onclick="submitColorPr();">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>نام رنگ</td>
                    <td>نام سایز</td>
                    <td>تعداد موجودی</td>
                    <td>مبلغ</td>
                    <td>عملیات</td>
                </tr>
                </thead>
                <tbody id="tableColors">
                <?php
                $Query = $db::Query("SELECT * FROM color,product,size,cosiproduct where colorId=cosiPrColorId AND  productId=cosiPrProductId AND sizeId=cosiPrSizeId AND product.productId='$id'");
                while ($rowPr = mysqli_fetch_assoc($Query)) {
                    ?>
                    <tr>

                        <td style="background-color: <?php echo $rowPr['colorName']?>"><?php echo $rowPr['colorName'] ?></td>
                        <td><?php echo $rowPr['sizeName'] ?></td>
                        <td><?php echo $rowPr['cosiPrCount'] ?></td>
                        <td><?php echo $rowPr['cosiPrPrice'] ?></td>
                        <td>
                            <button class="btn btn-danger btn-xs"
                                    onclick="deleteColor('<?php echo $rowPr['cosiPrId'] ?>');"><i class="icon-remove"></i>
                            </button>
                        </td>
                    </tr>


                    <?php
                }
                ?>


                </tbody>
            </table>
        </section>
    </div>
    <div class="col-lg-12" id="adminform" style="margin-top: 0;text-align: center">
        <section class="panel">
            <header class="panel-heading">
               ثبت ویژگی محصول
            </header>
            <div class="alert alert-danger" id="errorrigg" style="display: none">
                tamam fild ha por she
            </div>
            <div class="alert alert-success" id="succccc" style="display: none">
                ثبت با موفقیت انجام شد.
            </div>

            <select id="properties" style="width: 21%;">
                <?php
                $proPert = $db::Query("SELECT * FROM product,properties WHERE  productSubCatid=prSubCatid AND productId='$id'");
                while ($rowProp = mysqli_fetch_assoc($proPert)){
                    ?>
                    <option  value="<?php echo $rowProp['proId'] ?>"><?php echo $rowProp['proName'] ?></option>
                    <?php
                }
                ?>

            </select>
            <div class="form-group" >
                <label for="exampleInputEmail1">تعداد</label>
                <input id="value" type="number" class="form-control" placeholder="تعداد">
            </div>
            <br>
            <br>
            <br>
            <button class="btn btn-primary btn-lg" onclick="submitProp()">
                ثبت ویژگی محصول
            </button>
        </section>

    </div>
</div>
<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                اضافه کردن عکس گالری
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="errorrigg" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succccc" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>

                <select id="catGallery" onchange="getSubCatGallery()">
                    <option selected disabled>دسته بندی خود را انتخاب کنید</option>
                    <?php

                    $select = $db::Query("SELECT * FROM category");
                    while ($rowSelect = mysqli_fetch_assoc($select)){
                        ?>
                        <option value="<?php echo $rowSelect['catId']?>"><?php echo $rowSelect['catName']?></option>
                        <?php
                    }

                    ?>
                </select>
                <select id="subCatGallery" onchange="getproductGallery()">
                    <option selected disabled>زیر دسته بندی خود را انتخاب کنید</option>

                    <option disabled>ابتدا دسته بندی را انتخاب کنید</option>

                </select>
                <select id="productGallery">
                    <option selected disabled>محصول خود را انتخاب کنید</option>
                    <option disabled>ابتدا زیر دسته بندی را انتخاب کنید</option>

                </select>
                <select id="galleryStatus">
                    <option selected disabled>تصویر شاخص باشد</option>
                    <option value="1">بلی</option>
                    <option value="0">خیر</option>
                </select>
                <div class="form-group">

                    <div class="image-editor" style="text-align: center;direction: ltr;">
                        <input type="file" class="cropit-image-input" style="display:none;" id="img">
                        <a type="button" onclick="show_img()" class="btn btn-info "><i
                                    class="icon-plus"></i>اضافه
                            کردن تصویر</a>
                        <div class="cropit-preview">
                        </div>
                    </div>
                </div>




                <span class="btn btn-lg btn-login btn-block" onclick="submitGallery()">ثبت</span>
            </div>
        </section>
    </div>

</div>
<script>
    function submitProp() {
        var properties = $("#properties").val();
        var value = $("#value").val();

        $.ajax({
            url:"request/addProductProperties.php",
            data: {
                id: '<?php echo $_GET['productId'];?>',
                properties:properties,
                value:value,
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if (data["error"]){
                    $("#errorrigg").show("fast").html(data['MSG']);


                }else  {
                    $("#succccc").show("fast");
                }
            }
        });

    }
</script>

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/jquery.customSelect.min.js"></script>

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.cropit.js"></script>
<script>
    function getSubCatGallery() {
        var catGallery = $("#catGallery").val();
        $.ajax({
            url:"request/getSubCatGallery.php",
            data: {
                catId:catGallery
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if(!data['error']){
                    $("#subCatGallery").html(" <option selected disabled>زیر دسته بندی خود را انتخاب کنید</option>");
                    for (var i=0;i<data['subCat'].length;i++){
                        $("#subCatGallery").append('<option value="'+data['subCat'][i]['id']+'">'+data['subCat'][i]['name']+'</option>');
                    }
                }
            }
        });
    }
</script>
<script>
    function getproductGallery() {
        var subCatGallery = $("#subCatGallery").val();
        $.ajax({
            url: "request/getProduct.php",
            data: {
                subId: subCatGallery
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (!data['error']) {
                    $("#productGallery").html(" <option selected disabled>محصول خود را انتخاب کنید</option>");
                    for (var i = 0; i < data['product'].length; i++) {
                        $("#productGallery").append('<option value="' + data['product'][i]['id'] + '">' + data['product'][i]['name'] + '</option>');
                    }
                }
            }
        });
    }
</script>
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

    function submitGallery() {

        var imgprofile = $('.image-editor').cropit('export', {
            type: 'image/jpeg',
            quality: 0.33,
            originalSize: true
        });
        var productGallery = $("#productGallery").val();
        var galleryStatus = $("#galleryStatus").val();
        $.ajax({
            url:"request/addGallery.php",
            data:{
                product:productGallery,
                galleryStatus:galleryStatus,
                img:imgprofile
            },
            dataType:"json",
            type:"POST",
            success:function (data) {
                if (data['error']) {
                    $("#errorrigg").show("fast").html(data['MSG']);

                }else {
                    $("#succccc").show("fast");
                }
            }
        });
    }


</script>

<script>

    function getSubCat() {
        var cat = $("#cat").val();
        $.ajax({
            url: "request/getSubCat.php",
            data: {
                catId: cat
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (!data['error']) {
                    $("#subCat").html(" <option selected disabled>زیر دسته بندی خود را انتخاب کنید</option>");
                    for (var i = 0; i < data['subCat'].length; i++) {
                        $("#subCat").append('<option value="' + data['subCat'][i]['id'] + '">' + data['subCat'][i]['name'] + '</option>');
                    }
                }
            }
        });
    }
</script>
<script>
    function submit() {
        $("#pru").hide("fast");
        $("#prd").hide("fast");
        var subCat = $("#subCat").val();
        var brand = $("#brand").val();
        var productName = $("#productName").val();
        var productPrice = $("#productPrice").val();
        var description = $("#description").val();
        var offer = $("#offer").val();
        var guarantee = $("#guarantee").val();
        var productCode = $("#productCode").val();
        $.ajax({
            url: "request/editProduct.php",
            data: {
                id: '<?php echo $_GET['productId'];?>',
                subCat: subCat,
                brand: brand,
                productName: productName,
                productPrice: productPrice,
                description: description,
                offer: offer,
                guarantee: guarantee,
                productCode: productCode
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data["error"]) {
                    $("#pru").show("fast").html(data['MSG']);


                } else {
                    $("#prd").show("fast");
                }
            }
        });

    }

    function submitColorPr() {
        $("#prd2").hide("fast");
        $("#pru1").hide("fast");
        var colorPicker = $("#colorPicker").val();
        var sizePicker = $("#sizePicker").val();
        var count = $("#count").val();
        var price = $("#price").val();
        $.ajax({
            url: "request/addColorProduct.php",
            data: {
                id: '<?php echo $_GET['productId'];?>',
                colorPicker: colorPicker,
                sizePicker: sizePicker,
                count: count,
                price: price
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data["error"]) {
                    $("#pru1").show("fast").html(data['MSG']);
                } else {
                    location.reload();
                }
            }
        });
    }
    function deleteColor(id) {
        $.ajax({
            url: "request/deleteColorPr.php",
            data: {
                id: id
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                    location.reload();
            }
        });
    }




    function submitSizePr() {
        $("#prd2").hide("fast");
        $("#pru1").hide("fast");
        var sizePicker = $("#sizePicker").val();
        var countSize = $("#countSize").val();
        $.ajax({
            url: "request/addSizeProduct.php",
            data: {
                id: '<?php echo $_GET['productId'];?>',
                sizePicker: sizePicker,
                countSize: countSize
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                if (data["error"]) {
                    $("#pru1").show("fast").html(data['MSG']);
                } else {
                    location.reload();
                }
            }
        });
    }
    function deleteSize(id) {
        $.ajax({
            url: "request/deleteSizeProduct.php",
            data: {
                id: id
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                location.reload();
            }
        });
    }
</script>
</body>
</html>
