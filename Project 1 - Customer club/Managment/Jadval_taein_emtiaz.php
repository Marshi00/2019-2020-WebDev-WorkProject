<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تبدیل امتیاز</title>
    <link rel="stylesheet" href="Css/points.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <?php
    include "link.php"
    ?>
</head>
<body class="hold-transition sidebar-mini bal">
<div class="wrapper">

    <?php
    include "nav.php";
    ?>
    <div class="content-wrapper">

        <div class="col-12">
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>تبدیل امتیاز : برای ویرایش امتیاز روی مقدار مبلغ کلیک کنید</h3></button>
        </div>
        <div class="col-6 dtl35" align="center">
            <table id="table12" align="center" border="1">
                <tr class="clas12">
                    <th>معادل امتیازی</th>
                    <th>مبلغ</th>
                </tr>
                <?php
                $value = $A->Query("SELECT * FROM pointvalue");
                $rowFactors = mysqli_fetch_assoc($value)
                ?>

                <tr class="clas12 ">
                    <td>1</td>
                    <td><a href="Edit_emtiaz.php" target="_blank" class="atag"><?php echo $rowFactors['Point'] ?></a></td>

                </tr>
            </table>

        </div>

    </div>
</div>
</body>

</html>