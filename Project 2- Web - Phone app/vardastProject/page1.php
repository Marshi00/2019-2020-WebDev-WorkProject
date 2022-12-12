<?php
include "varWebSite.php";
$A = new varWebSite();
session_start();
$subId = $_GET['id'];
$getSub=$A->Query("SELECT * FROM subcategory WHERE id='$subId'");
$getSubFetch=$A->FetchAssoc($getSub);
$orderId = $A->generate_id();
?>
<!DOCTYPE html>
<html lang="en" dir="rtl" >
<head>
    <title>صفحه ثبت خدمت</title>
    <meta charset="UTF-8">
    <link href="CSS/MYstyle.css" rel="stylesheet">
    <link href="CSS/bootstrap.css" rel="stylesheet">
    <link href="CSS/all.css" rel="stylesheet">
    <link href="CSS/cssModal.css" rel="stylesheet">
    <link href="CSS/modalVardast.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
    <link href="CSS/notiflix-1.8.0.css" rel="stylesheet"/>
    <script src="JS/notiflix-1.8.0.js"></script>
    <script src="JS/jquery.js"></script>
    <script src="JS/bootstrap.js"></script>
    <script src="JS/map.js"></script>
    <script src="JS/migrate.js"></script>
<!--    <script src="JS/ajax.js"></script>-->
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
    <!------------------------------>
    <!-- import the Jalali Date Class script -->
    <script type="text/javascript" src="JS/jalali.js"></script>
    <!-- import the calendar script -->
    <script type="text/javascript" src="JS/calendar.js"></script>
    <!-- import the calendar script -->
    <script type="text/javascript" src="JS/calendar-setup.js"></script>
    <!-- import the language module -->
    <script type="text/javascript" src="JS/lang/calendar-fa.js"></script>
    <!-------------------------------------------->
</head>
<body>
<!------------------------header------------------------>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 10px 0">
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 IRANSans div-vorood">
        <a><img src="IMG/vorood.svg " class="img-green-vorood">
            <span class="text-vorood">ورود</span>
        </a>
        <a>
            <img src="IMG/mobile-icon.svg" class="icon-mobile">
        </a>
    </div>
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="margin-top: 20px">
        <!----------------->
        <form autocomplete="off"  style="position: relative;">
            <div class="autocomplete" style="width:370px;color: black">
                <input id="myInput" type="text" class="searchibbb navsearch" name="" placeholder="جستجو بین خدمات">
                <a><img class="search-icon" src="IMG/search-icon22.png"></a>
                <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" id="searchResult" style="background-color: white;display: none;position: absolute;">

                </div>
            </div>
            <!--<input type="submit">-->
        </form>
        <!----------------->
    </div>
    <script>
        $("#myInput").on("keydown keyup copy delete paste",function () {
            var search = $("#myInput").val();
            $("#searchResult").html('');

            $.ajax({
                url: "search.php",
                data:{
                    search:search
                },
                dataType:"json",
                type:"POST",
                success : function (data) {
                    if(data['subCat'].length > 0){
                        $("#searchResult").show('fast');


                        for (var i=0;i<data['subCat'].length;i++){
                            $("#searchResult").append('<a class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding: 10px 0;border-bottom:1px solid #e4e4e4" href="page1.php?id='+data['subCat'][i]['id']+'">' +
                                '<img src="../Management/upload/'+data['subCat'][i]['subCatImg']+'.jpg" style="width: 50px"> ' +
                                ''+data['subCat'][i]['subcategory']+'</a>');
                        }
                    }else{
                        $("#searchResult").hide('fast');

                    }
                }
            });

        });

    </script>
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 div-logo">
        <a href="index.php">
            <img src="IMG/vorood.svg" class="back-logo">
            <img src="IMG/logo-white.svg" class="logo-white">
        </a>
    </div>
</div>
<!-------------------------mega menu-------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
    <nav class="nav-bar">
        <ul>
            <li>mega1
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega2
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega3
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega4
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega5
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega6
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega7
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega8
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega9
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
            <li>mega10
                <div class="mega-menu">
                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>


                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>

                    <div class="inner-mega-menu">
                        <a><p>mga1</p></a>
                        <a><p>mga2</p></a>
                        <a><p>mga3</p></a>
                        <a><p>mga4</p></a>
                        <a><p>mga5</p></a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</div>
