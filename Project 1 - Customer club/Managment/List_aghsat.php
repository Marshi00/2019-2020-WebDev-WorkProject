<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست اقساط</title>
    <link rel="stylesheet" href="Css/gharardad.css">
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>لیست اقساط</h3></button>
        </div>
        <div class="col-8 dtl35" align="center">

            <?php
            $inst = $A->Query("SELECT * FROM installmentlist");
            ?>
            <table id="table12" align="center" border="1">
                <tr class="clas12">
                    <th>ردیف</th>
                    <th>شناسه مشتری اقساطی</th>
                    <th>میزان پرداختی</th>
                    <th>تاریخ واریز قسط</th>
                    <th>تاریخ انجام واریز قسط</th>
                    <th>وضعیت پرداخت</th>
                </tr>
                <?php
                $i = 1;
                while ($rowInst = mysqli_fetch_assoc($inst)) {
                    ?>
                    <tr class="clas12">
                        <td><?php echo $i ?></td>
                        <td><?php echo $rowInst['ContractUserID'] ?></td>
                        <td><?php echo $rowInst['PaymentAmount'] ?></td>
                        <td><?php echo $rowInst['DueDate'] ?></td>
                        <td><?php echo $rowInst['PaymentDate'] ?></td>
                        <td><?php if ($rowInst['PaymentStatus']=='1'){
                            echo 'پرداخت شده';
                            }
                            elseif ($rowInst['PaymentStatus']=='0'){
                                echo 'پرداخت نشده';
                            }?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>

        </div>
    </div>

</div>

</body>

</html>