


<!--        style in D:\Programs\xamp\htdocs\Managment\dist\css\newcss.css    -->

<!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="ZZZindex.php" class="nav-link">صفحه اصلی</a>
            </li>
        </ul>
    </nav><!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="ZZZindex.php" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="mainpage" class="brand-image img-circle elevation-3 imgl23">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr; text-align: right">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3">
                    <div class="image dl32">
                        <img src="dist/img/avatar04.png" class="img-circle elevation-2" alt="User Image" >
                    </div>
                    <?php
                    $getuser=$_SESSION['nationalCode'];
                    $select=$A->Query("SELECT * FROM admin WHERE `ID(national code)`='$getuser'");
                    $select2=$A->FetchAssoc($select);
                    $name=$select2['Name'];
                    $lastName=$select2['LastName'];

                    ?>
                    <div class="info dl35">
                        <a href="#" class="d-block"><?php echo $name.' '.$lastName?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="ZZZindex.php"  class="nav-link active apr">
                                <i class="fa fa-home"></i>
                                <p>
                                    صفحه ی اصلی
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link apr1">
                                <i class="fa fa-shopping-bag"></i>
                                <p>
                                    کالاها
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Sabt_kala.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>ثبت کالاها</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="List_kala.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>لیست کالاها</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link apr1">
                                <i class="fa fa-calendar-plus-o"></i>
                                <p>
                                    رویداد ها
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Add_ghorekeshi.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p> افزودن قرعه کشی</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="List_ghorekeshi.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>لیست قرعه کشی ها</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Sabt_barande.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>ثبت برنده</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="List_barande.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>لیست برنده</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Add_jashnvare_kharid.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>افزودن جشنواره خرید</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="List_jashnvareh_kharid.php" class="nav-link cpr" >
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>لیست جشنواره های خرید</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <!--<li class="nav-item has-treeview">-->
                            <a href="#" class="nav-link apr2">
                                <i class="fa fa-star"></i>
                                <p>
                                    امتیازات
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Add_emtiaz_be_aza.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>اضافه کردن امتیاز به اعضا</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Jadval_taein_emtiaz.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>جدول تبدیل امتیاز</p>
                                    </a>
                                </li>
                            </ul>
                        <li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link apr3">
                                <i class="fa fa-user-circle idl48"></i>
                                <p>
                                    ادمین ها
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ZZZindex.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>وضعیت ادمین ها</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Add_admin.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>افزودن ادمین</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link apr4">
                                <i class="fas fa-users idl48"></i>
                                <p>
                                    باشگاه مشتریان
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Sabt_azay_bashgah_moshtarian.php" class="nav-link cpr" >
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>ثبت اعضای باشگاه</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="List_azay_bashgah_moshtarian.php" class="nav-link cpr" >
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>لیست اعضای باشگاه</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link apr7">
                                <i class="fas fa-file-invoice-dollar idl48"></i>
                                <p>
                                    فاکتور ها
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Sabt_factor.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>ثبت فاکتور ها</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="List_factor.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>لیست فاکتور ها</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Details_factot.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>جزئیات فاکتور ها</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link apr5">
                                <i class="fas fa-receipt "></i>
                                <p>
                                    قرارداد های فروش
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Sabt_sherkat.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>ثبت شرکت ها</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="List_sherkat.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>لیست شرکت ها</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Sabt_gharardad_jadid.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>ثبت قرارداد جدید</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="List_gharardad.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>لیست قراردادها</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Sabt_karmandan_taraf_gharardad.php" class="nav-link cpr" >
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>ثبت مشتریان اقساطی</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="List_moshtarian_aghsati.php" class="nav-link cpr">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>لیست مشتریان اقساطی</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="List_aghsat.php" class="nav-link cpr" >
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>لیست اقساط</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!--<script src="teamA/js0.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<!--<script src="teamA/js1.js"></script>-->
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<!--<script src="teamA/js2.js"></script>-->
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