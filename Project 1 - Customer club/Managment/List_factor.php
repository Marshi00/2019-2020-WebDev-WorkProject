<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست فاکتور ها</title>
    <link rel="stylesheet" href="Css/factor.css">
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

        <div>
            <div class="col-12">
                <button type="button" class="btn btn-primary col-12 btnl48"><h3>لیست فاکتور ها : برای ویرایش هر فاکتور
                        روی شناسه ی آن کلیک کنید</h3><br>
                    <h3>برای ثبت محصولات هر فاکتور ، در ردیف فاکتور موردنظر روی ثبت کلیک کنید</h3></button>
            </div>
            <!--search box-->
<!--            <div class="inputsearch col-12">-->
<!--                <input type="search" class="isl55" id="A007" placeholder="جستجوی کد ملی ">-->
<!--                <button id="AAA1">-->
<!--                    <i class="fas fa-search"></i>-->
<!--                </button>-->
<!--            </div>-->

            <div class="col-12 dtl27">
                <?php
                $factor = $A->Query("SELECT * FROM factor ");
                ?>
                <table id="table1" align="center" border="1">
                    <tr class="clas11">
                        <th >ردیف</th>
                        <th >شناسه فاکتور</th>
                        <th >شناسه کاربر</th>
                        <th >شناسه ادمین</th>
                        <th >روش پرداخت</th>
                        <th >وضعیت پرداخت</th>
                        <th >شناسه قرارداد</th>
                        <th >امتیازات بدست آورده</th>
                        <th >امتیازات مصرف شده</th>
                        <th >تاریخ</th>
                        <th >زمان</th>
                        <th >مبلغ نهایی</th>
                        <th >ثبت ریز فاکتور</th>

                    </tr>
                    <?php
                    $i = 1;
                    while ($rowFactors = mysqli_fetch_assoc($factor)) {
                        ?>
                        <tr class="clas11 " >
                            <td ><?php echo $i ?></td>
                            <td ><a target="_blank" href="Edit_factor.php?id=<?php echo $rowFactors['FactorID'] ?>" class="atag"> <?php echo $rowFactors['FactorID'] ?></a></td>
                            <td ><?php echo $rowFactors['UserID'] ?></td>
                            <td ><?php echo $rowFactors['AdminID'] ?></td>
                            <td><?php if ($rowFactors['PaymentMethod'] == 1) {
                                    echo 'نقدی';
                                } else echo 'اقساطی' ?></td>
                            <td><?php if ($rowFactors['PaymentStatues'] == 1) {
                                    echo 'پرداخت شده است';
                                } else echo 'پرداخن نشده است' ?></td>
                            <td ><?php echo $rowFactors['ContractID'] ?></td>
                            <td ><?php echo $rowFactors['EarnedCredit'] ?></td>
                            <td ><?php echo $rowFactors['UsedCredit'] ?></td>
                            <td ><?php echo $rowFactors['Date'] ?></td>
                            <td ><?php echo $rowFactors['Time'] ?></td>
                            <td ><?php echo $rowFactors['finalPrice'] ?></td>
                            <td ><a target="_blank" href="add_sub_factor.php?id=<?php echo $rowFactors['FactorID'] ?>" class="atag"> ثبت </a></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </table>

            </div>

        </div>
    </div>
</div>
<script>
    var input007 = document.getElementById("A007");
    input007.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("AAA1").click();
        }
    });

</script>

</body>

</html>