<?php
include "0-3loginCheckAdmin3.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست اطلاعات ارائه شده</title>

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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <section class="panel sectiontable ">
                        <header class="panel-heading">
                            لیست اطلاعات ارائه شده
                        </header>
                        <div class="panel-body">

                        </div>
                        <div class="dl53">
                            <table class="table table-striped border-top" id="sample_1" align="center">
                                <?php
                                $need=$A->Query("SELECT *,subcategoryinformation.id as sid,subcategoryinformation.status as SS FROM subcategoryinformation,subcategory WHERE subcategoryinformation.subcategoryId=subcategory.id");
                                ?>
                                <thead>

                                <tr>
                                    <th>ردیف</th>
                                    <th> نوع خدمت</th>
                                    <th> عنوان</th>
                                    <th>پاراگراف 1 </th>
                                    <th>پاراگراف 2 </th>
                                    <th>پاراگراف 3 </th>
                                    <th> وضعیت </th>
                                    <th> عملیات </th>
                                </tr>
                                </thead>

                                <tbody id="tableQ">
                                <?php
                                $i=1;
                                while ($rowNeed = mysqli_fetch_assoc($need)){
                                ?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $rowNeed['subcategory']?></td>
                                    <td><?php echo $rowNeed['title']?></td>
                                    <td><?php echo $rowNeed['text']?></td>
                                    <td><?php echo $rowNeed['text2']?></td>
                                    <td><?php echo $rowNeed['text3']?></td>
                                    <td>
                                        <?php if ($rowNeed['SS'] == 1) {
                                            echo 'فعال';
                                        } elseif ($rowNeed['SS'] == 0){
                                            echo 'غیر فعال';
                                        } ?>
                                    </td>
                                    <td>
                                        <a href="Edit_infoErae.php?id=<?php echo $rowNeed['sid'] ?>" target="_blank">
                                            <button class="btn btn-primary btn-xs">ویرایش</button>
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