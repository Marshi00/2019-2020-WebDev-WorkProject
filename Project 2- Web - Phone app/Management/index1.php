<?php
include "varManagement.php";
$A = new varManagement();
session_start();
if (isset($_SESSION['login']) && $_SESSION['login']==true && isset($_SESSION['Status']) && $_SESSION['Status']=='1' && isset($_SESSION['Level']) && $_SESSION['Level']<='4'){
//    $_SESSION['login']=true;
}else {
    header('location:login.php');
}
$user_id = $_SESSION['id'];
?>
    <!DOCTYPE html>
<html lang="en">
  <head>
      <title>تابلوی مدیریت</title>

      <?php
      include "link.php";
      ?>


  </head>

  <body>
  <section id="container">
      <?php
      include "header.php";
      ?>
      <?php
      include "sidebar.php";
      ?>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-4 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <?php
                              $numberHeader=$A->Query("SELECT * FROM orderlist WHERE status='2'");
                              $numNumberHeader=$A->Numros($numberHeader);
                              ?>
                              <h1 >
                                  <?php echo $numNumberHeader?>
                              </h1>
                              <p>تعداد خدمات انجام شده تا امروز</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-bar-chart-o"></i>
                          </div>
                          <div class="value">
                              <?php
                              $todayDate=date('Y-m-d');
                              $numberHeaderToday=$A->Query("SELECT * FROM orderlist WHERE status='2' AND neededDate='$todayDate'");
                              $numNumberTOdayHeader=$A->Numros($numberHeaderToday);
                              ?>
                              <h1 >
                                  <?php echo $numNumberTOdayHeader?>
                              </h1>
                              <p>خدمات انجام شده ی امروز</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <?php
                              $numberUsers=$A->Query("SELECT * FROM user ");
                              $numNumberUsers=$A->Numros($numberUsers);
                              ?>
                              <h1 >
                                  <?php echo $numNumberUsers?>
                              </h1>
                              <p>کاربران </p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->
              <?php
                    $farvardin=0;
                    $ordibehesh=0;
                    $khordad=0;
                    $tir=0;
                    $mordad=0;
                    $shahrevar=0;
                    $mehr=0;
                    $aban=0;
                    $azar=0;
                    $dey=0;
                    $bahamn=0;
                    $esfand=0;
                    $allMonth=0;
                    $farvardinPercentage=0;
                    $ordibeheshPecentage=0;
                    $khordadPercentage=0;
                    $tirPercentage=0;
                    $mordadPercentage=0;
                    $shahrevarPercentage=0;
                    $mehrPercentage=0;
                    $abanPercentage=0;
                    $azarPercentage=0;
                    $deyPercentage=0;
                    $bahamnPercentage=0;
                    $esfandPercentage=0;
                    $chartsSel=$A->Query("SELECT * FROM orderlist WHERE status='2'");
                    while ($FetchchartsSel=mysqli_fetch_assoc($chartsSel)){
                       $dateChart= $FetchchartsSel['neededDate'];
                       $yearDb = explode("-",$dateChart);

                       $year = date("Y");
                       if($yearDb[0]!=$year){continue;}
                        $allMonth++;
                        $exp = explode("-",$A->G2J($dateChart));
                        $expDate=$exp[1];
                       if($expDate=='1'){
                           $farvardin++;
                       }elseif ($expDate==='2'){
                           $ordibehesh++;
                       }elseif ($expDate==='3'){
                           $khordad++;
                       }elseif ($expDate==='4'){
                            $tir++;
                       }elseif ($expDate==='5'){
                           $mordad++;
                       }elseif ($expDate==='6'){
                           $shahrevar++;
                       }elseif ($expDate==='7'){
                           $mehr++;
                       }elseif ($expDate==='8'){
                            $aban++;
                       }elseif ($expDate==='9'){
                            $azar++;
                       }elseif ($expDate==='10'){
                            $dey++;
                       }elseif ($expDate==='11'){
                            $bahamn++;
                       }elseif ($expDate==='12'){
                            $esfand++;
                       }
                    }
                        if($farvardin!=0)$farvardinPercentage = $farvardin*100/$allMonth;
                        if($ordibehesh!=0)$ordibeheshPecentage = $ordibehesh*100/$allMonth;
                        if($khordad!=0)$khordadPercentage = $khordad*100/$allMonth;
                        if($tir!=0)$tirPercentage = $tir*100/$allMonth;
                        if($mordad!=0)$mordadPercentage = $mordad*100/$allMonth;
                        if($shahrevar!=0)$shahrevarPercentage = $shahrevar*100/$allMonth;
                        if($mehr!=0)$mehrPercentage = $mehr*100/$allMonth;
                        if($aban!=0)$abanPercentage = $aban*100/$allMonth;
                        if($azar!=0)$azarPercentage = $azar*100/$allMonth;
                        if($dey!=0)$deyPercentage = $dey*100/$allMonth;
                        if($bahamn!=0)$bahamnPercentage = $bahamn*100/$allMonth;
                        if($esfand!=0)$esfandPercentage = $esfand*100/$allMonth;

              ?>
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 chal526">
                      <!--custom chart start-->
                      <div class="border-head">
                          <h3>خدمات در سال جاری</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>100</span></li>
                              <li><span>80</span></li>
                              <li><span>60</span></li>
                              <li><span>40</span></li>
                              <li><span>20</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">فروردین</div>
                              <div class="value tooltips" data-original-title="<?php echo $farvardinPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $farvardinPercentage?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">اردیبهشت</div>
                              <div class="value tooltips" data-original-title="<?php echo $ordibeheshPecentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $ordibeheshPecentage?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">خرداد</div>
                              <div class="value tooltips" data-original-title="<?php echo $khordadPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $khordadPercentage?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">تیر</div>
                              <div class="value tooltips" data-original-title="<?php echo $tirPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $tirPercentage?>%</div>
                          </div>
                          <div class="bar">
                              <div class="title">مرداد</div>
                              <div class="value tooltips" data-original-title="<?php echo $mordadPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $mordadPercentage?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">شهریور</div>
                              <div class="value tooltips" data-original-title="<?php echo $shahrevarPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $shahrevarPercentage?>%</div>
                          </div>
                          <div class="bar">
                              <div class="title">مهر</div>
                              <div class="value tooltips" data-original-title="<?php echo $mehrPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $mehrPercentage?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">آبان</div>
                              <div class="value tooltips" data-original-title="<?php echo $abanPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $abanPercentage?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">آذر</div>
                              <div class="value tooltips" data-original-title="<?php echo $azarPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $azarPercentage?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">دی</div>
                              <div class="value tooltips" data-original-title="<?php echo $deyPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $deyPercentage?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">بهمن</div>
                              <div class="value tooltips" data-original-title="<?php echo $bahamnPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $bahamnPercentage?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">اسفند</div>
                              <div class="value tooltips" data-original-title="<?php echo $esfandPercentage?>%" data-toggle="tooltip" data-placement="top"><?php echo $esfandPercentage?>%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
                  </div>
