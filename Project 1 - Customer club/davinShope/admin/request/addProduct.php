<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['subCat']) && $_POST['subCat'] != '' &&
        isset($_POST['brand']) && $_POST['brand'] != ''&&
    isset($_POST['productName']) && $_POST['productName'] != '' &&
        isset($_POST['productPrice']) && $_POST['productPrice'] != '' &&
        isset($_POST['description']) && $_POST['description'] != '' &&
        isset($_POST['offer']) && $_POST['offer'] != ''&&
        isset($_POST['guarantee']) && $_POST['guarantee'] != '' &&
        isset($_POST['guarantee']) && $_POST['guarantee'] != ''

    ) {
        $result = $db::RealString($_POST);
        $sub = $result['subCat'];
        $brand = $result['brand'];
        $productName = $result['productName'];
        $productPrice = $result['productPrice'];
        $description = $result['description'];
        $offer = $result['offer'];
        $guarantee = $result['guarantee'];
        $productCode = $result['productCode'];

        $s = $db::Query("SELECT  * FROM product where productName='$productName'", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "محصول تکراری است");
            echo json_encode($call);
            return;
        }
        $id = $db::GenerateId();
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $productq = $db::Query("INSERT INTO product
  (productId, productPrice, productName, productRegDate, productRegTime, productAdminId, productSubCatid, Description, offer,productBrandId,guarantee,productCode) 
      VALUES ('$id','$productPrice','$productName','$date','$time','$idAdmin','$sub','$description','$offer','$brand','$guarantee','$productCode')");
        $call = array("error" => false, "RT" => $id);
        echo json_encode($call);
        return ;
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
