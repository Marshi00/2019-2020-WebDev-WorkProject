<?php
include "0-3loginCheckAdmin3.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست مشتریان</title>

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
                            لیست مشتریان
                        </header>
                        <div>
                            <table class="table table-striped border-top" id="sample_1" align="center">
                                <?php
                                $need=$A->Query("SELECT * FROM user ");
                                ?>
                                <thead>

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>شماره تلفن</th>
                                    <th>تاریخ تولد</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                while ($rowNeed = mysqli_fetch_assoc($need)){
                                ?>
                                <tr>
                                    <td class="hidden-phone"><?php echo $i?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['Name']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['LastName']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['PhoneNumber']?></td>
                                    <td class="hidden-phone"><?php echo $rowNeed['dateOfBirth']?></td>
                                    <td>
                                        <a href="Client_Edit.php?id=<?php echo $rowNeed['id'] ?>" target="_blank">
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