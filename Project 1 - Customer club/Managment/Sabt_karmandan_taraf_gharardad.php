<?php
include "loginCheckAdmin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ثبت مشتریان اقساطی</title>
    <link rel="stylesheet" href="Css/gharardad.css">
    <link rel="stylesheet" href="dist/css/CSSfnts.css">
    <link rel="stylesheet" href="Css/calendar-blue2.css"><script src="JS/jalali.js"></script>
    <script src="JS/calendar.js"></script>
    <script src="JS/calendar-setup.js"></script>
    <script src="JS/calendar-fa.js"></script>
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
            <button type="button" class="btn btn-primary col-12 btnl48"><h3>ثبت مشتریان اقساطی</h3></button>
        </div>


        <div class="col-8 div01" align="center">
            <input type="text" id="A3" name="firstname" placeholder="نام را وارد کنید ...">

            <input type="text" id="A4" name="lastname" placeholder="نام خانوادگی را وارد کنید ...">

            <input type="number" id="A5" name="lastname" placeholder="کد ملی را وارد کنید ...">

            <input type="number" id="A2" name="firstname" placeholder="شماره تلفن همراه را وارد کنید ...">

            <input type="text" id="A7" name="lastname" placeholder="آدرس محل سکونت را وارد کنید ...">

            <input type="number" id="A8" name="lastname" placeholder="شماره تلفن ثابت را وارد کنید ...">

            <select id="A12">
                <option disabled selected value="">جنسیت را انتخاب کنید</option>
                <option value="1">آقا</option>
                <option value="0">خانم</option>
            </select>
            <input type="text" id="DateEzdevaj" placeholder="برای انتخاب تاریخ ازدواج کلیک کنید" class="inputinfo">

            <?php
            $company = $A->Query("SELECT * FROM company ");
            ?>
            <select id="cat" onchange="getSubCat()">
                <option disabled selected value="">نام شرکت را انتخاب کنید</option>
                <?php
                while ($rowCompany = mysqli_fetch_assoc($company)) {
                    ?>
                    <option value="<?php echo $rowCompany['ID'] ?>"><?php echo $rowCompany['ID'].'---->'.$rowCompany['CompanyName']?></option>
                    <?php
                }
                ?>
            </select>

            <select id="subCat">
                <option disabled selected value="">شناسه قرارداد را انتخاب کنید</option>
            </select>

            <br>

            <input onclick="sendParams()" type="submit" value="ثبت" class="btn-primary">
            <div class="col-6 alert warning" id="Wrong" align="center">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                سلام
            </div>
            <div class="col-6 alert success" id="Success" align="center">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                سلام
            </div>
        </div>
    </div>

</div>

<script>
    Calendar.setup({
        inputField: 'DateEzdevaj',
        button: 'DateEzdevaj',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
</script>
<script>
    function getSubCat() {
        var cat = $("#cat").val();
        $.ajax({
            url:"getSubCat.php",
            data: {
                catId:cat
            },
            dataType:'json',
            type:'POST',
            success:function (data) {
                if(!data['error']){
                    $("#subCat").html(" <option value='' selected disabled >قرارد داد را انتخاب کنید</option>");
                    for (var i=0;i<data['subCat'].length;i++){
                        $("#subCat").append('<option value="'+data['subCat'][i]['id']+'">'+data['subCat'][i]['name']+'</option>');
                    }
                }
            }
        });
    }
</script>
<script>
    function sendParams() {
        var PhoneNumber, Name, LastName, NationalCode, DateOfMarriage, Address, FixedPhoneNumber, CompanyID, ContractID, Gender;
        // Password=document.getElementById('A1').value;
        PhoneNumber = document.getElementById('A2').value;
        Name = document.getElementById('A3').value;
        LastName = document.getElementById('A4').value;
        NationalCode = document.getElementById('A5').value;
        DateOfMarriage = document.getElementById('DateEzdevaj').value;
        Address = document.getElementById('A7').value;
        FixedPhoneNumber = document.getElementById('A8').value;
        CompanyID = document.getElementById('cat').value;
        ContractID = document.getElementById('subCat').value;
        Gender = document.getElementById('A12').value;
        // if (Password==''){
        //     document.getElementById('A1').style.border='2px solid red';
        //     document.getElementById('Success').style.visibility='hidden';
        //     document.getElementById('Wrong').style.display='block';
        //     document.getElementById('Wrong').innerText='PLease enter your email';
        //     return;
        // }
        if (Name == '') {
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
            document.getElementById('Wrong').innerText = 'لطفا نام را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (LastName == '') {
            document.getElementById('A4').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A4').style.borderColor = '#ced4da';
                document.getElementById('A4').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);

            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا نام خانوادگی را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (NationalCode == '') {
            document.getElementById('A5').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A5').style.borderColor = '#ced4da';
                document.getElementById('A5').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);

            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا کد ملی را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (PhoneNumber == '') {
            document.getElementById('A2').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A2').style.borderColor = '#ced4da';
                document.getElementById('A2').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);

            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شماره تلفن همراه را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }

        if (Address == '') {
            document.getElementById('A7').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A7').style.borderColor = '#ced4da';
                document.getElementById('A7').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);

            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا آدرس را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (FixedPhoneNumber == '') {
            document.getElementById('A8').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A8').style.borderColor = '#ced4da';
                document.getElementById('A8').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);

            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شماره تلفن ثابت را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (Gender == '') {
            document.getElementById('A12').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A12').style.borderColor = '#ced4da';
                document.getElementById('A12').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);

            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شماره تلفن همراه را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }

        // if (DateOfMarriage == '') {
        //     document.getElementById('DateEzdevaj').style.border = '2px solid red';
        //     let inputTimeOut = setTimeout(function () {
        //         document.getElementById('DateEzdevaj').style.borderColor = '#ced4da';
        //         document.getElementById('DateEzdevaj').style.borderWidth = '1px';
        //         clearTimeout(
        //             inputTimeOut
        //         );
        //     }, 2000);
        //
        //     document.getElementById('Success').style.visibility = 'hidden';
        //     document.getElementById('Wrong').style.display = 'block';
        //     document.getElementById('Wrong').innerText = 'لطفا تاریخ ازدواج را وارد کنید';
        //     $("div.warning").delay(1900).fadeOut(400);
        //     return;
        // }
        if (CompanyID == '') {
            document.getElementById('cat').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A11').style.borderColor = '#ced4da';
                document.getElementById('A11').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);

            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شناسه شرکت را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        if (ContractID == '') {
            document.getElementById('subCat').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('A1').style.borderColor = '#ced4da';
                document.getElementById('A1').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 2000);

            document.getElementById('Success').style.visibility = 'hidden';
            document.getElementById('Wrong').style.display = 'block';
            document.getElementById('Wrong').innerText = 'لطفا شناسه قرارداد را وارد کنید';
            $("div.warning").delay(1900).fadeOut(400);
            return;
        }
        $.ajax({
            url: "2-1SubmitContractUsersDavin.php",
            data: {
                PhoneNumber: PhoneNumber,
                Name: Name,
                LastName: LastName,
                NationalCode: NationalCode,
                DateOfMarriage: DateOfMarriage,
                Address: Address,
                FixedPhoneNumber: FixedPhoneNumber,
                CompanyID: CompanyID,
                ContractID: ContractID,
                Gender: Gender,
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
                    document.getElementById('Success').style.visibility = 'visible';
                    document.getElementById('Success').innerText = jsonData['MSG'];
                    $("div.success").delay(1900).fadeOut(400);
                }
            }
        });
    }
</script>
</body>

</html>