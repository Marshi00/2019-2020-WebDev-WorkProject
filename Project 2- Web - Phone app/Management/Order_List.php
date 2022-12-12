<?php
include "0-4loginCheckAdmin4.php";
$user_id = $_SESSION['id']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست سفارش ها</title>

    <?php
    include "link.php";
    ?>

<style>
    .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
    padding: 10px 0;
    font-size: 10px;
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
                            لیست سفارش ها
                        </header>
                        <div>
                            <table class="table table-striped border-top" id="sample_1">

                                <thead>
                                <?php
                                $need = $A->Query("SELECT *,orderlist.id as oid,orderlist.status as oStatus,adress.Address as oAdress FROM orderlist,workers,user,subcategory,adress WHERE orderlist.userId=user.id AND orderlist.workerId=workers.id AND orderlist.subcategoryId=subcategory.id AND orderlist.addressId=adress.id");
                                ?>
                                <tr>
                                    <th>ردیف</th>
                                    <th>شناسه سفارش</th>
                                    <th>شناسه مشتری</th>
                                    <th> شناسه خدمت</th>
                                    <th>تاریخ ثبت</th>
                                    <th>زمان ثبت</th>
                                    <th>شناسه متخصص</th>
                                    <th>توضیحات</th>
                                    <th>آدرس</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ </th>
                                    <th>زمان </th>
                                    <th>پرداختی های سفارش</th>
                                    <th>جزئیات سفارش</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <?php
                                $i=1;
                                while ($rowNeed = mysqli_fetch_assoc($need)){
                                ?>
                                <tbody>

                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['oid']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['PhoneNumber']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['subcategory']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['submitDate']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['submitTime']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['nationalCode']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['details']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['oAdress']?></td>
                                    <td>
                                        <?php if ($rowNeed['oStatus'] == 1) {
                                            echo 'در انتظار';
                                        } elseif ($rowNeed['oStatus'] == 0){
                                            echo 'لغو شده';
                                        }
                                        elseif ($rowNeed['oStatus'] == 2){
                                            echo 'انجام شده';
                                        }?>
                                    </td>
                                    <td class="hidden-phone"><?php echo $rowNeed['neededDate']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['neededTime']?></td>
                                    <td>
                                        <a href="OrderDetails_List.php?id=<?php echo $rowNeed['oid']  ?>">
                                            <button class="btn btn-primary btn-xs">جزئیات مالی</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="quesvalue.php">
                                            <button class="btn btn-primary btn-xs">جزئیات</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="Order_Edit.php?id=<?php echo $rowNeed['oid']  ?>" target="_blank">
                                            <button class="btn btn-primary btn-xs">ویرایش</button>
                                        </a>
                                    </td>
                                </tr>

                                </tbody>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </table>

                        </div>

                    </section>

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