<!--                  <div class="col-lg-4">-->
                      <!--new earning start-->
<!--                      <div class="panel terques-chart">-->
<!--                          <div class="panel-body chart-texture">-->
<!--                              <div class="chart">-->
<!--                                  <div class="heading">-->
<!--                                      <span>Friday</span>-->
<!--                                      <strong>$ 57,00 | 15%</strong>-->
<!--                                  </div>-->
<!--                                  <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                          <div class="chart-tittle">-->
<!--                              <span class="title">New Earning</span>-->
<!--                              <span class="value">-->
<!--                                  <a href="#" class="active">Market</a>-->
<!--                                  |-->
<!--                                  <a href="#">Referal</a>-->
<!--                                  |-->
<!--                                  <a href="#">Online</a>-->
<!--                              </span>-->
<!--                          </div>-->
<!--                      </div>-->
                      <!--new earning end-->

                      <!--total earning start-->
<!--                      <div class="panel green-chart">-->
<!--                          <div class="panel-body">-->
<!--                              <div class="chart">-->
<!--                                  <div class="heading">-->
<!--                                      <span>June</span>-->
<!--                                      <strong>23 Days | 65%</strong>-->
<!--                                  </div>-->
<!--                                  <div id="barchart"></div>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                          <div class="chart-tittle">-->
<!--                              <span class="title">Total Earning</span>-->
<!--                              <span class="value">$, 76,54,678</span>-->
<!--                          </div>-->
<!--                      </div>-->
                      <!--total earning end-->
<!--                  </div>-->
              </div>
<!--              <div class="row">-->
<!--                  <div class="col-lg-4">-->
                      <!--user info table start-->
