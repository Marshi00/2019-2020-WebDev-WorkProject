<?php
include "0-3loginCheckAdmin3.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست متخصصان</title>

    <?php
    include "link.php";
    ?>
<style>
    .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
        padding: 10px 0;
</style>

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
                    <section class="panel sectiontable">
                        <header class="panel-heading">
                            لیست متخصصان

                        </header>
                        <div>
                            <table class="table table-striped border-top" id="sample_1" align="center">

                                <thead>
                                <?php
                                $need = $A->Query("SELECT *,workers.id as wId FROM workers,subcategory WHERE workers.subCategoryId=subcategory.id");
                                ?>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>شماره تلفن</th>
                                    <th>تاریخ تولد</th>
                                    <th>آدرس</th>
                                    <th>کد ملی</th>
                                    <th>شماره تلفن ثابت</th>
                                    <th>تاریخ</th>
                                    <th>ساعت</th>
                                    <th>شناسه عکس</th>
                                    <th>وضعیت</th>
                                    <th>جنسیت</th>
                                    <th>وضعیت تاهل</th>
                                    <th>تخصص</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>


                                <tbody>
                                <?php
                                $i=1;
                                while ($rowNeed = mysqli_fetch_assoc($need)){
                                ?>
                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['name']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['lastName']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['phoneNumber']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['dateOfBirth']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['address']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['nationalCode']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['fixedPhoneNumber']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['date']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['time']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['WorkersImg']?></td>
                                    <td>
                                        <?php if ($rowNeed['status'] == 1) {
                                            echo 'فعال';
                                        } elseif ($rowNeed['status'] == 0){
                                            echo 'غیر فعال';
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if ($rowNeed['gender'] == 1) {
                                            echo 'مرد';
                                        } elseif ($rowNeed['gender'] == 0){
                                            echo 'زن';
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if ($rowNeed['maritalStatus'] == 1) {
                                            echo 'متاهل';
                                        } elseif ($rowNeed['maritalStatus'] == 0){
                                            echo 'مجرد';
                                        } ?>
                                    </td>
                                    <td class="hidden-phone"><?php echo $rowNeed['subcategory']?></td>
                                    <td>
                                        <a href="Experts_Edit.php?id=<?php echo $rowNeed['wId'] ?>" target="_blank">
                                            <button class="btn btn-primary btn-xs">ویرایش</i></button>
                                        </a>
                                    </td>
                                </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                                </tbody>

                            </table>

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
<script type="text/javascript" src="assets/advanced-datatable.media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-table/DT_bootstrap.js"></script>


<!--script for this page only-->
<script src="js/dynamic-table.js"></script>


</body>
</html>