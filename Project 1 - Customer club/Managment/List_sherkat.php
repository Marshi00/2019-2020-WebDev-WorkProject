<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست شرکت ها</title>
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>لیست شرکت ها</h3></button>
        </div>
        <!--search box-->
<!--        <div class="inputsearch col-12">-->
<!--            <input type="search" class="isl55" id="A12" placeholder="جستجوی شناسه ی محصول">-->
<!--            <button id="AAA">-->
<!--                <i class="fas fa-search"></i>-->
<!--            </button>-->
<!--        </div>-->

        <div class="col-12 dtl35">
            <?php
            $company = $A->Query("SELECT * FROM company ");
            ?>
            <table id="table12" align="center" border="1">
                <tr class="clas12">
                    <th>ردیف</th>
                    <th>نام شرکت</th>
                    <th>شماره ثبت شرکت</th>
                    <th>شناسه ملی شرکت</th>
                    <th>کد اقتصادی</th>
                    <th>استان</th>
                    <th>شهر</th>
                    <th>شماره تلفن</th>
                    <th>ویرایش</th>
                </tr>
                <?php
                $i = 1;
                while ($rowCompany = mysqli_fetch_assoc($company)) {
                    ?>
                    <tr class="clas12">
                        <td><?php echo $i ?></td>
                        <td><?php echo $rowCompany['CompanyName'] ?></td>
                        <td><?php echo $rowCompany['CompanyRegistrationNumber'] ?></td>
                        <td><?php echo $rowCompany['CompanyNationalID'] ?></td>
                        <td><?php echo $rowCompany['EconomicCode'] ?></td>
                        <td><?php echo $rowCompany['Province'] ?></td>
                        <td><?php echo $rowCompany['City'] ?></td>
                        <td><?php echo $rowCompany['FixedPhoneNumber'] ?></td>
                        <td><a target="_blank" href="Edit_sherkat.php?id=<?php echo $rowCompany['ID'] ?>" class="atag">
                                ویرایش</a></td>
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