<!-------------------------mega menu-------------------->
<!-----------------------لیست قیمت--------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 listStyle" style="position: relative">
    <h4 class="SansBold h4-khadamat"><?php echo $getSubFetch['subcategory']?></h4>
  <br>
    <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6" style="padding:0 10px">
    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 " style=";background-color: white">
   <p class="SansBold list-gheymat">لیست قیمت <?php echo $getSubFetch['subcategory']?></p>
   <br>

   <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans" style="padding:14px 0">
       <?php
       $subCatCosts=$A->Query("SELECT * FROM subcategorycosts WHERE subcategoryId='$subId' AND status='1'");
       while ($rowsubCatCosts = mysqli_fetch_assoc($subCatCosts)) {
           ?>
        <p style="font-size:15px">قیمت <?php echo $rowsubCatCosts['description'] ?> ---------------------- <?php echo $rowsubCatCosts['cost'] ?> هزار تومان</p>
       <br>
       <?php
       }
       ?>
   <br><br>
       <p style="font-size:18px">حداقل هزینه اجرا: حداقل هزینه اجرای این خدمت، <?php echo $getSubFetch['minimumCost'] ?> هزار تومان است.</p>
   </div>
    </div>
  </div>

    <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 khadamat-card-p1" style="padding-top: 0;">
 <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="overflow: hidden;padding-bottom: 40px">

  <div class="IRANSans" style="overflow: hidden">
      <img src="../Management/upload/<?php echo $getSubFetch['subCatImg']?>.jpg" style="width: 100%;">
      <br><br>
      <p class="SansBold" style="font-size: 17px;direction: rtl;text-align: right;padding-right: 20px"> خدمات قابل ارائه در سرویس <?php echo $getSubFetch['subcategory']?> :</p>

      <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 10px 25px;direction: rtl;text-align: right;font-size: 16px;line-height: 30px">
          <?php
          $subcatServics=$A->Query("SELECT * FROM subcategoryservices WHERE subcategoryId='$subId' AND status='1'");
          while ($rowsubcatServics = mysqli_fetch_assoc($subcatServics)) {
              ?>
              <p><?php echo $rowsubcatServics['text'] ?></p>
              <?php
          }
          ?>
      </div>
      <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 col-xs-offset-4 col-sm-offset-4 col-lg-offset-4 col-md-offset-4 BtnSabtSefaresh IRANSans" data-toggle="modal" data-target="#modalN1" ><p style="margin-top: 10px">ثبت سفارش</p></div>
  </div>
  </div>
 </div>
</div>
<!-- Modal -->
<!----N1--------------------------------------------------->
<div id="modalN1" class="modal fade IRANSans divScroll" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header hdrBorder">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="SansBold" style="margin-right: 2rem">
                    <?php echo $getSubFetch['subcategory']?>
                </h4>
            </div>
            <div class="modal-body paddBody">
                <div class="modal-body IRANSans">
                    <h4 class="styleH4"> خدمت درخواستی :</h4>
                    <br><br>
                    <?php
                    $getCHECKBOXQues=$A->Query("SELECT * FROM subcategoryquestions WHERE subcategoryId='$subId' AND type='1'");
                    while ($getCHECKBOXQuesFetch = mysqli_fetch_assoc($getCHECKBOXQues)) {
                    ?>

                    <label class="container">
                        <input type="checkbox"  id="<?php echo $getCHECKBOXQuesFetch['id'] ?>" onchange="checked1('<?php $getCHECKBOXQuesFetch['id'] ?>')" />
                        <span class="checkmark"></span>
                        <p  class="txt-MN1"><?php echo $getCHECKBOXQuesFetch['Question'] ?></p>
                    </label>
                    <br />
                        <?php
                    }
                    ?>
                </div>

            </div>
            <script>
                var chechedQ='';
                function checked1(id) {
                    var checkbox = $("#"+id);
                    if(checkbox.attr("checked")=='checked'){
                        chechedQ+=id+"/";
                    }else{

                    }
                }
            </script>
            <div class="modal-footer">
                <button class="IRANSans edameBtn1" onclick="insertingValues()" style="float: left">ادامه<i class="fas fa-chevron-left CLicon"></i>
                </button>
            </div>
        </div>
    </div>
    <script>
        var orderId=<?php echo $orderId?>;
        function insertingValues() {
            Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                'بله', 'خیر',
                function () {// Yes button callback
                    $.ajax({
                        url: "ValuesCheckbox.php",
                        data: {
                            vals: chechedQ,
                            orderId:orderId
                        },
                        dataType: "json",
                        type: "POST",
                        success: function (jsonData) {
                            if (jsonData['error']) {
                                Notiflix.Notify.Failure(jsonData['MSG']);

                            } else {
                                $('#modalN1').modal('hide');
                                $('#modalN2').modal('show');
                            }
                        }
                    });
                },
                function () { // No button callback
                    return;
                }
            );


        }

    </script>
