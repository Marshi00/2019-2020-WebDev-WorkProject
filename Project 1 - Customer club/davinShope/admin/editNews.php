<?php
include"inc/header.php";
?>
<?php
$id = '';


include "class/dataBase.php";
$db=new dataBase();
$real=$db::RealString($_GET);
$id = $real['newsId'];

$query = $db::Query("select * from news WHERE newsId='$id'");
$fetched= mysqli_fetch_assoc($query);
?>
<div class="row">

    <div class="col-lg-12" id="adminform">
        <section class="panel">
            <header class="panel-heading">
                ویرایش زیر دسته بندی
            </header>
            <div class="panel-body">
                <div class="alert alert-danger" id="errorrigg" style="display: none">
                    tamam fild ha por she
                </div>
                <div class="alert alert-success" id="succccc" style="display: none">
                    ثبت با موفقیت انجام شد.
                </div>
                <div class="form-group">
                    <select id="newsCat">
                        <?php
                        if (mysqli_num_rows($query) > 0) { ?>
                            <?php
                            $select = $db::Query("SELECT * FROM categorynews");

                            while ($fetch = mysqli_fetch_assoc($select)) {


                                ?>


                                    <label>نوع دسته بندی</label>
                                    <option value="<?php echo $fetch['catNewsId'] ?>"><?php echo $fetch['catNewsName'] ?></option>
                                    <?php

                                    ?>
                                <?php

                            } ?>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"> ویرایش عنوان خبر </label>
                    <input type="text" class="form-control" id="newsTitle" placeholder=" ویرایش عنوان خبر  " value="<?php echo $fetched['newsTitle']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"> ویرایش متن خبر </label>
                    <input type="text" class="form-control" id="newsText" placeholder=" ویرایش متن خبر  " value="<?php echo $fetched['newsText']?>">
                </div>


                <span class="btn btn-lg btn-login btn-block" onclick="submit()">ثبت</span>

            </div>
        </section>
    </div>

</div>
<!-- js placed at the end of the document so the pages load faster -->
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
<script>
    function submit() {
        var newsCat = $("#newsCat").val();
        var newsText = $("#newsText").val();
        var newsTitle = $("#newsTitle").val();

        $.ajax({
            url:"request/newsEdit.php",
            data: {
                id:'<?php echo $_GET['newsId'];?>',
                newsCat:newsCat,
                newsText:newsText,
                newsTitle:newsTitle,
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
</body>
</html>
