<?php
include "loginCheckUser.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>نام برندگان</title>
    <!--bootstarp-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery(bootstrap).js"></script>
    <script src="js/bootstrap.js"></script>

    <!--css-->
    <link rel="stylesheet" href="css/newcss.css">
</head>
<body class="winnerpage">
<div class="col-lg-7 col-md-7 col-xs-7 col-sm-7 dl244">
    <table id="table03" border="2" align="center">
        <?php
        $lotId=$_GET['id'];
        $Winners=$A->Query("SELECT * FROM winnerstable,user WHERE LotteryId='$lotId' AND user.PhoneNumber=winnerstable.WinnerId");
        ?>
        <thead class="thw">
           <tr class="clas1">
                <th>ردیف</th>
                <th>نام برندگان</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        while ($rowWinners = mysqli_fetch_assoc($Winners)){
            ?>
            <tr class="clas1">
                <td><?php echo $i?></td>
                <td><?php echo $rowWinners['Name'].' '.$rowWinners['LastName']?></td>
            </tr>
            <?php
            $i++;
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>