</div>
<!----N2--------------------------------------------------->
<div id="modalN2" class="modal fade divScroll" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="SansBold" style="margin-right: 2rem">
                    <?php echo $getSubFetch['subcategory']?>
                </h4>
            </div>
            <div class="modal-body paddBody">
                <div class="modal-body IRANSans">
                    <?php
                    $getOPTIONQues=$A->Query("SELECT * FROM subcategoryquestions WHERE subcategoryId='$subId' AND type='0'");
                    while ($getOPTIONQuesFetch = mysqli_fetch_assoc($getOPTIONQues)) {
                        $ansNeededId=$getOPTIONQuesFetch['id'];
                        ?>
                        <h4 class="styleH4"> <?php echo $getOPTIONQuesFetch['Question'] ?> :</h4>
                        <br><br>
                        <?php
                        $getOPTIONAns=$A->Query("SELECT * FROM subcategoryquestionsvalue WHERE subcategoryQuestionsId='$ansNeededId'");
                        while ($getOPTIONAnsFetch = mysqli_fetch_assoc($getOPTIONAns)) {
                            ?>

                            <label class="radioContainer">
                                <input type="radio" name="<?php echo $getOPTIONAnsFetch['id'] ?>">
                                <span class="circleST"></span>
                                <p class="pRadio"><?php echo $getOPTIONAnsFetch['value'] ?></p>
                            </label>
                            <br>
                            <br>
                            <?php
                        }
                    }
                   ?>


                </div>

            </div>
            <div class="modal-footer">
                <button class="IRANSans edameBtn1" data-dismiss="modal" data-toggle="modal" data-target="#modalN3" style="float: left">ادامه<i  class="fas fa-chevron-left CLicon"></i></button>
                <button class="IRANSans edameBtn1" style="float: right"  data-dismiss="modal" data-toggle="modal" data-target="#modalN1"><i  class="fas fa-chevron-right CRicon"></i>برگشت</button>
            </div>
        </div>
    </div>

</div>
<!--tozihat takmili---N3-------------------------------------------------->
<div id="modalN3" class="modal fade divScroll" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="SansBold" style="margin-right: 2rem">
                    <?php echo $getSubFetch['subcategory']?>
                </h4>
            </div>
            <div class="modal-body">
                <div class=" " id="closemodal2">
                    <div  class="modal-body modal-body2">
                        <h4 class="SansBold">توضیحات تکمیلی</h4>
                        <br />
                        <textarea id="textDetails"  class="tozihat"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button  class="IRANSans edameBtn1"  style="float: left" data-dismiss="modal" data-toggle="modal" data-target="#modalN4" onclick="detailsSend()" >ادامه<i class="fas fa-chevron-left CLicon"></i></button>
                <button class="IRANSans edameBtn1" style="float: right"  data-dismiss="modal" data-toggle="modal" data-target="#modalN2"><i  class="fas fa-chevron-right CRicon"></i>برگشت</button>
            </div>
        </div>
    </div>
    <?php
if (isset($_SESSION['login'])){
    $user_id = $_SESSION['id'];
}
else{
    $user_id = '';}
