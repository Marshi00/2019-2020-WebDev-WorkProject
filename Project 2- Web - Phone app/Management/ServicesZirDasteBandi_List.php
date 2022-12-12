<?php
include "0-3loginCheckAdmin3.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست نوع خدمت ها</title>

    <?php
    include "link.php";
    ?>

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
                            لیست نوع خدمت ها
                        </header>
                        <div>
                            <table class="table table-striped border-top" id="sample_1" align="center">
                                <thead>
                                <?php
                                $need = $A->Query("SELECT *,subcategory.Status as scs,subcategory.id as sid FROM subcategory,category WHERE subcategory.categoryId=category.id ");
                                ?>
                                <tr>
                                    <th>ردیف</th>
                                    <th>شناسه خدمت</th>
                                    <th>نوع خدمت</th>
                                    <th>شناسه عکس</th>
                                    <th>درصد پورسانت</th>
                                    <th>حداقل هزینه</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <?php
                                    $i = 1;
                                    while ($rowNeed = mysqli_fetch_assoc($need)) {
                                    ?>
                                    <td class="hidden-phone"><?php echo $i ?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['category'] ?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['subcategory'] ?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['subCatImg'] ?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['Commission'] ?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['minimumCost'] ?></td>
                                    <td>
                                        <?php if ($rowNeed['scs'] == 1) {
                                            echo 'فعال';
                                        } elseif ($rowNeed['scs'] == 0){
                                            echo 'غیر فعال';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="ServicesZirDasteBandi_Edit.php?id=<?php echo $rowNeed['sid'] ?>" target="_blank">
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