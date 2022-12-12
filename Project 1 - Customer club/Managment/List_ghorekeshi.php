<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست قرعه کشی ها</title>
    <link rel="stylesheet" href="Css/events.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <?php
    include "link.php"
    ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php
    include "nav.php";
    ?>
    <div class="content-wrapper">

        <div class="col-12">
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>لیست قرعه کشی ها : برای ویرایش هر قرعه کشی
                    در همان ردیف روی گزینه ی ویرایش کلیک کنید</h3></button>
        </div>

        <div class="col-12 dtl35">
            <?php
            $lottery = $A->Query("SELECT * FROM lottery ");
            ?>
            <table id="table12" align="center" border="1">
                <tr class="clas12">
                    <th>ردیف</th>
                    <th>نام قرعه کشی</th>
                    <th>حداقل امتیاز</th>
                    <th>تاریخ</th>
                    <th>ساعت</th>
                    <th>جایزه</th>
                    <th>تعداد برندگان</th>
                    <th>ویرایش</th>
                </tr>
                <?php
                $i = 1;
                while ($rowLottery = mysqli_fetch_assoc($lottery)) {
                    ?>
                    <tr class="clas12">
                        <td><?php echo $i ?></td>
                        <td><?php echo $rowLottery['Name'] ?></td>
                        <td><?php echo $rowLottery['MinPoints'] ?></td>
                        <td><?php echo $rowLottery['Date'] ?></td>
                        <td><?php echo $rowLottery['Time'] ?></td>
                        <td><?php echo $rowLottery['Prize'] ?></td>
                        <td><?php echo $rowLottery['NumberOfWinners'] ?></td>
                        <td><a target="_blank" href="Edit_ghorekeshi.php?id=<?php echo $rowLottery['ID'] ?>"
                               class="atag"> ویرایش</a></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>

        </div>

    </div>
</div>
</body>
</html>