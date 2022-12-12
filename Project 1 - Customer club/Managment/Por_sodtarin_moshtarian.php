<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پر سود ترین مشتریان</title>
    <link href="Css/Por_sodtarin_moshtarian.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <?php
    include "link.php"
    ?>
</head>
<body>
<?php
include "nav.php";
?>
<div style="margin-right: 250px">

<div class="col-lg-12 col-md-6 col-sm-3" align="left">
    <button type="button" class="btn btn-primary col-lg-12" id="btn01"><h1>پر سود ترین مشتریان</h1></button>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 ">
    <div class="mmKinfgInputSearch">
        <input type="search" class="mmKinfgInputSearch2" placeholder="جستجوی شناسه مشتری">
        <br>
        <br>
    </div>
</div>
<div class="col-lg-12" id="n1" style="height: 70vh">
    <div class="col-lg-12">
        <table id="table01" align="left" border="2">
            <tr class="clas1">
                <th>نام مشتری</th>
                <th>شناسه مشتری</th>
                <th>مبلغ کل فاکتور ها</th>

            </tr>
            <tr class="clas1" >
                <td >1</td>
                <td>پیراهن</td>
                <td>102030</td>

            </tr>
            <tr class="clas1">
                <td>2</td>
                <td>تی شرت</td>
                <td>506070</td>

            </tr>
            <tr class="clas1">
                <td>3</td>
                <td>شلوار</td>
                <td>50550</td>

            </tr>

        </table>

    </div>

</div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>

</div>

</body>

</html>