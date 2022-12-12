<?php
include "loginCheckAdmin.php";
$userId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ثبت محصولات فاکتور</title>
    <link rel="stylesheet" href="Css/factor.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <?php
    include "link.php"
    ?>
</head>
<body class="hold-transition sidebar-mini">
<input type="text" value="<?php echo $userId ?>" id="userId" style="display: none">
<div class="wrapper">

    <?php
    include "nav.php";
    ?>
    <div class="content-wrapper">

        <div class="col-12">
            <button class="btn btn-primary col-12 btnl25"><h3>ثبت محصولات فاکتور</h3></button>
        </div>
        <div class="col-8 div1">

            <input type="number" id="B2" class="it1" placeholder="شناسه ی محصول را وارد کنید ..." autofocus>

            <input type="number" id="A3" class="it2" placeholder="تعداد محصول را وارد کنید ...">
            <input type="number" id="B1" value="<?php echo $userId ?>" disabled class="it2">


            <br>
            <input onclick="sendParams()" class="btn-primary" type="submit" value="ثبت">

            <div class="col-6 alert warning" id="Wrong" align="center">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                سلام
            </div>
            <div class="col-6 alert success" id="Success" align="center">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                سلام
            </div>


        </div>
        <div class="col-8 dtl27">
            <?php
            $factorData = $A->Query("SELECT * FROM factordata,product WHERE FactorID='$userId' AND product.ProductID=factordata.ProductID");
            ?>
            <table id="table1" align="center" border="1">
                <tr class="clas11">
                    <th>ردیف</th>
                    <th>شناسه فاکتور</th>
                    <th>شناسه محصول</th>
                    <th>تعداد</th>
                    <th>قیمت کل</th>
                </tr>
                                <?php
                                $i = 1;
                                while ($rowFactors = mysqli_fetch_assoc($factorData)) {
                                    ?>
                                    <tr class="clas11 ">
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $rowFactors['FactorID'] ?></td>
                                        <td><?php echo $rowFactors['ProductID'] ?></td>
                                        <td><?php echo $rowFactors['NumbersProduct'] ?></td>
                                        <td>
                <?php echo $TO=$rowFactors['NumbersProduct']*$rowFactors['Price'] ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                    @$final+=$TO;
                                }
                                ?>


<!--                <script>-->
<!--                   function clickMe() {-->
<!--                       let userId = document.getElementById('userId').value;-->
<!--                       let table = document.getElementById('table1');-->
<!--                       // console.log('tr: '+tr);-->
<!--                       $.ajax({-->
<!--                           url: 'fa.php',-->
<!--                           data: {-->
<!--                               id: userId-->
<!--                           },-->
<!--                           dataType: "json",-->
<!--                           type: "POST",-->
<!--                           success: function (json) {-->
<!--                               let j = json;-->
<!--                               for (var i = 0; i < j.result.length; i++) {-->
<!--                                   let factorId = document.createTextNode(j.result[i].factorId);-->
<!--                                   let productID = document.createTextNode(j.result[i].productID);-->
<!--                                   let numbersProduct = document.createTextNode(j.result[i].numbersProduct);-->
<!--                                   let price = document.createTextNode(j.result[i].price);-->
<!--                                   // let id = document.createTextNode(j.result[i].id);-->
<!---->
<!--                                   let tr = document.createElement('tr');-->
<!--                                   tr.className = "clas11";-->
<!--                                   let td = document.createElement('td');-->
<!--                                   td.append(i);-->
<!--                                   let td1 = document.createElement('td');-->
<!--                                   td1.append(factorId);-->
<!--                                   let td2 = document.createElement('td');-->
<!--                                   td2.append(productID);-->
<!--                                   let td3 = document.createElement('td');-->
<!--                                   td3.append(numbersProduct);-->
<!--                                   let td4 = document.createElement('td');-->
<!--                                   td4.append(price);-->
<!--                                   tr.append(td);-->
<!--                                   tr.append(td1);-->
<!--                                   tr.append(td2);-->
<!--                                   tr.append(td3);-->
<!--                                   tr.append(td4);-->
<!---->
<!--                                   table.append(tr);-->
<!---->
<!--                               }-->
<!--                           }-->
<!--                       });-->
<!--                   }-->
<!--                </script>-->
            </table>
            <div class="col-6 dl74" align="center">
                <div class="col-6 dl75">
                    <h3 class="line54">
                        مبلغ نهایی(ریال)
                    </h3>
                </div>
                <div class="col-6 dl75">
                    <h3 class="line54">
                        <?php echo @$final ?>
                    </h3>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    var input10 = document.getElementById("A1");
    var input11 = document.getElementById("A2");
    input11.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("AAA").click();
        }
    });
    input10.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            $("#A2").focus();
        }
    });

</script>
<script>
    function sendParams() {
        var FactorID, ProductID, NumbersProduct;
        FactorID = document.getElementById('B1').value;
        ProductID = document.getElementById('B2').value;
        NumbersProduct = document.getElementById('A3').value;
        if (FactorID == '') {
            document.getElementById('B1').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('B1').style.borderColor = '#ced4da';
                document.getElementById('B1').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شناسه فاکتور را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (ProductID == '') {
            document.getElementById('B2').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('B2').style.borderColor = '#ced4da';
                document.getElementById('B2').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شناسه محصول  را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (NumbersProduct == '') {
            document.getElementById('A3').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A3').style.borderColor = '#ced4da';
                document.getElementById('A3').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);
            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا تعداد محصول را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        $.ajax({
            url: "12-1SubmitFactorDateDavin.php",
            data: {
                FactorID: FactorID,
                ProductID: ProductID,
                NumbersProduct: NumbersProduct,
            },
            dataType: "json",
            type: "POST",
            success: function (jsonData) {
                if (jsonData['error']) {

                    document.getElementById('Success').style.visibility = 'hidden';
                    document.getElementById('Wrong').style.display = 'block';
                    document.getElementById('Wrong').innerText = jsonData['MSG'];
                    $("div.warning").delay(1900).fadeOut(400);
                } else {

                    // var x = "<td>";
                    // #("tbody").append(x);
                    document.getElementById('Success').style.visibility = 'visible';
                    document.getElementById('Success').innerText = jsonData['MSG'];
                    $("div.success").delay(1900).style.visibility = 'hidden';

                }

            }
        });

    }
</script>
</body>
</html>