?>
    <script>
        function detailsSend() {
            var textDetails = $('#textDetails').val();
            var user_id=<?php echo $user_id?>;
            var subcategoryId=<?php echo $subId?>;
            Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                'بله', 'خیر',
                function () {// Yes button callback
                    $.ajax({
                        url: "25-1subDetailsOrderList.php",
                        data: {
                            details: textDetails,
                            subcategoryId: subcategoryId,
                            user_id: user_id,
                            orderId: orderId,
                        },
                        dataType: "json",
                        type: "POST",
                        success: function (jsonData) {
                            if (jsonData['error']) {
                                Notiflix.Notify.Failure(jsonData['MSG']);

                            } else {
                                $('#modalN3').modal('hide');
                                $('#modalN4').modal('show');


                            }
                        }
                    });
                },
                function () { // No button callback
                    return;
                }
            );


        }

    </script>
</div>
<!---saat & taghvim---N4------------------------------------------------->
<div id="modalN4" class="modal fade divScroll IRANSans" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="SansBold" style="margin-right: 2rem">
                    <?php echo $getSubFetch['subcategory']?>
                </h4>
            </div>
            <div class="modal-body">
                <h4 class="SansBold" style="margin-right: 2rem;">
                    زمان و تاریخ سفارش
                </h4>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <!----------saat----------------------->
                <div class="saat col-xs-5 col-sm-5 col-lg-5 col-md-5">
                        <div class="time-picker mytime" data-time="00:00" >
                            <div class="minute">
                                <div class="min-up"></div>
                                <input type="number" class="min" value="00">
                                <div class="min-down"></div>
                            </div>
                            <div class="separator">:</div>
                            <div class="hour">
                                <div class="hr-up"></div>
                                <input type="number" class="hr" value="00">
                                <div class="hr-down"></div>
                            </div>
                        </div>
                    <br><br> <br><br> <br><br> <br><br>
                    <span id="display_area_1"  class="display_area myspan">تاریخ مورد نظرتان را وارد کنید</span>

                </div>
                    <!----------taghvim----------------------->
                <div class="parent-calendar col-xs-7 col-sm-7 col-lg-7 col-md-7 ">
                    <div class="example">
                        <br/>
                        <form method="get" action="#">
                            <input id="date_input_7" type="hidden" name="date" />
                        </form>
                        <div id="flat_calendar_1"></div>
                        <br><br>
                    </div>
                </div>
                    <!---------------------------------------->
                </div>
                </div>
                <div class="modal-footer">
                    <button  class="IRANSans edameBtn1"  style="float: left"  data-dismiss="modal" data-toggle="modal" data-target="#modalN7">ادامه<i class="fas fa-chevron-left CLicon"></i></button>
                    <button class="IRANSans edameBtn1" style="float: right"  data-dismiss="modal" data-toggle="modal" data-target="#modalN3"><i  class="fas fa-chevron-right CRicon"></i>برگشت</button>
                </div>
            </div>
        </div>
    </div>