<!--                      <section class="panel">-->
<!--                          <div class="panel-body">-->
<!--                              <a href="#" class="task-thumb">-->
<!--                                  <img src="img/avatar1.jpg" alt="">-->
<!--                              </a>-->
<!--                              <div class="task-thumb-details">-->
<!--                                  <h1><a href="#">Anjelina Joli</a></h1>-->
<!--                                  <p>Senior Architect</p>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                          <table class="table table-hover personal-task">-->
<!--                              <tbody>-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <i class=" fa fa-tasks"></i>-->
<!--                                    </td>-->
<!--                                    <td>New Task Issued</td>-->
<!--                                    <td> 02</td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <i class="fa fa-exclamation-triangle"></i>-->
<!--                                    </td>-->
<!--                                    <td>Task Pending</td>-->
<!--                                    <td> 14</td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <i class="fa fa-envelope"></i>-->
<!--                                    </td>-->
<!--                                    <td>Inbox</td>-->
<!--                                    <td> 45</td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <i class=" fa fa-bell-o"></i>-->
<!--                                    </td>-->
<!--                                    <td>New Notification</td>-->
<!--                                    <td> 09</td>-->
<!--                                </tr>-->
<!--                              </tbody>-->
<!--                          </table>-->
<!--                      </section>-->
                      <!--user info table end-->
<!--                  </div>-->
<!--                  <div class="col-lg-8">-->
                      <!--work progress start-->
<!--                      <section class="panel">-->
<!--                          <div class="panel-body progress-panel">-->
<!--                              <div class="task-progress">-->
<!--                                  <h1>Work Progress</h1>-->
<!--                                  <p>Anjelina Joli</p>-->
<!--                              </div>-->
<!--                              <div class="task-option">-->
<!--                                  <select class="styled">-->
<!--                                      <option>Anjelina Joli</option>-->
<!--                                      <option>Tom Crouse</option>-->
<!--                                      <option>Jhon Due</option>-->
<!--                                  </select>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                          <table class="table table-hover personal-task">-->
<!--                              <tbody>-->
<!--                              <tr>-->
<!--                                  <td>1</td>-->
<!--                                  <td>-->
<!--                                      Target Sell-->
<!--                                  </td>-->
<!--                                  <td>-->
<!--                                      <span class="badge bg-important">75%</span>-->
<!--                                  </td>-->
<!--                                  <td>-->
<!--                                    <div id="work-progress1"></div>-->
<!--                                  </td>-->
<!--                              </tr>-->
<!--                              <tr>-->
<!--                                  <td>2</td>-->
<!--                                  <td>-->
<!--                                      Product Delivery-->
<!--                                  </td>-->
<!--                                  <td>-->
<!--                                      <span class="badge bg-success">43%</span>-->
<!--                                  </td>-->
<!--                                  <td>-->
<!--                                      <div id="work-progress2"></div>-->
<!--                                  </td>-->
<!--                              </tr>-->
<!--                              <tr>-->
<!--                                  <td>3</td>-->
<!--                                  <td>-->
<!--                                      Payment Collection-->
<!--                                  </td>-->
<!--                                  <td>-->
<!--                                      <span class="badge bg-info">67%</span>-->
<!--                                  </td>-->
<!--                                  <td>-->
<!--                                      <div id="work-progress3"></div>-->
<!--                                  </td>-->
<!--                              </tr>-->
<!--                              <tr>-->
<!--                                  <td>4</td>-->
<!--                                  <td>-->
<!--                                      Work Progress-->
<!--                                  </td>-->
<!--                                  <td>-->
<!--                                      <span class="badge bg-warning">30%</span>-->
<!--                                  </td>-->
<!--                                  <td>-->
<!--                                      <div id="work-progress4"></div>-->
<!--                                  </td>-->
<!--                              </tr>-->
<!--                              <tr>-->
<!--                                  <td>5</td>-->
<!--                                  <td>-->
<!--                                      Delivery Pending-->
<!--                                  </td>-->
<!--                                  <td>-->
<!--                                      <span class="badge bg-primary">15%</span>-->
<!--                                  </td>-->
<!--                                  <td>-->
<!--                                      <div id="work-progress5"></div>-->
<!--                                  </td>-->
<!--                              </tr>-->
<!--                              </tbody>-->
<!--                          </table>-->
<!--                      </section>-->
                      <!--work progress end-->
<!--                  </div>-->
<!--              </div>-->
<!--              <div class="row dl767">-->
<!--                  <div class="col-lg-8 col-md-8 col-xs-10 col-sm-10">-->
                      <!--timeline start-->
