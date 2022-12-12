<?php
include "loginCheckUser.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>رسید من</title>
    <!--bootstarp-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery(bootstrap).js"></script>
    <script src="js/bootstrap.js"></script>
    <!--css-->
    <link rel="stylesheet" href="css/newcss.css">
</head>
<body class="receipcls">
<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 dl24">
    <?php
    $factId = $_GET['id'];
    $receipt = $A->Query("SELECT * FROM factordata,product WHERE FactorID='$factId' AND product.ProductID=factordata.ProductID");
    ?>
    <table id="table02" border="2" align="center">
        <thead class="thr">
        <tr class="clas1">
            <th class="tdreceipt">ردیف</th>
            <th class="tdreceipt">اقلام خریداری شده</th>
            <th class="tdreceipt">تعداد</th>
            <th class="tdreceipt">قیمت کل</th>
        </tr>
        </thead>
        <?php
        $i = 1;
        $TOTAL = 0;
        while ($rowReceipt = mysqli_fetch_assoc($receipt)){
        //            $getProduct=$rowReceipt['ProductID'];
        //            $productName=$A->Query("SELECT * FROM product WHERE ProductID='$getProduct'");
        //            $rowProductName = $A->FetchAssoc($productName);
        //            $productNameString = $rowProductName['ProductName'];
        ?>
        <tr class="clas1">
            <td><?php echo $i ?></td>
            <!--                <td>--><?php //echo $productNameString
            ?><!--</td>-->
            <td><?php echo $rowReceipt['ProductName'] ?></td>
            <td><?php echo $rowReceipt['NumbersProduct'] ?></td>
            <td><?php echo $TO = $rowReceipt['Price'] * $rowReceipt['NumbersProduct'] ?></td>
        </tr>
            <?php
            $i++;
            //                $TOTAL+=$rowReceipt['FinalPrice'];
            $TOTAL += $TO;
            }
            ?>
    </table>
</div>
<br>
<div class="col-md-6 col-lg-6 col-xs-6 col-sm-6" id="line52">
    <div class="col-lg-6 md6 col-sm-12 col-xs-12 pull-right line53">
        <h3 class="line54">
            مبلغ نهایی(ریال)
        </h3>
    </div>
    <div class="col-lg-6 md6 col-sm-12 col-xs-12 line53">
        <h3 class="line54">
            <?php echo $TOTAL ?>
        </h3>
    </div>
</div>
</body>
</html>