<!---- mapp --N5------------------------------------------------->
<div id="modalN5" class="modal fade divScroll IRANSans" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="SansBold" style="margin-right: 2rem">
                    <?php echo $getSubFetch['subcategory']?>
                </h4>
            </div>
            <div class="modal-body" style="direction: ltr;padding-bottom: 60px;">

                <div class="first-div">
                    <?php
                    $getAddress=$A->Query("SELECT * FROM adress WHERE userId='$user_id'");
                    while ($rowgetAddress = mysqli_fetch_assoc($getAddress)){
                    ?>
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 parent-adress">
                        <div class="col-md-9 col-xs-12 col-sm-12 col-lg-9 myadress" >
                            <p><?php echo $rowgetAddress['tag']?></p>
                            <p class="myadress2"><?php echo $rowgetAddress['Address']?></p>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12 col-lg-3">
                            <img src="IMG/GoogleMapTA%20(1).jpg" class="map-pic">
                        </div>
                    </div>
                        <?php
                    }
                    ?>

                </div>
                <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="text-align: center;direction: rtl">
                    <div class="col-md-8 col-xs-8 col-lg-8 col-sm-8" style="padding: 0 5px;">
                        <input id="Address" value="" type="text" class="input-address" placeholder="آدرس خود را وارد کنید">
                    </div>
                    <div class="col-md-4 col-xs-4 col-lg-4 col-sm-4" style="padding: 0 5px;">
                        <input id="tag" value="" type="text" class="input-address" placeholder="نام آدرس ">
                    </div>
                </div>
                <div style="margin-bottom: 2rem;;text-align: center">
                    <button class="IRANSans btn-afzoodan" onclick="addAddress()">
                        <i style="font-size: 13px;margin: 0 1rem;" class="fas fa-plus" ></i>افزودن آدرس</button>
                </div>
               <!------map------------->
                <div class="parent-map">
                    <div id="mapid" class="col-md-12"></div>
                    <form  class="col-md-12 col-xs-12 col-lg-12 col-sm-12" method="post" action="insert.php" enctype="multipart/form-data"style="direction: rtl;float:right;">
                        <input type="text" id="lat" value="" name="lat" style="    display: none;">
                        <input type="text" id="lng" value="" name="lng" style="    display: none;">
                        <!--:آپلود <input type="file" name="uploader">-->
                    </form>
                    <div class="btn-sabt-mogheiiyat">
                        <button class="IRANSans btn-afzoodan" style="padding: 10px 35px;">ثبت موقعیت</button>
                    </div>
                </div>
                <!------map------------->
                <script>
                    var user_id=<?php echo $user_id?>;
                    function addAddress() {
                        var tag = $('#tag').val();
                        var Address = $('#Address').val();
                        var lat = $('#lat').val();
                        var lng = $('#lng').val();
                        if (tag == '') {
                            document.getElementById('tag').style.border = '2px solid red';
                            let inputTimeOut = setTimeout(function () {
                                document.getElementById('tag').style.borderColor = '#ced4da';
                                document.getElementById('tag').style.borderWidth = '1px';
                                clearTimeout(
                                    inputTimeOut
                                );
                            }, 1500);
                            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                            return;
                        }
                        if (Address == '') {
                            document.getElementById('Address').style.border = '2px solid red';
                            let inputTimeOut = setTimeout(function () {
                                document.getElementById('Address').style.borderColor = '#ced4da';
                                document.getElementById('Address').style.borderWidth = '1px';
                                clearTimeout(
                                    inputTimeOut
                                );
                            }, 1500);
                            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                            return;
                        }
                        if (lat == '') {
                            document.getElementById('lat').style.border = '2px solid red';
                            let inputTimeOut = setTimeout(function () {
                                document.getElementById('lat').style.borderColor = '#ced4da';
                                document.getElementById('lat').style.borderWidth = '1px';
                                clearTimeout(
                                    inputTimeOut
                                );
                            }, 1500);
                            Notiflix.Notify.Failure('لطفا موقعیت مکانی بر روی نقشه راانتخاب کنید');
                            return;
                        }
                        if (lng == '') {
                            document.getElementById('lng').style.border = '2px solid red';
                            let inputTimeOut = setTimeout(function () {
                                document.getElementById('lng').style.borderColor = '#ced4da';
                                document.getElementById('lng').style.borderWidth = '1px';
                                clearTimeout(
                                    inputTimeOut
                                );
                            }, 1500);
                            Notiflix.Notify.Failure('لطفا موقعیت مکانی بر روی نقشه راانتخاب کنید');
                            return;
                        }

                        Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                            'بله', 'خیر',
                            function () {// Yes button callback
                                $.ajax({
                                    url: "10-1subAdress.php",
                                    data: {
                                        tag: tag,
                                        Address: Address,
                                        userId: user_id,
                                        longitude: lng,
                                        latitude: lat,
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
                            }
                        );


                    }

                </script>
            </div>
            <div class="modal-footer">
                <button  class="IRANSans edameBtn1"  style="float: left" onclick="addressToOrder()" >ادامه<i class="fas fa-chevron-left CLicon"></i></button>
                <button class="IRANSans edameBtn1" style="float: right"  data-dismiss="modal" data-toggle="modal" data-target="#modalN4"><i  class="fas fa-chevron-right CRicon"></i>برگشت</button>
            </div>
            <script>
                function addressToOrder() {
                    var Address = $('#Address').val();
                    if (Address == '') {
                        document.getElementById('Address').style.border = '2px solid red';
                        let inputTimeOut = setTimeout(function () {
                            document.getElementById('Address').style.borderColor = '#ced4da';
                            document.getElementById('Address').style.borderWidth = '1px';
                            clearTimeout(
                                inputTimeOut
                            );
                        }, 1500);
                        Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
                        return;
                    }

                    Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                        'بله', 'خیر',
                        function () {// Yes button callback
                            $.ajax({
                                url: "25-2subAddressOrderList.php",
                                data: {
                                    addressId: Address,
                                    orderId: orderId,
                                    user_id: user_id,
                                },
                                dataType: "json",
                                type: "POST",
                                success: function (jsonData) {
                                    if (jsonData['error']) {
                                        Notiflix.Notify.Failure(jsonData['MSG']);

                                    } else {
                                        Notiflix.Notify.Success(jsonData['MSG']);
                                        $('#modalN5').modal('hide');
                                        $('#modalN6').modal('show');

                                    }
                                }
                            });
                        },
                        function () { // No button callback
                            return;
                        }
                    );


                }

            </script>
        </div>
    </div>
</div>
<!------N6------------------------------------------------->
<?php
$getOrderInformation=$A->Query("SELECT * FROM orderlist,adress WHERE orderlist.id='$orderId' AND orderlist.addressId=adress.id");
$getOrderInformationFetch=mysqli_fetch_assoc($getOrderInformation);
?>
<div id="modalN6" class="modal fade divScroll" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="SansBold" style="margin-right: 2rem">
                    <?php echo $getSubFetch['subcategory']?>
                </h4>
            </div>
            <div class="modal-body IRANSans" style="padding: 38px 20px; ">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-8 col-xs-12 col-sm-12 col-lg-8" style="float: right;text-align: center;color: red;font-weight: bold">
                        <h4>کد تخفیف مورد تایید نیست</h4>
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 code-input">
                            <div class="col-md-4 col-xs-12 col-lg-4 col-sm-12 btn btnET">
                                <span >اعمال تخفیف</span>
                            </div>
                            <div class="col-md-8 col-xs-12 col-sm-12 col-lg-8 ">
                                <input class="takhfif-p" style="border: none" type="text" placeholder="کد تخفیف خود را وارد کنید">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-9 col-xs-12 col-lg-9 col-sm-9" style="float: right;margin-top:1rem">
                        <h4 class="SansBold">جزییات سفارش</h4>
                        <hr>
                        <!--1-->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="font-size: 14px;margin:0">
                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                <p><?php echo $getSubFetch['subcategory']?></p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                <p>خدمت مورد نظر</p>
                            </div>
                        </div>
                        <!--2-->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="font-size: 14px;margin: 1rem 0">
                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                <p><?php echo $getOrderInformationFetch['neededTime']?></p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                <p>زمان انجام کار</p>
                            </div>
                        </div>
                        <!--3-->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="font-size: 14px;margin: 1rem 0">
                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                <p><?php echo $getOrderInformationFetch['neededDate']?></p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                <p>تاریخ انجام کار</p>
                            </div>
                        </div>
                        <!--4-->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="font-size: 14px;margin: 1rem 0">
                            <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                <p><?php echo $getOrderInformationFetch['Address']?></p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                <p>محل انجام کار</p>
                            </div>
                        </div>
                        <!----->
                    </div>
                </div>
                <div  class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="margin-bottom: 6rem;">
                    <div class="col-md-10 col-xs-12 col-lg-10 col-sm-12 sabtsefaresh">
                        <label class="container">
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                        </label>
                        <p style="margin-right: 6rem;margin-top: 4px;"> پس از زمان مشخص،در صورت لزوم شماره من به متخصص نشان داده شود</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button  class="IRANSans edameBtn1"  style="float: left"  onclick="submitDateTime()">ادامه<i class="fas fa-chevron-left CLicon"></i></button>
                <button class="IRANSans edameBtn1" style="float: right"  data-dismiss="modal" data-toggle="modal" data-target="#modalN5"><i  class="fas fa-chevron-right CRicon"></i>برگشت</button>
            </div>
        </div>
    </div>
    <script>
        function submitDateTime() {

            Notiflix.Confirm.Show('ویرایش پیام', 'آیا مطمئن هستید؟',
                'بله', 'خیر',
                function () {// Yes button callback
                    $.ajax({
                        url: "25-3subDateTimeOrderList.php",
                        data: {
                            orderId: orderId,
                            user_id: user_id,
                        },
                        dataType: "json",
                        type: "POST",
                        success: function (jsonData) {
                            if (jsonData['error']) {
                                Notiflix.Notify.Failure(jsonData['MSG']);

                            } else {
                                $('#modalN6').modal('hide');
                                $('#modalN7').modal('show');

                            }
                        }
                    });
                },
                function () { // No button callback
                    return;
                }
            );


        }

    </script>
</div>
<!------N7------------------------------------------------->
<?php
$getOrderInformation2=$A->Query("SELECT * FROM orderlist,adress WHERE orderlist.id='$orderId' AND orderlist.addressId=adress.id");
$getOrderInformationFetch2=$A->FetchAssoc($getOrderInformation2);
?>
<div id="modalN7" class="modal fade divScroll" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="SansBold" style="margin-right: 2rem">
                    <?php echo $getSubFetch['subcategory']?>
                </h4>
            </div>
            <div class="modal-body IRANSans">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="margin-top:2rem;font-size:12px">
                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12"  style="float: right;">
                        <h4 class="SansBold">مشخصات پیگیری</h4>
                        <hr style="width:60%;float: right;">
                        <!----->
                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6" style="margin-top: 2rem">
                            <div  class="col-md-8 col-xs-8 col-sm-8 col-lg-8"  style="font-weight: bold">
                                <?php echo $getOrderInformationFetch2['submitTime'].' '.$getOrderInformationFetch2['submitDate']?>
                            </div>
                            <div  class="col-md-4 col-xs-4 col-sm-4 col-lg-4"  style="color: #bfbfbf">
                                زمان ثبت سفارش:
                            </div>
                        </div>
                        <!----->
                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6"  style="margin-top: 2rem">
                            <div  class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="font-weight: bold">
                                <?php echo $getOrderInformationFetch2['id']?>
                            </div>
                            <div  class="col-md-4 col-xs-4 col-sm-4 col-lg-4"  style="color: #bfbfbf">
                                کد پیگیری:
                            </div>
                        </div>
                        <!----->
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: center">
                    <div class="col-md-10 col-xs-12 col-sm-12 col-lg-10 col-md-offset-1 col-lg-offset-1 gheymat">
                        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                            <span>توافقی</span>
                        </div>
                        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                            <span>قیمت برای شما</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="margin-top: 1rem">
                        <div class="toggle IRANSans">
                            <input type="checkbox">
                            <label for="" class="onbtn">اعتباری</label>
                            <label for="" class="ofbtn">نقدی</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 ravesh-pardakht">
                        <span>روش پرداخت</span>
                    </div>
                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="margin-top: 1rem;text-align: left">
                        <button class="IRANSans laghvBtn" data-toggle="modal" data-target="#myModal">لغو سفارش</button>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding-top: 30px;padding-bottom: 36px;">
                    <div class="col-md-10 col-xs-10 col-sm-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 col-sm-offset-1 jozziyt-box">
                        <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="float: right">
                            <h4 class="SansBold">جزییات سفارش</h4>
                            <hr style="width: 80%;float: right;">
                            <!--1-->
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="font-size: 14px;margin: 1rem 0">
                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                    <p><?php echo $getSubFetch['subcategory']?></p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                    <p>خدمت مورد نظر</p>
                                </div>
                            </div>
                            <!--2-->
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="font-size: 14px;margin: 1rem 0">
                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                    <p><?php echo$getOrderInformationFetch2['neededTime']?></p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                    <p>زمان انجام کار</p>
                                </div>
                            </div>
                            <!--3-->
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="font-size: 14px;margin: 1rem 0">
                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                    <p><?php echo$getOrderInformationFetch2['neededDate']?></p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                    <p>تاریخ انجام کار</p>
                                </div>
                            </div>
                            <!--4-->
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="font-size: 14px;margin: 1rem 0">
                                <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
                                    <p><?php echo $getOrderInformationFetch2['Address']?></p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                                    <p>محل انجام کار</p>
                                </div>
                            </div>
                            <!----->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>

</div>
<!---laghv Sefaresh--------->
<div id="myModal" class="modal fade IRANSans" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> لغو سفارش</h4>
            </div>
            <div class="modal-body text-lagh">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت .</p>
                <div class="parent-laghv-r">
                    <div class="laghv-r active"><p> لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم</p></div>
                    <div class="laghv-r"><p> لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم</p></div>
                    <div class="laghv-r"><p> لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم</p></div>
                    <div class="laghv-r"><p> لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم</p></div>
                    <div class="laghv-r"><p> لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم</p></div>
                    <div class="laghv-r"><p> لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم</p></div>
                    <div class="laghv-r"><p> لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم</p></div>
                    <div class="laghv-r"><p> لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم</p></div>
                    <div class="laghv-r"><p> لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم لورم</p></div>
                </div>

                <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4 col-xs-offset-4 col-sm-offset-4 col-lg-offset-4 col-md-offset-4 BtnSabtSefaresh IRANSans" data-toggle="modal" data-dismiss="modal" style="margin-top: 2rem"><p style="margin-top: 10px">ثبت </p></div>
            </div>
            <script>
                $(document).on('click' , '.laghv-r' , function () {
                    $(this).addClass('active').siblings().removeClass('active')
                })
            </script>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!--------------->
<!------------------------------------------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans matnPage1">
    <?php
      $subcatInfo=$A->Query("SELECT * FROM subcategoryinformation WHERE subcategoryId='$subId' AND status='1'");
      $subcatInfoFetch=$A->FetchAssoc($subcatInfo);
      ?>
<h4 class="SansBold"><?php echo $subcatInfoFetch['title']?></h4>
    <br><br>
    <p><?php echo $subcatInfoFetch['text']?></p>
    <br>
    <p><?php echo $subcatInfoFetch['text2']?></p>
    <br>
    <p><?php echo $subcatInfoFetch['text3']?></p>
</div>
<!-------------------------تماس با ما و ...------------------------>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 tamas-etc">
    <ul class="SansBold">
        <li><a href="#"> تماس با ما</a></li>
        <li><a href="#">درباره وردست</a></li>
        <li><a href="#">پشتیبانی </a></li>
        <li><a href="#">سوالات متداول </a></li>
        <li><a href="#">قوانین و مقررات</a></li>
    </ul>
</div>
<!-----------------------------------فوتر------------------------->
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:60px 25px">
    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="text-align: center">
        <h3 class="SansBold text-social-media bigSizeHeader">در شبکه های اجتماعی وردست را دنبال کنید</h3>
        <br>
        <a href=""><img src="IMG/insta@2x.png" class="instagram-img"></a>
        <br> <br>
        <a href=""><img src="IMG/facebook@2x.png" class="facebook-img"></a>
        <br> <br>
        <a href=""><img src="IMG/whats@2x.png" class="whatsapp-img"></a>
        <br><br>
        <a href=""><img src="IMG/tweeter@2x.png" class="twitter-img"></a>
    </div>
    <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="text-align: center">
        <h3 class="SansBold tamas-ba-ma bigSizeHeader">تماس با ما</h3>
        <br>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:16px 0">
            <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 IRANSans" style="padding: 0"><p class="text-address bigSize">اهواز بلوار پاسداران خیابان زاویه</p></div>
            <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3" style="padding: 0"><img src="IMG/location-pin@2x.png" class="location-pin"></div>
        </div>

        <!------------>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:16px 0">
            <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 IRANSans" style="padding: 0">
                <p class="text-call bigSize">پشتیبانی و جذب متخصص : 02191009019</p>
                <p class="text-call bigSize">اداری : 02191009019</p>
            </div>
            <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3" style="padding: 0">
                <img src="IMG/call-answer@2x.png" class="call-answer">
            </div>
        </div>

        <!------------>
        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding:16px 0">
            <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 IRANSans" style="padding: 0">
                <p class="mail-text bigSize">info @piratil.com</p>
            </div>
            <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3" style="padding: 0">
                <img src="IMG/mail@2x.png" class="mail-img">
            </div>
        </div>
    </div>
    <!------------>
    <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3" style="text-align:right">
        <div style="text-align: center">
            <img src="IMG/logo@2x.png" style="width:50%">
            <br>
            <img src="IMG/vardast@2x.png" style="width: 33%">
        </div>
    </div>
</div>
<!-----------------------------------حقوق------------------------>
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 IRANSans back-black">
    <p>تمامی حقوق مادی و معنوی این سایت متعلق به شرکت پیراتیل می باشد</p>

</div>
<!--------------------------------------------------------------->
<script src="JS/MYjs.js"></script>

</body>
</html>