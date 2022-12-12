<?php
include "loginCheckAdmin.php";
if ($A->SetEmpty('catId')) {
    $result=$A->RealString($_POST['catId']);
            $catId = $result;
            $select =$A->Query("SELECT * FROM companycontract WHERE CompanyID='$catId'");
                while ($rowCat = mysqli_fetch_assoc($select)){
                    $resulter[] = array(
                        'id'=>$rowCat['ID'],
                        'name'=>$rowCat['CompanyName'].'<---'.$rowCat['ID']
                    );
                }

                $call= array("error"=>false);
                $call['subCat']=$resulter;
                echo json_encode($call);

        }
