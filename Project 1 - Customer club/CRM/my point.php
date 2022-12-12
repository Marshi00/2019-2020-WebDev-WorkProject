<?php
include "loginCheckUser.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>امتیاز من</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="dist/css/custom-style.css">
    <!--new style-->
    <link rel="stylesheet" href="css/newcss.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="my point.php" class="nav-link">خانه</a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="my%20point.php" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="mypage" class="brand-image img-circle elevation-3 imgus">
            <span class="brand-text font-weight-light">صفحه ی من</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar sidebarline60">
            <div class="dl61">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 nav-sidebar">
                    <div class="dl64">
                        <div class="image">
                            <img src="dist/img/avatar04.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="nav-link info dl68">
                            <?php
                            $getUser = $_SESSION['PhoneNumber'];
                            $name=$A->Query("SELECT * FROM user WHERE PhoneNumber='$getUser'");
                            $bla=$A->FetchAssoc($name);
                            ?>
                            <p class="d-block"><?php echo $bla['Name'].' '.$bla['LastName'] ?></p>
                        </div>
                    </div>
                    <div class="nav-link dl81">
                        <a href="info.php" class="nav-link bbb">
                            <i class="fas fa-user-edit"></i>
                            <p class="pl75">
                                اطلاعات من
                            </p>
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <!--امتیاز من-->
                        <li class="nav-item has-treeview menu-open">
                            <a href="my%20point.php" class="nav-link active aaa">
                                <i class="nav-icon fas fa-hand-holding-usd"></i>
                                <p>
                                    امتیاز من
                                </p>
                            </a>
                        </li>
                        <!--جشنواره ها-->
                        <li class="nav-item has-treeview">
                            <a href="festivals.php" class="nav-link aaa1">
                                <i class="fas fa-gifts"></i>
                                <p>
                                    جشنواره ها
                                </p>
                            </a>
                        </li>
                        <!--قرعه کشی ها-->
                        <li class="nav-item has-treeview">
                            <a href="loteries.php" class="nav-link aaa2">
                                <i class="fas fa-ticket-alt"></i>
                                <p>
                                    قرعه کشی ها
                                </p>
                            </a>
                        </li>
                        <!--سابقه خرید-->
                        <li class="nav-item has-treeview">
                            <a href="history.php" class="nav-link">
                                <i class="fas fa-history"></i>
                                <p>
                                    سابقه ی خرید
                                </p>
                            </a>
                        </li>
                        <!--درباره ی ما-->
                        <li class="nav-item has-treeview">
                            <a href="about%20us.php" class="nav-link  aaa3">
                                <i class="fas fa-address-book"></i>
                                <p>
                                    درباره ی ما
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav><!-- /.sidebar-menu -->
            </div>
        </div><!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">امتیاز من</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="logout.php">خروج</a></li>
                            <li class="breadcrumb-item active">صفحه ی من</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row dl1699">
                    <div class="col-lg-3 col-md-3 abcd"><!--مقدار امتیاز-->
                        <div class="small-box bg-info-gradient">
                            <div class="inner dl173">
                                <?php
                                function getPoint($getUser)
                                {
                                    $A = new Active3();
                                    $to = 0;
                                    $select = $A->Query("SELECT * FROM factor WHERE UserID='$getUser'");
                                    while ($fetch = mysqli_fetch_assoc($select)) {
                                        $B = $fetch['EarnedCredit'];
                                        $C = $fetch['UsedCredit'];
                                        $to += $B - $C;
                                    }
                                    return $to;
                                }
                                function getOtherPoints($getUser)
                                {
                                    $A = new Active3();
                                    $op=0;
                                    $select2=$A->Query("SELECT * FROM otherpoints WHERE UserID='$getUser'");
                                    while ($fetch2 = mysqli_fetch_assoc($select2)) {
                                        $E=$fetch2['Points'];
                                        $op += $E ;
                                    }
                                    return $op;
                                }
                                $mypoint=getPoint($getUser)+getOtherPoints($getUser)
                                ?>
                                <h3><?php echo $mypoint ?></h3><sup>امتیاز</sup>
                                <p class="fontsmxsp">مقدار امتیاز من</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a class="small-box-footer"></a>
                        </div>
                    </div><!--مقدار امتیاز-->
                    <div class="col-lg-1 col-md-1"><!--ضرب-->
                        <div class="small-box bg-dark-gradient">
                            <div class="inner dl1844">
                                <i class="fas fa-times symbolxssm"></i>
                            </div>
                            <a class="small-box-footer"></a>
                        </div>
                    </div><!--ضرب-->

                    <div class="col-lg-3 col-md-3"><!--تبدیل-->
                        <!-- small box -->
                        <div class="small-box bg-success-gradient">
                            <div class="inner dl173">
                                <h3>25000</h3><sup>ریال</sup>
                                <p class="fontsmxsp">تبدیل به ازای هر واحد امتیاز</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a class="small-box-footer"></a>
                        </div>
                    </div><!--تبدیل-->

                    <div class="col-lg-1 col-md-1"><!--مساوی-->
                        <div class="small-box bg-dark-gradient">
                            <div class="inner dl1844">
                                <i class="fas fa-equals symbolxssm"></i>
                            </div>
                            <a class="small-box-footer"></a>
                        </div>
                    </div><!--مساوی-->

                    <div class="col-lg-3 col-md-3"><!--هدیه-->
                        <div class="small-box bg-danger-gradient">
                            <div class="inner dl173">
                                <h3><?php echo $mypoint*25000?></h3><sup>ریال</sup>
                                <p class="fontsmxsp">هدیه ی نهایی</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-cash"></i>
                            </div>
                            <a class="small-box-footer"></a>
                        </div>
                    </div><!--هدیه-->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div><!-- /.content-wrapper -->

<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>-->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
