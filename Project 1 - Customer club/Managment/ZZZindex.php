<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت </title>
    <link rel="stylesheet" href="Css/footer_index.css">
    <link rel="stylesheet" href="Css/admin.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <link rel="stylesheet" href="Css/all.css">
    <!-- Tell the browser to be responsive to screen width -->
    <?php
    include "link.php";
    ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!--    navbar & sidebar-->
    <?php
    include "nav.php";
    ?>
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">وضعیت ادمین ها</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="logout.php">خروج</a></li>
                            <li class="breadcrumb-item active">صفحه ی من</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="col-12">
                <button type="button" class="btn btn-primary col-12 btnl48"><h3>وضعیت ادمین ها : برای ویرایش هر ادمین روی کد ملی وی کلیک کنید</h3></button>
            </div>

            <?php
            $Admins = $A->Query("SELECT * FROM admin ");
            ?>
            <div class="col-12 dtl61">
                <table id="table01" align="center" border="1">
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
                    <tbody>
                    <?php
                    $i = 1;
                    while ($rowAdmins = mysqli_fetch_assoc($Admins)) {
                        ?>
                        <tr class="clas1 ">
                            <td><?php echo $i ?></td>
                            <td><?php echo $rowAdmins['Name'] ?></td>
                            <td><?php echo $rowAdmins['LastName'] ?></td>
                            <td><?php echo $rowAdmins['Email'] ?></td>
                            <td><?php echo $rowAdmins['PhoneNumber'] ?></td>
                            <td><a target="_blank"
                                   href="Edit_admin.php?id=<?php echo $rowAdmins['ID(national code)'] ?>"
                                   class="atag"> <?php echo $rowAdmins['ID(national code)'] ?></a></td>
                            <td><?php echo $rowAdmins['Level'] ?></td>
                            <td><?php echo $rowAdmins['Branch'] ?></td>
                            <td><?php if ($rowAdmins['Status'] == 1) {
                                    echo 'فعال';
                                } else echo 'غیر فعال' ?></td>
                            <td><?php echo $rowAdmins['Date'] ?></td>
                            <td><?php echo $rowAdmins['Time'] ?></td>
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
</div>
<script>
    // trigger
    var input11 = document.getElementById("A1");
    input11.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            console.log();
            event.preventDefault();
            document.getElementById("AAA").click();
        }
    });
</script>
</body>
</html>
