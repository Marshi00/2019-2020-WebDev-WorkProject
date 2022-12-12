<?php
include"inc/header.php";
?>
<?php
include "class/dataBase.php";
$db=new dataBase();
$catquery = $db::Query("select * from category,admin where admin.adminId=catAdminId");

?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    لیست دسته بندی
                    </header>

                    <table class="table table-striped border-top" id="sample_1">

                        <thead>

                        <tr>
                            <th>ردیف</th>
                            <th>نام دسته بندی</th>
                            <th class="hidden-phone">تاریخ ثبت</th>
                            <th>زمان ثبت</th>
                            <th>نام مدیر</th>
                            <th>تصویر دسته بندی</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <?php
                        $i=1;
                        if (mysqli_num_rows($catquery) > 0) {

                            ?>
                            <?php
                            while ($fetch = mysqli_fetch_assoc($catquery)) {


                                ?>

                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $fetch['catName']?></td>
                                    <td class="hidden-phone"><?php echo $fetch['catRegDate']?></td>
                                    <td><?php echo $fetch['catRegTime']?> </td>
                                    <td><?php echo $fetch['adminName']?> </td>
                                    <td style="width: 20%"><img style="width: 20%;height: 42px" src="upload/cat/<?php echo $fetch['catImg']?>.jpg"> </td>
                                    <td>
                                        <a href="editCat.php?catId=<?php echo $fetch['catId']?>">
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