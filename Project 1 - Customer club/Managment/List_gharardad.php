<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست قرارداد ها</title>
    <link rel="stylesheet" href="Css/gharardad.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <?php
    include "link.php"
    ?>
</head>
<body>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php
    include "nav.php";
    ?>
    <div class="content-wrapper">
        <div class="col-12">
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>لیست قرارداد ها</h3></button>
        </div>
        <!--search box-->
<!--        <div class="inputsearch col-12">-->
<!--            <input type="search" class="isl55" id="A12" placeholder="جستجوی شناسه ی برنده">-->
<!--            <button id="AAA">-->
<!--                <i class="fas fa-search"></i>-->
<!--            </button>-->
<!--        </div>-->

        <div class="col-12 dtl35" id="n1">
            <?php
            $contract = $A->Query("SELECT * FROM companycontract ");
            ?>
            <table id="table12" align="left" border="2">
                <tr class="clas12">
                    <th>ردیف</th>
                    <th>نام شرکت</th>
                    <th>شناسه قرارداد</th>
                    <th>دوره اقساط</th>
                    <th>تعداد اقساط</th>
                    <th>مبلغ مجاز</th>
                    <th>تاریخ شروع قرارداد</th>
                    <th>تاریخ پایان قرارداد</th>
                    <th>ویرایش</th>
                </tr>
                <?php
                $i = 1;
                while ($rowContract = mysqli_fetch_assoc($contract)) {
                    ?>
                    <tr class="clas12">
                        <td><?php echo $i ?></td>
                        <td><?php echo $rowContract['CompanyName'] ?></td>
                        <td><?php echo $rowContract['ID'] ?></td>
                        <td><?php echo $rowContract['InstallmentPeriod'] ?></td>
                        <td><?php echo $rowContract['InstallmentNumbers'] ?></td>
                        <td><?php echo $rowContract['PaymentAmount'] ?></td>
                        <td><?php echo $rowContract['StartDate'] ?></td>
                        <td><?php echo $rowContract['ExpDate'] ?></td>
                        <td><a target="_blank" href="Edit_gharardad.php?id=<?php echo $rowContract['ID'] ?>"
                               class="atag">ویرایش</a></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $(".clas1").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>

</body>

</html>