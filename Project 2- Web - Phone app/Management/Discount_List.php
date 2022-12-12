<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست تخفیف ها</title>

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
                            لیست تخفیف ها
                        </header>
                        <div>
                            <table class="table table-striped border-top" id="sample_1">

                                <thead>

                                <tr>
                                    <th>کد تخفیف</th>
                                    <th>ارزش تخفیف</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>


                                <tbody>

                                <tr>
                                    <td class="hidden-phone">1910452859</td>
                                    <td class="hidden-phone">ابو علی</td>

                                    <td>
                                        <a href="Discount_Edit.php">
                                            <button class="btn btn-primary btn-xs">ویرایش</button>
                                        </a>
                                    </td>
                                </tr>

                                </tbody>

                            </table>
                        </div>


                    </section>

                </div>
                <?php
                include "footer.php";
                ?>

        </section>
    </section>
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