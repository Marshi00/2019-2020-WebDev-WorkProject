<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();
$product = $db::Query("select * from slider ");
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست اسلایدر
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>نام اسلایدر</th>
                            <th>نوع زیر دسته بندی</th>
                            <th>نوع دسته بندی</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>تصویر</th>
                            <th>نمایش</th>
                            <th>روشن</th>
                            <th>ثبت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <?php

                        ?>
                        <?php
                        $i=1;
                        if (mysqli_num_rows($product) > 0) { ?>
                            <?php


                            while ($fetched = mysqli_fetch_assoc($product)) {
                                $id = $fetched['sliderLinkId'];
                                $mode = $fetched['sliderLinkModel'];


                                if($mode==1){
                                    $select = $db::Query("SELECT * from festival where festivalId='$id'");
                                    $fetched_news = mysqli_fetch_assoc($select);
                                    $name = $fetched_news['festivalName'];
                                    $modelCat="فستیوال";

                                }
                                if($mode==2){
                                    $select = $db::Query("SELECT * from news where newsId='$id'");
                                    $fetched_news = mysqli_fetch_assoc($select);
                                    $name = $fetched_news['newsTitle'];
                                    $modelCat="خبر";

                                }
                                if($mode==3){
                                    $select = $db::Query("SELECT * from category where catId='$id'");
                                    $fetched_news = mysqli_fetch_assoc($select);
                                    $name = $fetched_news['catName'];
                                    $modelCat="دسته بندی";

                                }
                                if($mode==4){
                                    $select = $db::Query("SELECT * from subcategory where subId='$id'");
                                    $fetched_news = mysqli_fetch_assoc($select);
                                    $name = $fetched_news['subName'];
                                    $modelCat="زیردسته بندی";

                                }

                                if($mode==5){
                                    $select = $db::Query("SELECT * from categorynews where catNewsId='$id'");
                                    $fetched_news = mysqli_fetch_assoc($select);
                                    $name = $fetched_news['catNewsName'];
                                    $modelCat=" دسته بندی خبر";

                                }

                                 if($fetched['status']=='1'){
                                  $model='روشن';
                                 }elseif ($fetched['status']=='0'){
                                  $model='خاموش';
                                 }

                        ?>



                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetched['sliderName']?></td>
                                    <td class="hidden-phone"><?php echo $name?></td>
                                    <td class="hidden-phone"><?php echo $modelCat?></td>
                                    <td class="hidden-phone"><?php echo $fetched['sliderRegDate']?></td>
                                    <td><?php echo $fetched['sliderRegTime']?> </td>
                                    <td style="width: 20%"><img style="    width: 20%;height: 42px;" src="upload/slider/<?php echo $fetched['sliderImg']?>.jpg" </td>
                                    <td><?php echo $model?></td>

                                    <td>
                                        <select name="" id="updateSlider">
                                            <option value="1">روشن</option>
                                            <option value="0">خاموش</option>
                                        </select>
                                    </td>
                                    <td>

                                        <script>

                                            function send(id) {
                                                var updateSlider = $("#updateSlider").val();
                                                $.ajax({
                                                    url:"request/upSlider.php",
                                                    data:{
                                                        sliderId:id,
                                                        updateSlider:updateSlider
                                                    },
                                                    dataType:"json",
                                                    type:"POST",
                                                    success:function (data) {
                                                        if (data['error']) {
                                                        }else {
                                                            location.reload();
                                                        }
                                                    }
                                                });
                                            }
                                        </script>
                                        <button onclick="send('<?php echo $fetched['sliderId']?>')" class="btn btn-primary btn-xs" ><i
                                                    class="icon-pencil"></i></button>

                                    </td>
                                    <td>
                                        <a href="deleteSlider.php?sliderId=<?php echo $fetched['sliderId']?>">
                                        <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                    </td>
                                </tr>

                                </tbody>
                                <?php
                                $i++;
                            } ?>
                        <?php }?>
                    </table>

                </section>

            </div>
        </div>


    </section>
</section>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page only-->
<script src="js/dynamic-table.js"></script>
</body>
</html>