<!--                      <section class="panel">-->
<!--                          <div class="panel-body">-->
<!--                                  <div class="text-center mbot30">-->
<!--                                      <h3 class="timeline-title">Timeline</h3>-->
<!--                                      <p class="t-info">This is a project timeline</p>-->
<!--                                  </div>-->
<!---->
<!--                                  <div class="timeline">-->
<!--                                      <article class="timeline-item">-->
<!--                                          <div class="timeline-desk">-->
<!--                                              <div class="panel">-->
<!--                                                  <div class="panel-body">-->
<!--                                                      <span class="arrow"></span>-->
<!--                                                      <span class="timeline-icon red"></span>-->
<!--                                                      <span class="timeline-date">08:25 am</span>-->
<!--                                                      <h1 class="red">12 July | Sunday</h1>-->
<!--                                                      <p>Lorem ipsum dolor sit amet consiquest dio</p>-->
<!--                                                  </div>-->
<!--                                              </div>-->
<!--                                          </div>-->
<!--                                      </article>-->
<!--                                      <article class="timeline-item alt">-->
<!--                                          <div class="timeline-desk">-->
<!--                                              <div class="panel">-->
<!--                                                  <div class="panel-body">-->
<!--                                                      <span class="arrow-alt"></span>-->
<!--                                                      <span class="timeline-icon green"></span>-->
<!--                                                      <span class="timeline-date">10:00 am</span>-->
<!--                                                      <h1 class="green">10 July | Wednesday</h1>-->
<!--                                                      <p><a href="#">Jonathan Smith</a> added new milestone <span><a href="#" class="green">ERP</a></span></p>-->
<!--                                                  </div>-->
<!--                                              </div>-->
<!--                                          </div>-->
<!--                                      </article>-->
<!--                                      <article class="timeline-item">-->
<!--                                          <div class="timeline-desk">-->
<!--                                              <div class="panel">-->
<!--                                                  <div class="panel-body">-->
<!--                                                      <span class="arrow"></span>-->
<!--                                                      <span class="timeline-icon blue"></span>-->
<!--                                                      <span class="timeline-date">11:35 am</span>-->
<!--                                                      <h1 class="blue">05 July | Monday</h1>-->
<!--                                                      <p><a href="#">Anjelina Joli</a> added new album <span><a href="#" class="blue">PARTY TIME</a></span></p>-->
<!--                                                      <div class="album">-->
<!--                                                          <a href="#">-->
<!--                                                              <img alt="" src="img/sm-img-1.jpg">-->
<!--                                                          </a>-->
<!--                                                          <a href="#">-->
<!--                                                              <img alt="" src="img/sm-img-2.jpg">-->
<!--                                                          </a>-->
<!--                                                          <a href="#">-->
<!--                                                              <img alt="" src="img/sm-img-3.jpg">-->
<!--                                                          </a>-->
<!--                                                          <a href="#">-->
<!--                                                              <img alt="" src="img/sm-img-1.jpg">-->
<!--                                                          </a>-->
<!--                                                          <a href="#">-->
<!--                                                              <img alt="" src="img/sm-img-2.jpg">-->
<!--                                                          </a>-->
<!--                                                      </div>-->
<!--                                                  </div>-->
<!--                                              </div>-->
<!--                                          </div>-->
<!--                                      </article>-->
<!--                                      <article class="timeline-item alt">-->
<!--                                          <div class="timeline-desk">-->
<!--                                              <div class="panel">-->
<!--                                                  <div class="panel-body">-->
<!--                                                      <span class="arrow-alt"></span>-->
<!--                                                      <span class="timeline-icon purple"></span>-->
<!--                                                      <span class="timeline-date">3:20 pm</span>-->
<!--                                                      <h1 class="purple">29 June | Saturday</h1>-->
<!--                                                      <p>Lorem ipsum dolor sit amet consiquest dio</p>-->
<!--                                                      <div class="notification">-->
<!--                                                          <i class=" fa fa-exclamation-sign"></i> New task added for <a href="#">Denial Collins</a>-->
<!--                                                      </div>-->
<!--                                                  </div>-->
<!--                                              </div>-->
<!--                                          </div>-->
<!--                                      </article>-->
<!--                                      <article class="timeline-item">-->
<!--                                          <div class="timeline-desk">-->
<!--                                              <div class="panel">-->
<!--                                                  <div class="panel-body">-->
<!--                                                      <span class="arrow"></span>-->
<!--                                                      <span class="timeline-icon light-green"></span>-->
<!--                                                      <span class="timeline-date">07:49 pm</span>-->
<!--                                                      <h1 class="light-green">10 June | Friday</h1>-->
<!--                                                      <p><a href="#">Jonatha Smith</a> added new milestone <span><a href="#" class="light-green">prank</a></span> Lorem ipsum dolor sit amet consiquest dio</p>-->
<!--                                                  </div>-->
<!--                                              </div>-->
<!--                                          </div>-->
<!--                                      </article>-->
<!--                                  </div>-->
<!---->
<!--                                  <div class="clearfix">&nbsp;</div>-->
<!--                              </div>-->
<!--                      </section>-->
<!--                      <!--timeline end-->-->
<!--                  </div>-->
<!--                  <div class="col-lg-4">-->
                      <!--revenue start-->
