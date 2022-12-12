<?php
include "0-2loginCheckAdmin2.php";
$id = $_GET['id'];
$user_id = $_SESSION['id'];
$target=$A->Query("SELECT * FROM subcategory");
$target2=$A->Query("SELECT * FROM imgbase WHERE brand='EXPERT' AND status='0'");
$infoVal=$A->Query("SELECT * FROM workers WHERE id='$id'");
$infoValFetch=$A->FetchAssoc($infoVal);
$genderGet=$infoValFetch['gender'];
$statusGet=$infoValFetch['status'];
$maritalStatusGet=$infoValFetch['maritalStatus'];
$imgVar=$infoValFetch['WorkersImg'];
$subVar=$infoValFetch['subCategoryId'];
?>
<html lang="en">
<head>
    <title>فرم ویرایش اطلاعات متخصص</title>

    <?php
    include "link.php";
    ?>

    <!--    date -->
    <link rel="stylesheet" href="css/calendar-blue2.css">
    <script src="js/jalali.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/calendar-setup.js"></script>
    <script src="js/calendar-fa.js"></script>

    <!--alert-->
    <link href="css/notiflix-1.8.0.css" rel="stylesheet"/>
    <script src="js/notiflix-1.8.0.js"></script>


</head>

<body>

<section id="container">
    <?php
    include "header.php";
    ?>
    <?php
    include "sidebar.php";
    ?>
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
    <div class="col-lg-12" id="adminform">
        <section class="panel expertSection">
            <header class="panel-heading">
                فرم ویرایش اطلاعات متخصص
            </header>
            <div class="panel-body">

                <div class="form-group container-fluid">
                    <label for="name">نام خود را وارد کنید</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $infoValFetch['name']?>">
                </div>

                <div class="form-group container-fluid">
                    <label for="LastName">نام خانوادگی خود را وارد کنید</label>
                    <input type="text" class="form-control" id="LastName" value="<?php echo $infoValFetch['lastName']?>" >
                </div>

                <div class="form-group container-fluid">
                    <label for="PhoneNumber">شماره موبایل خود را وارد کنید</label>
                    <input type="number" class="form-control" id="PhoneNumber" value="<?php echo $infoValFetch['phoneNumber']?>">
                </div>

                <div class="form-group container-fluid">
                    <label for="Address">آدرس خود را وارد کنید</label>
                    <input type="text" class="form-control" id="Address" value="<?php echo $infoValFetch['address']?>">
                </div>

                <div class="form-group container-fluid">
                    <label for="NationalCode">کد ملی خود را وارد کنید</label>
                    <input type="number" class="form-control" id="NationalCode" value="<?php echo $infoValFetch['nationalCode']?>">
                </div>

                <div class="form-group container-fluid">
                    <label for="DateBirth">برای انتخاب تاریخ تولد روی ورودی کلیک کنید</label>
                    <input type="text" class="form-control" id="DateBirth" value="<?php echo $infoValFetch['dateOfBirth']?>">
                </div>

                <div class="form-group container-fluid">
                    <label for="Password">رمز عبور را وارد کنید</label>
                    <input type="password" class="form-control" id="Password" >
                </div>

                <div class="form-group container-fluid">
                    <label for="Password1">رمز عبور را تکرار کنید</label>
                    <input type="password" class="form-control" id="Password1" >
                </div>

                <div class="form-group container-fluid">
                    <label for="FixPhoneNumber">شماره تلفن ثابت را وارد کنید</label>
                    <input type="number" class="form-control" id="FixPhoneNumber" value="<?php echo $infoValFetch['fixedPhoneNumber']?>" >
                </div>



                <div class="form-group container-fluid">
                    <label for="gender">جنسیت را انتخاب کنید</label>
                    <br>
                    <select id="gender">
                        <option value="" selected disabled></option>
                        <option value="0" <?php if($statusGet=='0')echo "selected"?>>خانم</option>
                        <option value="1" <?php if($statusGet=='1')echo "selected"?>>آقا</option>
                    </select>
                </div>
                <div class="form-group container-fluid">
                    <label for="imgid">شناسه عکس را انتخاب کنید</label>
                    <br>
                    <select id="imgid">
                        <option value="" selected disabled></option>
                        <?php
                        while ($rows3 = mysqli_fetch_assoc($target2)) {
                            ?>
                            <option value="<?php echo $rows3['img'] ?>" <?php if($rows3['img']==$imgVar) echo "selected"?>><?php echo $rows3['img'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group container-fluid">
                    <label for="maritalStatus">وضعیت تاهل را انتخاب کنید</label>
                    <br>
                    <select id="maritalStatus">
                        <option value="" selected disabled></option>
                        <option value="1" <?php if($maritalStatusGet=='1')echo "selected"?>>متاهل</option>
                        <option value="0" <?php if($maritalStatusGet=='0')echo "selected"?>>مجرد</option>
                    </select>
                </div>
                <div class="form-group container-fluid">
                    <label for="Status">وضعیت فعالیت را انتخاب کنید</label>
                    <br>
                    <select id="Status">
                        <option value="" selected disabled></option>
                        <option value="1" <?php if($statusGet=='1')echo "selected"?>>فعال</option>
                        <option value="0" <?php if($statusGet=='0')echo "selected"?>>غیر فعال</option>
                    </select>
                </div>
                <div class="form-group container-fluid">
                    <label for="SubService">تخصص را انتخاب کنید</label>
                    <br>
                    <select id="SubService">
                        <option selected disabled value="">تخصص</option>
                        <?php
                        while ($rows = mysqli_fetch_assoc($target)) {
                            ?>
                            <option value="<?php echo $rows['id'] ?>"<?php if($rows['id']==$subVar) echo "selected"?>><?php echo $rows['subcategory'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <span class="btn btn-lg btn-login btn-block" onclick="sendData()">ثبت</span>

            </div>
        </section>
    </div>
                <?php
                include "footer.php";
                ?>

            </div>
        </section>
    </section>
</section>

<?php
include "js link.php";
?>

<script>
    Calendar.setup({
        inputField: 'DateBirth',
        button: 'DateBirth',
        ifFormat: '%Y/%m/%d',
        dateType: 'jalali'
    });
</script>
<script>
    Notiflix.Notify.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        timeout: 1500,
    });
</script>
<script>
    Notiflix.Confirm.Init({
        rtl: true,
        useGoogleFont: false,
        fontFamily: "yekanboldfanum",
        cancelButtonBackground: "#ef2828",
    });
</script>
<script>
    function sendData() {
        var name = $('#name').val();
        var LastName = $('#LastName').val();
        var PhoneNumber = $('#PhoneNumber').val();
        var Address = $('#Address').val();
        var NationalCode = $('#NationalCode').val();
        var DateBirth = $('#DateBirth').val();
        var Password = $('#Password').val();
        var Password1 = $('#Password1').val();
        var imgid = document.getElementById('imgid').value;
        var FixPhoneNumber = $('#FixPhoneNumber').val();
        var gender = document.getElementById('gender').value;
        var subcategory = document.getElementById('SubService').value;
        var maritalStatus = document.getElementById('maritalStatus').value;
        var Status = document.getElementById('Status').value;
        var user_id = <?php echo $user_id ?>;
        var id = <?php echo $id ?>;

        if (name == '') {
            document.getElementById('name').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('name').style.borderColor = '#ced4da';
                document.getElementById('name').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (LastName == '') {
            document.getElementById('LastName').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('LastName').style.borderColor = '#ced4da';
                document.getElementById('LastName').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (imgid == "") {
            document.getElementById('imgid').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('imgid').style.borderColor = '#ced4da';
                document.getElementById('imgid').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ورودی ها را پر کنید');
            return;
        }
        if (PhoneNumber == '') {
            document.getElementById('PhoneNumber').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('PhoneNumber').style.borderColor = '#ced4da';
                document.getElementById('PhoneNumber').style.borderWidth = '1px';
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
        if (NationalCode == '') {
            document.getElementById('NationalCode').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('NationalCode').style.borderColor = '#ced4da';
                document.getElementById('NationalCode').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (DateBirth == '') {
            document.getElementById('DateBirth').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('DateBirth').style.borderColor = '#ced4da';
                document.getElementById('DateBirth').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (Password == '') {
            document.getElementById('Password').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Password').style.borderColor = '#ced4da';
                document.getElementById('Password').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (Password1 == '') {
            document.getElementById('Password1').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Password1').style.borderColor = '#ced4da';
                document.getElementById('Password1').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (Password!=Password1) {
            document.getElementById('Password1').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Password1').style.borderColor = '#ced4da';
                document.getElementById('Password1').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('گذرواژه ها یکسان نیستند');
            return;
        }
        if (FixPhoneNumber == '') {
            document.getElementById('FixPhoneNumber').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('FixPhoneNumber').style.borderColor = '#ced4da';
                document.getElementById('FixPhoneNumber').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (gender == '') {
            document.getElementById('gender').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('gender').style.borderColor = '#ced4da';
                document.getElementById('gender').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (maritalStatus == '') {
            document.getElementById('maritalStatus').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('maritalStatus').style.borderColor = '#ced4da';
                document.getElementById('maritalStatus').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (Status == '') {
            document.getElementById('Status').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('Status').style.borderColor = '#ced4da';
                document.getElementById('Status').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        if (subcategory == '') {
            document.getElementById('SubService').style.border = '2px solid red';
            let inputTimeOut = setTimeout(function () {
                document.getElementById('SubService').style.borderColor = '#ced4da';
                document.getElementById('SubService').style.borderWidth = '1px';
                clearTimeout(
                    inputTimeOut
                );
            }, 1500);
            Notiflix.Notify.Failure('لطفا همه ی ورودی ها را پر کنید');
            return;
        }
        Notiflix.Confirm.Show('ویرایش متخصص', 'آیا مطمئن هستید؟',
            'بله', 'خیر',
            function () {// Yes button callback
                $.ajax({
                    url: "2-2upWorker.php",
                    data: {
                        name: name,
                        lastName: LastName,
                        phoneNumber: PhoneNumber,
                        address: Address,
                        nationalCode: NationalCode,
                        dateOfBirth: DateBirth,
                        password: Password,
                        fixedPhoneNumber: FixPhoneNumber,
                        gender: gender,
                        maritalStatus: maritalStatus,
                        status: Status,
                        user_id: user_id,
                        id: id,
                        img: imgid,
                        subCategoryId: subcategory,


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

</body>
</html>
