<?php
$user_id = $_SESSION['id'];
$name=$A->Query("SELECT * FROM admin WHERE id='$user_id'");
$bla=mysqli_fetch_assoc($name);
?>
<header class="header white-bg">      <!--header start-->
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->
    <a href="index1.php" class="logo">صفحه ی <span>مدیریت</span></a>
    <!--logo end-->
    <div class="nav notify-row dll47" id="top_menu">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">

            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="img/avatar1_small.jpg">
                    <span class="username"><?php echo $bla['Name'].' '.$bla['LastName'] ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
<!--                    <li><a href="#"><i class=" icon-suitcase"></i>پروفایل</a></li>-->
<!--                    <li><a href="#"><i class="icon-cog"></i> تنظیمات</a></li>-->
                    <li><a href="logout.php"><i class="icon-key" ></i> خروج</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
<!--            <li class="dropdown">-->
<!--                <a data-toggle="dropdown" class="dropdown-toggle" href="#">-->
<!--                    <i class="fa fa-tasks"></i>-->
<!--                    <span class="badge bg-success">6</span>-->
<!--                </a>-->
<!--                <ul class="dropdown-menu extended tasks-bar">-->
<!--                    <div class="notify-arrow notify-arrow-green"></div>-->
<!--                    <li>-->
<!--                        <p class="green">You have 6 pending tasks</p>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <div class="task-info">-->
<!--                                <div class="desc">Dashboard v1.3</div>-->
<!--                                <div class="percent">40%</div>-->
<!--                            </div>-->
<!--                            <div class="progress progress-striped">-->
<!--                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">-->
<!--                                    <span class="sr-only">40% Complete (success)</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <div class="task-info">-->
<!--                                <div class="desc">Database Update</div>-->
<!--                                <div class="percent">60%</div>-->
<!--                            </div>-->
<!--                            <div class="progress progress-striped">-->
<!--                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">-->
<!--                                    <span class="sr-only">60% Complete (warning)</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <div class="task-info">-->
<!--                                <div class="desc">Iphone Development</div>-->
<!--                                <div class="percent">87%</div>-->
<!--                            </div>-->
<!--                            <div class="progress progress-striped">-->
<!--                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">-->
<!--                                    <span class="sr-only">87% Complete</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <div class="task-info">-->
<!--                                <div class="desc">Mobile App</div>-->
<!--                                <div class="percent">33%</div>-->
<!--                            </div>-->
<!--                            <div class="progress progress-striped">-->
<!--                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">-->
<!--                                    <span class="sr-only">33% Complete (danger)</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <div class="task-info">-->
<!--                                <div class="desc">Dashboard v1.3</div>-->
<!--                                <div class="percent">45%</div>-->
<!--                            </div>-->
<!--                            <div class="progress progress-striped active">-->
<!--                                <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">-->
<!--                                    <span class="sr-only">45% Complete</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="external">-->
<!--                        <a href="#">See All Tasks</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-envelope-o"></i>
                    <?php
                    $numGet=$A->Query("SELECT * FROM comments WHERE Status='1' ");
                    $numCmt=$A->Numros($numGet);
                    ?>
                    <span class="badge bg-important"><?php echo $numCmt?></span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-red"></div>
                    <li>
                        <p class="red">You have <?php echo $numCmt?> new messages</p>
                    </li>
                    <?php
                    $need = $A->Query("SELECT *,comments.id as cid,comments.Status as cst FROM comments,workers,user WHERE comments.workerId=workers.id AND comments.userId=user.id AND comments.Status='1' LIMIT 5 ");
                    while ($rowNeed = mysqli_fetch_assoc($need)){
                        ?>
                    <li>
                        <a href="Comment_Edit.php?id=<?php echo $rowNeed['cid'] ?>" target="_blank" >
                            <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                            <span class="subject">
                                    <span class="from"><?php echo $rowNeed['PhoneNumber']?></span>
                                    </span>
                            <span class="message">
                                        <?php echo $rowNeed['Comment']?>
                                    </span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="CommentFail_List.php">See all messages</a>
                    </li>
                </ul>
            </li>
            <!-- inbox dropdown end -->
            <!-- notification dropdown start-->
<!--            <li id="header_notification_bar" class="dropdown">-->
<!--                <a data-toggle="dropdown" class="dropdown-toggle" href="#">-->
<!---->
<!--                    <i class="fa fa-bell-o"></i>-->
<!--                    <span class="badge bg-warning">7</span>-->
<!--                </a>-->
<!--                <ul class="dropdown-menu extended notification">-->
<!--                    <div class="notify-arrow notify-arrow-yellow"></div>-->
<!--                    <li>-->
<!--                        <p class="yellow">You have 7 new notifications</p>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <span class="label label-danger"><i class="fa fa-bolt"></i></span>-->
<!--                            Server #3 overloaded.-->
<!--                            <span class="small italic">34 mins</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <span class="label label-warning"><i class="fa fa-bell"></i></span>-->
<!--                            Server #10 not respoding.-->
<!--                            <span class="small italic">1 Hours</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <span class="label label-danger"><i class="fa fa-bolt"></i></span>-->
<!--                            Database overloaded 24%.-->
<!--                            <span class="small italic">4 hrs</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <span class="label label-success"><i class="fa fa-plus"></i></span>-->
<!--                            New user registered.-->
<!--                            <span class="small italic">Just now</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">-->
<!--                            <span class="label label-info"><i class="fa fa-bullhorn"></i></span>-->
<!--                            Application error.-->
<!--                            <span class="small italic">10 mins</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">See all notifications</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
            <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
    </div>

</header>      <!--header end-->