<!--                      <section class="panel">-->
<!--                          <div class="revenue-head">-->
<!--                              <span>-->
<!--                                  <i class="fa fa-bar-chart-o"></i>-->
<!--                              </span>-->
<!--                              <h3>Revenue</h3>-->
<!--                              <span class="rev-combo pull-right">-->
<!--                                 June 2013-->
<!--                              </span>-->
<!--                          </div>-->
<!--                          <div class="panel-body">-->
<!--                              <div class="row">-->
<!--                                  <div class="col-lg-6 col-sm-6 text-center">-->
<!--                                      <div class="easy-pie-chart">-->
<!--                                          <div class="percentage" data-percent="35"><span>35</span>%</div>-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                                  <div class="col-lg-6 col-sm-6">-->
<!--                                      <div class="chart-info chart-position">-->
<!--                                          <span class="increase"></span>-->
<!--                                          <span>Revenue Increase</span>-->
<!--                                      </div>-->
<!--                                      <div class="chart-info">-->
<!--                                          <span class="decrease"></span>-->
<!--                                          <span>Revenue Decrease</span>-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                          <div class="panel-footer revenue-foot">-->
<!--                              <ul>-->
<!--                                  <li class="first active">-->
<!--                                      <a href="javascript:;">-->
<!--                                          <i class="fa fa-bullseye"></i>-->
<!--                                          Graphical-->
<!--                                      </a>-->
<!--                                  </li>-->
<!--                                  <li>-->
<!--                                      <a href="javascript:;">-->
<!--                                          <i class=" fa fa-th-large"></i>-->
<!--                                          Tabular-->
<!--                                      </a>-->
<!--                                  </li>-->
<!--                                  <li class="last">-->
<!--                                      <a href="javascript:;">-->
<!--                                          <i class=" fa fa-align-justify"></i>-->
<!--                                          Listing-->
<!--                                      </a>-->
<!--                                  </li>-->
<!--                              </ul>-->
<!--                          </div>-->
<!--                      </section>-->
                      <!--revenue end-->
                      <!--features carousel start-->
<!--                      <section class="panel">-->
<!--                          <div class="flat-carousal">-->
<!--                              <div id="owl-demo" class="owl-carousel owl-theme">-->
<!--                                  <div class="item">-->
<!--                                      <h1>Flatlab is new model of admin dashboard for happy use</h1>-->
<!--                                      <div class="text-center">-->
<!--                                          <a href="javascript:;" class="view-all">View All</a>-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                                  <div class="item">-->
<!--                                      <h1>Fully responsive and build with Bootstrap 3.0</h1>-->
<!--                                      <div class="text-center">-->
<!--                                          <a href="javascript:;" class="view-all">View All</a>-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                                  <div class="item">-->
<!--                                      <h1>Responsive Frontend is free if you get this.</h1>-->
<!--                                      <div class="text-center">-->
<!--                                          <a href="javascript:;" class="view-all">View All</a>-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </div>-->
<!--                          <div class="panel-body">-->
<!--                              <ul class="ft-link">-->
<!--                                  <li class="active">-->
<!--                                      <a href="javascript:;">-->
<!--                                          <i class="fa fa-bars"></i>-->
<!--                                          Sales-->
<!--                                      </a>-->
<!--                                  </li>-->
<!--                                  <li>-->
<!--                                      <a href="javascript:;">-->
<!--                                          <i class=" fa fa-calendar-o"></i>-->
<!--                                          promo-->
<!--                                      </a>-->
<!--                                  </li>-->
<!--                                  <li>-->
<!--                                      <a href="javascript:;">-->
<!--                                          <i class=" fa fa-camera"></i>-->
<!--                                          photo-->
<!--                                      </a>-->
<!--                                  </li>-->
<!--                                  <li>-->
<!--                                      <a href="javascript:;">-->
<!--                                          <i class=" fa fa-circle"></i>-->
<!--                                          other-->
<!--                                      </a>-->
<!--                                  </li>-->
<!--                              </ul>-->
<!--                          </div>-->
<!--                      </section>-->
                      <!--features carousel end-->
