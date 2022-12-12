<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>جزئیات فاکتور</title>
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
                <button type="button" class="btn btn-primary col-12 btnl482"><h3>جزئیات فاکتور</h3></button>
            </div>
            <div class="col-10 dtl27" align="center">
                <table id="table1" align="center" border="1">
                    <tr class="clas11">
                        <?php
                        $factorData = $A->Query("SELECT * FROM factordata ");
                        //                where FactorID='6464549'
                        ?>
                        <th>ردیف</th>
                        <th>شناسه فاکتور</th>
                        <th>شناسه محصول</th>
                        <th>تعداد</th>
                        <th>قیمت</th>
                        <th>وضعیت</th>
                        <th>ویرایش</th>
                    </tr>
                    <?php
                    $i = 1;
                    while ($rowfactorData = mysqli_fetch_assoc($factorData)) {
                        ?>
                        <tr class="clas11">
                            <td><?php echo $i ?></td>
                            <td><?php echo $rowfactorData['FactorID'] ?></td>
                            <td><?php echo $rowfactorData['ProductID'] ?></td>
                            <td><?php echo $rowfactorData['NumbersProduct'] ?></td>
                            <td><?php echo $rowfactorData['FinalPrice'] ?></td>
                            <td><?php echo $rowfactorData['Status'] ?></td>
                            <td><a target="_blank" href="edit_sub_factor.php?id=<?php echo $rowfactorData['ID'] ?>"
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
</div>
</body>

</html>