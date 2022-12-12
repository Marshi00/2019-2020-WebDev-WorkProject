<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پرفروشترین کالاها</title>
    <link rel="stylesheet" href="Css/kala.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <?php
    include "link.php"
    ?>
</head>
<body class="hold-transition sidebar-mini bsk">

<?php
include "nav.php";
?>
<div class="content-wrapper">
    <div class="col-12">
        <button type="button" class="btn btn-primary col-12 btnl48"><h3>لیست کالا ها : برای ... روی شناسه ی آن کلیک
                کنید</h3></button>
    </div>

    <div class="col-lg-10 dtl35">
        <table id="table03" align="center" border="2">
            <thead>
            <tr class="clas3">
                <th>ردیف</th>
                <th>نام محصول</th>
                <th>کد کالا</th>
                <th>تعداد</th>
                <th>قیمت کل</th>
            </tr>

            </thead>
            <tbody>
            <tr class="clas3">
                <td>1</td>
                <td>پیراهن</td>
                <td>102030</td>
                <td>3</td>
                <td>30000تومان</td>
            </tr>
            <tr class="clas3">
                <td>2</td>
                <td>تی شرت</td>
                <td>506070</td>
                <td>3</td>
                <td>30000تومان</td>
            </tr>
            <tr class="clas3">
                <td>3</td>
                <td>شلوار</td>
                <td>50550</td>
                <td>3</td>
                <td>30000تومان</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</body>

</html>