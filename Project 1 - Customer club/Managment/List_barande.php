<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>جدول برنده ها</title>
    <link rel="stylesheet" href="Css/events.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <?php
    include "link.php"
    ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php
    include "nav.php";
    ?>
    <div class="content-wrapper">
        <div class="col-12">
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>جدول برنده ها</h3></button>
        </div>

        <div class="col-12 dtl35">
            <?php
            $winners = $A->Query("SELECT * FROM winnerstable ");
            ?>
            <table id="table12" align="center" border="1">
                <tr class="clas12">
                    <th>ردیف</th>
                    <th>شناسه برنده</th>
                    <th>شناسه قرعه کشی</th>
                    <th>تاریخ تحویل</th>
                    <th>زمان تحویل</th>
                    <th>وضعیت</th>
                    <th>تحویل</th>
                    <th>ویرایش</th>
                </tr>
                <?php
                $i = 1;
                while ($rowWinners = mysqli_fetch_assoc($winners)) {
                    ?>
                    <tr class="clas12">
                        <td><?php echo $i ?></td>
                        <td><?php echo $rowWinners['WinnerId'] ?></td>
                        <td><?php echo $rowWinners['LotteryId'] ?></td>
                        <td><?php echo $rowWinners['DeliveryDate'] ?></td>
                        <td><?php echo $rowWinners['DeliveryTime'] ?></td>
                        <td><?php if ($rowWinners['Status']==1){
                            echo 'تحویل شده است';
                            }
                            else echo 'تحویل نشده است'?></td>
                        <td><a target="_blank" href="Tahvil_barande.php?id=<?php echo $rowWinners['ID'] ?>"
                               class="atag"> تحویل</a></td>
                        <td><a target="_blank" href="Edit_barande.php?id=<?php echo $rowWinners['ID'] ?>"
                               class="atag"> ویرایش</a></td>
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