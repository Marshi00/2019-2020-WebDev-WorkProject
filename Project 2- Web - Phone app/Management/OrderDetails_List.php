<?php
include "0-4loginCheckAdmin4.php";
$id = $_GET['id'];
$user_id = $_SESSION['id']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست جزئیات سفارش ها</title>

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
                            لیست جزئیات سفارش ها

                        </header>
                        <div>
                            <table class="table table-striped border-top" id="sample_1">
                                <?php
                                $need=$A->Query("SELECT *,paymentamountlist.id as pid FROM paymentamountlist,workers where paymentamountlist.orderListId='$id' AND paymentamountlist.workerId=workers.id");
                                ?>
                                <thead>

                                <tr style="font-size: 10px">
                                    <th>ردیف</th>
                                    <th>میزان پرداخت نقدی</th>
                                    <th>هزینه های جانبی</th>
                                    <th>میزان پررداخت از وبسایت</th>
                                    <th>شناسه متخصص</th>
                                    <th>پورسانت</th>
                                    <th>مبلغ نهایی</th>
                                    <th>تاریخ شروع کار</th>
                                    <th>زمان شروع کار</th>
                                    <th>تاریخ پایان کار</th>
                                    <th>زمان پایان کار</th>
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
                                    <td class="hidden-phone"><?php echo $rowNeed['cash']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['operatingCosts']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['webPayment']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['nationalCode']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['Commission']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['finalPrice']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['workStartDate']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['workStartTime']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['workFinishDate']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['workFinishTime']?></td>

                                    <td>
                                        <a href="OrderDetails_Edit.php?id=<?php echo $rowNeed['pid'] ?>" target="_blank">
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


        </section> <?php
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