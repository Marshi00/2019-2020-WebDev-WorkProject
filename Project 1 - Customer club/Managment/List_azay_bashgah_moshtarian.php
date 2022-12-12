<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>اعضای باشگاه مشتریان</title>
    <link rel="stylesheet" href="Css/club.css">
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>لیست اعضای باشگاه مشتریان</h3></button>
        </div>
        <!--search box-->
<!--        <div class="inputsearch col-12">-->
<!--            <input type="search" class="isl55" id="A12" placeholder="جستجوی شناسه ی برنده">-->
<!--            <button id="AAA">-->
<!--                <i class="fas fa-search"></i>-->
<!--            </button>-->
<!--        </div>-->

        <div class="col-12 dtl35" align="center">
            <?php
            $user = $A->Query("SELECT * FROM user ");
            ?>
            <table id="table12" align="center" border="1">
                <tr class="clas12">
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>کد ملی</th>
                    <th>شماره تلفن</th>
                    <th>شناسه دعوت کننده</th>
                    <th>تاریخ ازدواج</th>
                    <th>محل سکونت</th>
                    <th>جنسیت</th>
                    <th>شماره ثابت</th>
                    <th>تاریخ تولد</th>
                    <th>میزان امتیاز</th>

                </tr>
                <?php
                $i = 1;
                while ($rowUsers = mysqli_fetch_assoc($user)) {
                    ?>
                    <tr class="clas12">
                        <td><?php echo $i ?></td>
                        <td><?php echo $rowUsers['Name'] ?></td>
                        <td><?php echo $rowUsers['LastName'] ?></td>
                        <td><?php echo $rowUsers['NationalCode'] ?></td>
                        <td><a target="_blank"
                               href="Edit_azay_bashgah_moshtarian.php?id=<?php echo $rowUsers['PhoneNumber'] ?>"
                               class="atag"> <?php echo $rowUsers['PhoneNumber'] ?></a></td>
                        <td><?php echo $rowUsers['InviterID'] ?></td>
                        <td><?php echo $rowUsers['DateOfMarriage'] ?></td>
                        <td><?php echo $rowUsers['Address'] ?></td>
                        <td><?php if ($rowUsers['Gender'] == 1) {
                                echo 'آقا';
                            } else echo 'خانم' ?></td>
                        <td><?php echo $rowUsers['FixedPhoneNumber'] ?></td>
                        <td><?php echo $rowUsers['DateOfBirth'] ?></td>
                        <td><?php
                            $id = $rowUsers['PhoneNumber'];

                            echo getPoint($id)+getOtherPoints($id) ?></td>

                    </tr>
                    <?php
                    $i++;
                }
                function getPoint($id)
                {
                    $A = new Active3();
                    $to = 0;
                    $select = $A->Query("SELECT * FROM factor WHERE UserID='$id'");
                    while ($fetch = mysqli_fetch_assoc($select)) {
                        $B = $fetch['EarnedCredit'];
                        $C = $fetch['UsedCredit'];
                        $to += $B - $C;
                    }
                    return $to;
                }
                function getOtherPoints($id)
                {
                    $A = new Active3();
                    $op=0;
                    $select2=$A->Query("SELECT * FROM otherpoints WHERE UserID='$id'");
                while ($fetch2 = mysqli_fetch_assoc($select2)) {
                    $E=$fetch2['Points'];
                    $op += $E ;
                }
                return $op;
                }

                ?>
            </table>
        </div>

    </div>
</div>

</body>

</html>