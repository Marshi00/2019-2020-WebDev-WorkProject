<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست جشنواره ها</title>
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>لیست جشنواره ها</h3></button>
        </div>

        <div class="col-10 dtl35">
            <?php
            $events = $A->Query("SELECT * FROM events");
            ?>
            <table id="table12" align="center" border="1">
                <thead>
                <tr class="clas12">
                    <th>ردیف</th>
                    <th>نام جشنواره خرید</th>
                    <th>ضریب</th>
                    <th>تاریخ شروع</th>
                    <th>تاریخ پایان</th>
                    <th>ویرایش</th>
                    <th>شروع</th>
                    <th>پایان</th>
                    <th>وضعیت</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while ($rowEvents = mysqli_fetch_assoc($events)) {
                    ?>
                    <tr class="clas12">
                        <td><?php echo $i ?></td>
                        <td><?php echo $rowEvents['EventName'] ?></td>
                        <td><?php echo $rowEvents['Multiplier'] ?></td>
                        <td><?php echo $rowEvents['StartDate'] ?></td>
                        <td><?php echo $rowEvents['ExpireDate'] ?></td>
                        <td><a target="_blank"
                               href="Edit_jashnvareh_kharid.php?id=<?php echo $rowEvents['ID'] ?>" class="atag">
                                ویرایش</a></td>
                        <td><a target="_blank"
                               href="sh.php?id=<?php echo $rowEvents['ID'] ?>" class="atag">
                                شروع جشواره</a></td>
                        <td><a target="_blank"
                               href="en.php?id=<?php echo $rowEvents['ID'] ?>" class="atag">
                                پایان جشواره</a></td>
                        <td><?php if ($rowEvents['Status']==1){
                                echo 'فعال';
                            }
                            else{
                                echo 'غیر فعال';
                            }?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>