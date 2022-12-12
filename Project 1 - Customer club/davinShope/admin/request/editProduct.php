<?php
include "../class/dataBase.php";
$db=new dataBase();
session_start();
if(isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']=true) {
    if (
        isset($_POST['subCat']) && $_POST['subCat'] != '' &&
        isset($_POST['brand']) && $_POST['brand'] != '' &&
        isset($_POST['productName']) && $_POST['productName'] != '' &&
        isset($_POST['productPrice']) && $_POST['productPrice'] != ''  &&
        isset($_POST['description']) && $_POST['description'] != '' &&
        isset($_POST['offer']) && $_POST['offer'] != ''&&
        isset($_POST['guarantee']) && $_POST['guarantee'] != '' &&
        isset($_POST['productCode']) && $_POST['productCode'] != ''

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
        $id = $result['id'];


        $s = $db::Query("SELECT  * FROM product where productName='$productName' ", $db::$NUM_ROW);
        if ($s == 1) {
            $call = array("error" => true, "MSG" => "محصول تکراری است");
            echo json_encode($call);
            return;
        }
        $time = $db::GetTime();
        $date = $db::GetDate();
        $idAdmin = $_SESSION['adminId'];
        $product = $db::Query("update product set productSubCatid='$sub',productName='$productName',productPrice='$productPrice',productAdminId='$idAdmin',Description='$description',offer='$offer',productBrandId='$brand',guarantee='$guarantee',productCode='$productCode' where productId='$id'");

        if($product){
            $call =array("error" => false);
            echo json_encode($call);
            return;
        }
    } else {
        $call = array("error" => true, "MSG" => "تمامی فیلد ها پر شود");
        echo json_encode($call);
        return;
    }
}