<!--                  </div>-->
              </div>
              <div class="row">
                  <div class="col-lg-8">
                      <!--latest product info start-->
<!--                      <section class="panel post-wrap pro-box">-->
<!--                          <aside>-->
<!--                              <div class="post-info">-->
<!--                                  <span class="arrow-pro right"></span>-->
<!--                                  <div class="panel-body">-->
<!--                                      <h1><strong>popular</strong> <br> Brand of this week</h1>-->
<!--                                      <div class="desk yellow">-->
<!--                                          <h3>Dimond Ring</h3>-->
<!--                                          <p>Lorem ipsum dolor set amet lorem ipsum dolor set amet ipsum dolor set amet</p>-->
<!--                                      </div>-->
<!--                                      <div class="post-btn">-->
<!--                                          <a href="javascript:;">-->
<!--                                              <i class="fa fa-chevron-circle-left"></i>-->
<!--                                          </a>-->
<!--                                          <a href="javascript:;">-->
<!--                                              <i class="fa fa-chevron-circle-right"></i>-->
<!--                                          </a>-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </aside>-->
<!--                          <aside class="post-highlight yellow v-align">-->
<!--                              <div class="panel-body text-center">-->
<!--                                  <div class="pro-thumb">-->
<!--                                      <img src="img/ring.jpg" alt="">-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </aside>-->
<!--                      </section>-->
                      <!--latest product info end-->
                      <!--twitter feedback start-->
<!--                      <section class="panel post-wrap pro-box">-->
<!--                          <aside class="post-highlight terques v-align">-->
<!--                              <div class="panel-body">-->
<!--                                  <h2>Flatlab is new model of admin dashboard <a href="javascript:;"> http://demo.com/</a> 4 days ago  by jonathan smith</h2>-->
<!--                              </div>-->
<!--                          </aside>-->
<!--                          <aside>-->
<!--                              <div class="post-info">-->
<!--                                  <span class="arrow-pro left"></span>-->
<!--                                  <div class="panel-body">-->
<!--                                      <div class="text-center twite">-->
<!--                                          <h1>Twitter Feed</h1>-->
<!--                                      </div>-->
<!---->
<!--                                      <footer class="social-footer">-->
<!--                                          <ul>-->
<!--                                              <li>-->
<!--                                                  <a href="#">-->
<!--                                                    <i class="fa fa-facebook"></i>-->
<!--                                                  </a>-->
<!--                                              </li>-->
<!--                                              <li class="active">-->
<!--                                                  <a href="#">-->
<!--                                                      <i class="fa fa-twitter"></i>-->
<!--                                                  </a>-->
<!--                                              </li>-->
<!--                                              <li>-->
<!--                                                  <a href="#">-->
<!--                                                      <i class="fa fa-google-plus"></i>-->
<!--                                                  </a>-->
<!--                                              </li>-->
<!--                                              <li>-->
<!--                                                  <a href="#">-->
<!--                                                      <i class="fa fa-pinterest"></i>-->
<!--                                                  </a>-->
<!--                                              </li>-->
<!--                                          </ul>-->
<!--                                      </footer>-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </aside>-->
<!--                      </section>-->
                      <!--twitter feedback end-->
                  </div>
                  <div class="col-lg-4 ">
                      <div class="row">
<!--                          <div class="col-xs-6">-->
                              <!--pie chart start-->
<!--                              <section class="panel">-->
<!--                                  <div class="panel-body">-->
<!--                                      <div class="chart">-->
<!--                                          <div id="pie-chart" ></div>-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                                  <footer class="pie-foot">-->
<!--                                      Free: 260GB-->
<!--                                  </footer>-->
<!--                              </section>-->
                              <!--pie chart start-->
