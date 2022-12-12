<?php
include "0-2loginCheckAdmin2.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست مدیران</title>

    <?php
    include "link.php";
    ?>
</head>

<body>

<section id="container">
    <?php
    include "header.php";
    ?>
    <?php
    include "sidebar.php";
    ?>
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                    <section class="panel sectiontable">
                        <header class="panel-heading">
                            لیست مدیران

                        </header>
                        <?php
                        $Admins=$A->Query("SELECT * FROM admin ");
                        ?>
                        <div>
                            <table class="table table-striped border-top" id="sample_1" align="center">

                                <thead>

                                <tr>
                                    <th>ردیف</th>
                                    <th>کد ملی</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>ایمیل</th>
                                    <th>شماره تلفن</th>
                                    <th>سطح</th>
                                    <th>تاریخ</th>
                                    <th>ساعت</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                while ($rowAdmins = mysqli_fetch_assoc($Admins)){
                                ?>
                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $rowAdmins['nationalCode']?></td>
                                    <td class="hidden-phone"><?php echo $rowAdmins['Name']?></td>
                                    <td class="hidden-phone"><?php echo $rowAdmins['LastName']?></td>
                                    <td class="hidden-phone"><?php echo $rowAdmins['Email']?></td>
                                    <td class="hidden-phone"><?php echo $rowAdmins['PhoneNumber']?></td>
                                    <td>
                                        <?php if ($rowAdmins['Level'] == 1) {
                                            echo 'مدیر ارشد';
                                        } elseif ($rowAdmins['Level'] == 2){
                                            echo 'مدیر میانی';
                                        }
                                        elseif ($rowAdmins['Level'] == 3){
                                            echo 'کارمند';
                                        }
                                        elseif ($rowAdmins['Level'] == 4){
                                            echo 'حسابدار';
                                        }?>
                                    </td>
                                    <td class="hidden-phone"><?php echo $rowAdmins['Date']?></td>
                                    <td class="hidden-phone"><?php echo $rowAdmins['Time']?></td>
                                    <td>
                                        <?php if ($rowAdmins['Status'] == 1) {
                                            echo 'فعال';
                                        } elseif ($rowAdmins['Status'] == 0){
                                            echo 'غیر فعال';
                                        } ?>
                                    </td>
                                    <td>
                                        <a href="Admin_Edit.php?id=<?php echo $rowAdmins['id'] ?>" target="_blank">
                                            <button class="btn btn-primary btn-xs">ویرایش</button>
                                        </a>
                                    </td>
                                </tr>
                                    <?php
                                    $i++;
                                }
                                ?>

                                </tbody>

                            </table>

                        </div>

                    </section>

                </div>
            </div>


        </section>

    </section>
    <?php
    include "footer.php";
    ?>

</section>
<?php
include "js link.php";
?>
<script type="text/javascript" src="assets/advanced-datatable.media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-table/DT_bootstrap.js"></script>


<!--script for this page only-->
<script src="js/dynamic-table.js"></script>

</body>
</html>