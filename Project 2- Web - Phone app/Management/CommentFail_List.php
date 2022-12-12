<?php
include "0-2loginCheckAdmin2.php";
$user_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>لیست کامنت های تائید نشده</title>

    <?php
    include "link.php";
    ?>
    <!--alert-->
    <link href="css/notiflix-1.8.0.css" rel="stylesheet"/>
    <script src="js/notiflix-1.8.0.js"></script>


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
                            لیست کامنت های تائید نشده

                        </header>
                        <div>
                            <table class="table table-striped border-top" id="sample_1" align="center">

                                <thead>
                                <?php
                                $need = $A->Query("SELECT *,comments.id as cid,comments.Status as cst FROM comments,workers,user WHERE comments.workerId=workers.id AND comments.userId=user.id AND comments.Status='1' ");
                                ?>
                                <tr>
                                    <th>ردیف</th>
                                    <th>شناسه متخصص</th>
                                    <th>شناسه سفارش</th>
                                    <th>شناسه مشتری</th>
                                    <th>نظر</th>
                                    <th>نمایش کامل متن نظر</th>
                                    <th>وضعیت</th>
                                    <th>ویرایش</th>
                                    <th>برای تایید کلیک کنید</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                while ($rowNeed = mysqli_fetch_assoc($need)){
                                    ?>
                                    <tr>
                                        <td class="hidden-phone"><?php echo $i?></td>
                                        <td class="hidden-phone"><?php echo $rowNeed['nationalCode']?></td>
                                        <td class="hidden-phone"><?php echo $rowNeed['orderListId']?></td>
                                        <td class="hidden-phone"><?php echo $rowNeed['PhoneNumber']?></td>
                                        <td class="hidden-phone"><?php echo $rowNeed['Comment']?></td>
                                        <td>
                                            <a>
                                                <button class="btn btn-primary btn-xs btn1" onclick="show_up('<?php echo $rowNeed['Comment'] ?>')">نمایش</button>
                                            </a>
                                        </td>
                                        <td>
                                            <?php if ($rowNeed['cst'] == 1) {
                                                echo 'در انتظار';
                                            } elseif ($rowNeed['cst'] == 0){
                                                echo 'تایید نشده';
                                            }
                                            elseif ($rowNeed['cst'] == 2){
                                                echo 'تایید شده';
                                            }?>
                                        </td>
                                        <td>
                                            <a href="Comment_Edit.php?id=<?php echo $rowNeed['cid'] ?>" target="_blank" >
                                                <button class="btn btn-primary btn-xs">ویرایش</button>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-xs btncolor" id="A1" value="<?php echo $rowNeed['cid'] ?>" onclick="colorchaange()">
                                                تائید
                                            </button>
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
<script>
    // opening message
    function show_up(value){
        $('.modal1').css('display', 'flex');
        $('.submodal1 p').html(value);
    }
    $('.btn1').click(function () {
    });
    $('.cb').click(function () {
        $('.modal1').css('display', 'none');
    });
    // closing message
    $('body').click(function (evt) {
        if (evt.target.className == "modal1")
            $('.modal1').css('display', 'none');
        return;
        if ($(evt.target).closest('.modal').length)
            return;
    });
</script>
<script>
    Notiflix.Notify.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        timeout: 1500,
    });
</script>

<script>
    Notiflix.Confirm.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        cancelButtonBackground: "#ef2828",
    });
</script>

<script>
    function colorchaange() {
        var id = document.getElementById('A1').value;
        var user_id = <?php echo $user_id ?>;
        Notiflix.Confirm.Show('تایید پیام', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "13-3allowComment.php",
                    data: {
                        id: id,
                        user_id: user_id,
                    },
                    dataType: "json",
                    type: "POST",
                    success: function (jsonData) {
                        if (jsonData['error']) {
                            Notiflix.Notify.Failure(jsonData['MSG']);

                        } else {
                            Notiflix.Notify.Success(jsonData['MSG']);
                        }
                    }
                });
            },
            function () { // No button callback
                return;
            });
    }


</script>
<script type="text/javascript" src="assets/advanced-datatable.media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-table/DT_bootstrap.js"></script>


<!--script for this page only-->
<script src="js/dynamic-table.js"></script>
</body>
</html>