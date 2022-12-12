<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پرفروشترین کالاها</title>
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>جدول برنده ها</h3></button>
        </div>
        <!--search box-->
<!--        <div class="inputsearch col-12">-->
<!--            <input type="search" class="isl55" id="A12" placeholder="جستجوی شناسه ی برنده">-->
<!--            <button id="AAA">-->
<!--                <i class="fas fa-search"></i>-->
<!--            </button>-->
<!--        </div>-->

        <div class="col-12 dtl35" align="center">
            <?php
            $contractusers = $A->Query("SELECT * FROM contractusers ");
            ?>
            <table id="table12" align="center" border="1">
                <tr class="clas12">
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>کد ملی</th>
                    <th>نام شرکت</th>
                    <th>شماره همراه</th>
                    <th>شماره تلفن ثابت</th>
                    <th>محل سکونت</th>
                    <th>جنسیت</th>
                    <th>تاریخ ازدواج</th>
                    <th>شناسه شرکت</th>
                    <th>شناسه قرارداد</th>
                </tr>
                <?php
                $i = 1;
                while ($rowContractusers = mysqli_fetch_assoc($contractusers)) {
                    ?>
                    <tr class="clas12">
                        <td><?php echo $i ?></td>
                        <td><?php echo $rowContractusers['Name'] ?></td>
                        <td><?php echo $rowContractusers['LastName'] ?></td>
                        <td><?php echo $rowContractusers['NationalCode'] ?></td>
                        <td><?php echo $rowContractusers['CompanyName'] ?></td>
                        <td><a target="_blank"
                               href="Edit_moshtarian_aghsati.php?id=<?php echo $rowContractusers['PhoneNumber'] ?>"
                               class="atag"> <?php echo $rowContractusers['PhoneNumber'] ?></a></td>
                        <td><?php echo $rowContractusers['FixedPhoneNumber'] ?></td>
                        <td><?php echo $rowContractusers['Adress'] ?></td>
                        <td><?php if ($rowContractusers['Gender']==1){
                                echo 'آقا';
                            }
                            else echo 'خانم'?></td>
                        <td><?php echo $rowContractusers['DateOfMarriage'] ?></td>
                        <td><?php echo $rowContractusers['CompanyID'] ?></td>
                        <td><?php echo $rowContractusers['ContractID'] ?></td>
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