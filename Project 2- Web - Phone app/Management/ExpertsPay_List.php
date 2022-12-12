<?php
include "0-4loginCheckAdmin4.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست پرداختی ها به متخصصان</title>

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
                            لیست پرداختی ها به متخصصان
                        </header>
                        <div>
                            <table class="table table-striped border-top" id="sample_1" align="center">

                                <thead>
                                <?php
                                $need = $A->Query("SELECT *,workerspayment.id as wid,workerspayment.Status as ws,workerspayment.date as wd,workerspayment.time as wt FROM workerspayment,workers WHERE workerspayment.workerId=workers.id");;
                                ?>
                                <tr>
                                    <th>ردیف</th>
                                    <th>شناسه متخصص</th>
                                    <th>شماره پیگیری پرداخت</th>
                                    <th>مبلغ</th>
                                    <th>تاریخ</th>
                                    <th>زمان</th>
                                    <th>وضعیت</th>
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
                                    <td class="hidden-phone"><?php echo $rowNeed['PaymentTrackingNumber']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['paymentAmount']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['wd']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['wt']?></td>
                                    <td>
                                        <?php if ($rowNeed['ws'] == 1) {
                                            echo 'موفق';
                                        } elseif ($rowNeed['ws'] == 0){
                                            echo 'نا موفق';
                                        } ?>
                                    </td>
                                    <td>
                                        <a href="ExpertsPay_Edit.php?id=<?php echo $rowNeed['wid'] ?>" target="_blank">
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

    </section>
    <?php
    include "footer.php";
    ?>

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