<!--                          </div>-->
                          <div class="col-xs-6 dl1089" >
                              <!--follower start-->
                              <section class="panel">
                                  <div class="follower">
                                      <?php
                                      $adminIdGet=$_SESSION['id'];
                                      $nameNeed=$A->Query("SELECT * FROM admin WHERE id='$adminIdGet'");
                                      $FetchAdminGet=$A->FetchAssoc($nameNeed);
                                      ?>
                                      <div class="panel-body">
                                          <h4><?php echo $FetchAdminGet['Name'].''.$FetchAdminGet['LastName']?></h4>
                                          <div class="follow-ava">
                                              <img src="img/follower-avatar.jpg" alt="">
                                          </div>
                                      </div>
                                  </div>

                                  <footer class="follower-foot">
                                      <ul>
                                          <li>
                                              <h5>
                                                  </h5>
                                              <p>سطح دسترسی</p>
                                          </li>
                                          <li>
                                              <h5></h5>
                                              <p>  <?php if ($FetchAdminGet['Level'] == 1) {
                                                      echo 'مدیر ارشد';
                                                  } elseif ($FetchAdminGet['Level'] == 2){
                                                      echo 'مدیر میانی';
                                                  }
                                                  elseif ($FetchAdminGet['Level'] == 3){
                                                      echo 'کارمند';
                                                  }
                                                  elseif ($FetchAdminGet['Level'] == 4){
                                                      echo 'حسابدار';
                                                  }?></p>
                                          </li>
                                      </ul>
                                  </footer>
                              </section>
                              <!--follower end-->
                          </div>
                      </div>
                      <!--weather statement start-->
<!--                      <section class="panel">-->
<!--                          <div class="weather-bg">-->
<!--                              <div class="panel-body">-->
<!--                                  <div class="row">-->
<!--                                      <div class="col-xs-6">-->
<!--                                        <i class="fa fa-cloud"></i>-->
<!--                                          California-->
<!--                                      </div>-->
<!--                                      <div class="col-xs-6">-->
<!--                                          <div class="degree">-->
<!--                                              24°-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                              </div>-->
<!--                          </div>-->
<!---->
<!--                          <footer class="weather-category">-->
<!--                              <ul>-->
<!--                                  <li class="active">-->
<!--                                      <h5>humidity</h5>-->
<!--                                      56%-->
<!--                                  </li>-->
<!--                                  <li>-->
<!--                                      <h5>precip</h5>-->
<!--                                      1.50 in-->
<!--                                  </li>-->
<!--                                  <li>-->
<!--                                      <h5>winds</h5>-->
<!--                                      10 mph-->
<!--                                  </li>-->
<!--                              </ul>-->
<!--                          </footer>-->
<!---->
<!--                      </section>-->
                      <!--weather statement end-->
                  </div>
              </div>

          </section>
      </section>
      <!--main content end-->

      <!-- Right Slidebar start -->
      <div class="sb-slidebar sb-right sb-style-overlay">
          <h5 class="side-title">Online Customers</h5>
          <ul class="quick-chat-list">
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar2.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>John Doe</strong>
                          <small>Dream Land, AU</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-important">3</span>
                          </div>
                          <strong>Jonathan Smith</strong>
                          <small>United States</small>
                      </div>
                  </div><!-- media -->
              </li>

              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/pro-ac-1.png" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-success">5</span>
                          </div>
                          <strong>Jane Doe</strong>
                          <small>ABC, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/avatar1.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>Anjelina Joli</strong>
                          <small>Fockland, UK</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/mail-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-warning">7</span>
                          </div>
                          <strong>Mr Tasi</strong>
                          <small>Dream Land, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
          </ul>
          <h5 class="side-title"> pending Task</h5>
          <ul class="p-task tasks-bar">
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">40%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">40% Complete (success)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Database Update</div>
                          <div class="percent">60%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">60% Complete (warning)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Iphone Development</div>
                          <div class="percent">87%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                              <span class="sr-only">87% Complete</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Mobile App</div>
                          <div class="percent">33%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">33% Complete (danger)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">45%</div>
                      </div>
                      <div class="progress progress-striped active">
                          <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar">
                              <span class="sr-only">45% Complete</span>
                          </div>
                      </div>

                  </a>
              </li>
              <li class="external">
                  <a href="#">See All Tasks</a>
              </li>
          </ul>
      </div>
      <!-- Right Slidebar end -->
      <?php
      include "footer.php";
      ?>

  </section>
  <?php
  include "js link.php";
  ?>
  </body>
</html>
