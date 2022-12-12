<?php
include "0-3loginCheckAdmin3.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست امتیاز ها</title>

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
                            لیست امتیاز ها
                        </header>
                        <div>
                            <table class="table table-striped border-top" id="sample_1">

                                <thead>
                                <?php
                                $need = $A->Query("SELECT *,points.id as pid FROM POINTS,workers,user WHERE points.workerId=workers.id AND points.userId=user.id");
                                ?>
                                <tr>
                                    <th>ردیف</th>
                                    <th>شناسه متخصص</th>
                                    <th>شناسه مشتری</th>
                                    <th>امتیاز</th>
                                    <th>شناسه سفارش</th>
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
                                    <td class="hidden-phone"><?php echo $rowNeed['nationalCode']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['PhoneNumber']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['points']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['orderListId']?></td>

                                    <td>
                                        <a href="Points_Edit.php?id=<?php echo $rowNeed['pid'] ?>" target="_blank">
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