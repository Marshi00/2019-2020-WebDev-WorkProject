<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
</head>
<body>
<?php
include "Active3.php";
$A = new Active3();
$name ="";
$html ='';
$search=$A->Query("SELECT * FROM admin WHERE  LIKE '%$name%'");
while ($row=mysqli_fetch_assoc($search)){
    ?>
    $html.="<tr>

                <td ><?php echo $i?></td>
                <td><?php echo $row['Name']?></td>
                <td><?php echo $row['LastName']?></td>
                <td><?php echo $row['Email']?></td>
                <td><?php echo $row['PhoneNumber']?></td>
                <td><?php echo $row['ID(national code)']?></td>
                <td><?php echo $row['Level']?></td>
                <td><?php echo $row['Branch']?></td>
                <td><?php echo $row['Status']?></td>
                <td><?php echo $row['Date']?></td>
                <td ><?php echo $row['Time']?></td>
            </tr>";

    <?php
    $i++;
}

$call = array("error"=>false);
$call['html']=$html;
echo json_encode($call);
?>
</body>
</html>