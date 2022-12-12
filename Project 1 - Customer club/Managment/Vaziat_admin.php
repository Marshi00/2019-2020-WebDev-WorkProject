<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>وضعیت ادمین</title>
    <link href="Css/admin.css" rel="stylesheet">
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
    <button type="button" class="btn btn-primary col-lg-12" id="btn01"><h1>وضعیت ادمین</h1></button>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 ">
    <div class="mmKinfgInputSearch">
        <style>
            .mmKinfgInputSearch{
                display: flex;

                align-items: center;align-content: center;justify-content: center;justify-items: center;
                grid-gap: 2rem;
            }
            .mmKinfgInputSearch:before{
                content: "\f002";
                font-family: FontAwesome;
                font-size: 15px;
                position: relative;
                transform: translate(-1309%,0);
                color: #1F2D3D;
            }
        </style>
        <input type="search" id="searchAdminText" onkeypress="searchAdmin()" class="mmKinfgInputSearch2" placeholder="جستجوی کد ملی ">
        <br>
        <br>
    </div>
</div>
<div class="col-lg-12" id="n1" style="height: 70vh">
    <?php
    $Admins=$A->Query("SELECT * FROM admin ");
    ?>
    <div class="col-lg-12">
        <table id="table01" align="left" border="2" onclick="showingMore()">
            <thead>
            <tr class="clas1">
                <th>ردیف</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>ایمیل</th>
                <th>شماره موبایل</th>
                <th>کد ملی</th>
                <th>سطح</th>
                <th>شعبه</th>
                <th>وضعیت</th>
                <th>تاریخ</th>
                <th>ساعت</th>
            </tr>
            </thead>
            <tbody id="tableBody">

            <?php
            $i=1;
            while ($rowAdmins = mysqli_fetch_assoc($Admins)){
            ?>
            <tr class="clas1 " data-href='Edit_admin.php'>
                <td ><?php echo $i?></td>
                <td><?php echo $rowAdmins['Name']?></td>
                <td><?php echo $rowAdmins['LastName']?></td>
                <td><?php echo $rowAdmins['Email']?></td>
                <td><?php echo $rowAdmins['PhoneNumber']?></td>
                <td><?php echo $rowAdmins['ID(national code)']?></td>
                <td><?php echo $rowAdmins['Level']?></td>
                <td><?php echo $rowAdmins['Branch']?></td>
                <td><?php echo $rowAdmins['Status']?></td>
                <td><?php echo $rowAdmins['Date']?></td>
                <td ><?php echo $rowAdmins['Time']?></td>
            </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
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
<script>
    jQuery(document).ready(function($) {
        $(".clas1").click(function() {
            window.location = $(this).data("href");
        });
    });

    function searchAdmin() {
        var searchAdminText = $("#searchAdminText").val();


        $.ajax({
            url: "00000.php",
            data:{
                searchAdminText:searchAdminText
            },
            dataType:"json",
            type:"POST",
            success : function (jsonData) {
               $("#tableBody").html(jsonData['html']);
            }
        });

    }
</script>

</body>
</html>