<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست کالاها</title>
    <link rel="stylesheet" href="Css/kala.css">
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>لیست کالا ها : برای ویرایش مشخصات هر کالا روی شناسه ی آن کلیک کنید</h3></button>
        </div>

        <div class="col-10 dtl35 aaab" align="center">
            <?php
            $product = $A->Query("SELECT * FROM product ");
            ?>
            <table id="table02" align="left" border="2">
                <thead>
                <tr class="clas2">
                    <th>ردیف</th>
                    <th>نام محصول</th>
                    <th>شناسه محصول</th>
                    <th>قیمت</th>
                    <th>ضریب</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while ($rowProduct = mysqli_fetch_assoc($product)) {
                    ?>
                    <tr class="clas2">
                        <!--                class="clas2 "-->
                        <td><?php echo $i ?></td>
                        <td><?php echo $rowProduct['ProductName'] ?></td>
                        <td><a target="_blank" href="Edit_kala.php?id=<?php echo $rowProduct['ProductID'] ?>" class="atag"> <?php echo $rowProduct['ProductID'] ?></a></td>
                        <td><?php echo $rowProduct['Price'] ?></td>
                        <td><?php echo $rowProduct['Multiplier'] ?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    var input12 = document.getElementById("A12");
    input12.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("AAA").click();
        }
    });

</script>

</body>

</html>