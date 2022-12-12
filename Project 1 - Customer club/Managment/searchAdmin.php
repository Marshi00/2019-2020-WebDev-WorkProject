<?php

$name ="";
$html ='';
$select="SELECT * admin WHERE  LIKE '%$name%'";
while ($row=mysqli_fetch_assoc($select)){
    $html.="<tr class=\"clas1 \" data-href='Edit_admin.php'>
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
}
$call = array("error"=>false);
$call['html']=$html;
echo json_encode($call);