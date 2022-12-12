<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();
$product = $db::Query("select * from product,admin,subcategory,category,brand WHERE adminId=productAdminId AND subId=productSubCatid AND catId=subCatId AND brandId=productBrandId");
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست محصولات
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>نام محصول</th>
                            <th>قیمت</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>نام مدیر</th>
                            <th>نوع دسته بندی</th>
                            <th>نوع  زیر دسته بندی</th>
                            <th>برند</th>
                            <th>گارانتی</th>
                            <th>توضیحات محصول</th>
                            <th>تخفیف محصول</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <?php
                        $i=1;
                        if (mysqli_num_rows($product) > 0) { ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($product)) {


                                ?>

                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['productName']?></td>
                                    <td class="hidden-phone"><?php echo @$db::toMoney($fetch['productPrice'])?></td>
                                    <td class="hidden-phone"><?php echo $fetch['productRegDate']?></td>
                                    <td><?php echo $fetch['productRegTime']?> </td>
                                        <td><?php echo $fetch['adminName']?> </td>
                                    <td><?php echo $fetch['catName']?> </td>
                                    <td><?php echo $fetch['subName']?> </td>
                                    <td><?php echo $fetch['brand']?> </td>
                                    <td><?php echo $fetch['guarantee']?> </td>
                                    <td><?php echo $fetch['Description']?> </td>
                                    <td><?php echo $fetch['offer']?> </td>


                                    <td>
                                        <a href="productEdit.php?productId=<?php echo $fetch['productId']?>">

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
