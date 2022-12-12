<?php
include "0-3loginCheckAdmin3.php";
$target=$A->Query("SELECT * FROM category");
$target2=$A->Query("SELECT * FROM subcategory");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست جواب ها</title>

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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <section class="panel sectiontable">
                        <header class="panel-heading">
                            لیست جواب ها
                        </header>

                        <div class="panel-body">
                            <div class="form-group container-fluid">
                                <label for="service">خدمت را انتخاب کنید</label>
                                <br>
                                <select id="service" onchange="getSubCat()">
                                    <option selected disabled value="">خدمت</option>
                                    <?php
                                    while ($rows = mysqli_fetch_assoc($target)) {
                                        ?>
                                        <option value="<?php echo $rows['id'] ?>"><?php echo $rows['category'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group container-fluid">
                                <label for="subService">نوع خدمت را انتخاب کنید</label>
                                <br>
                                <select id="subService" onchange="getSubCat2()">
                                    <option selected disabled value="">نوع خدمت</option>
                                </select>
                            </div>

                            <div class="form-group container-fluid">
                                <label for="question">سوال را انتخاب کنید</label>
                                <br>
                                <select id="question" onchange="getSubCat3()">
                                    <option value="" selected disabled>انتخاب سوال</option>
                                </select>
                            </div>
                        </div>
                        <script>
                            function getSubCat() {
                                var service = $("#service").val();
                                $.ajax({
                                    url:"tommyQuesAdd.php",
                                    data: {
                                        catId:service
                                    },
                                    dataType:'json',
                                    type:'POST',
                                    success:function (data) {
                                        if(!data['error']){
                                            $("#subService").html(" <option value='' selected disabled >نوع خدمت را انتخاب کنید</option>");
                                            for (var i=0;i<data['subCat'].length;i++){
                                                $("#subService").append('<option value="'+data['subCat'][i]['id']+'">'+data['subCat'][i]['name']+'</option>');
                                            }
                                        }
                                    }
                                });
                            }
                        </script>
                        <script>
                            function getSubCat2() {
                                var subService = $("#subService").val();
                                $.ajax({
                                    url:"tommyAnsAdd.php",
                                    data: {
                                        catId:subService
                                    },
                                    dataType:'json',
                                    type:'POST',
                                    success:function (data) {
                                        if(!data['error']){
                                            $("#question").html(" <option value='' selected disabled >سوال را انتخاب کنید</option>");
                                            for (var i=0;i<data['subCat'].length;i++){
                                                $("#question").append('<option value="'+data['subCat'][i]['id']+'">'+data['subCat'][i]['name']+'</option>');
                                            }
                                        }
                                    }
                                });
                            }
                        </script>
                        <script>
                            function getSubCat3() {
                                var question = $("#question").val();
                                $.ajax({
                                    url:"tommyAnsList.php",
                                    data: {
                                        catId:question
                                    },
                                    dataType:'json',
                                    type:'POST',
                                    success:function (data) {
                                        if(!data['error']){
                                            console.log('data: ',data);
                                            $("#table").html('<br/>');
                                            for (var i=0;i<data['subCat'].length;i++){
                                                $("#table").append('<tr> <td>'+data['subCat'][i]['i']+'</td><td>'+data['subCat'][i]['name']+'</td><td><a href="Answer_Edit.php?id='+data['subCat'][i]['id']+'" target="_blank"><button class="btn btn-primary btn-xs">ویرایش</button></a></td></tr>');
                                            }
                                        }
                                    }
                                });
                            }
                        </script>
                        <div class="dl53">
                            <table class="table table-striped border-top" id="sample_1" align="center">

                                <thead>

                                <tr>
                                    <th>ردیف</th>
                                    <th>پاسخ</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>

                                <tbody id="table">

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </section>

                </div>
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