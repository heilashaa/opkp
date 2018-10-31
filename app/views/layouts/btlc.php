<!doctype html>
<html class="no-js" lang="ru">
<head>
    <meta charset="utf-8"> <!--todo окно сообщений-->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OPKP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/srtdash/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="/srtdash/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/srtdash/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/srtdash/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/srtdash/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/srtdash/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/srtdash/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="/srtdash/assets/css/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="/srtdash/assets/css/typography.css">
    <link rel="stylesheet" href="/srtdash/assets/css/default-css.css">
    <link rel="stylesheet" href="/srtdash/assets/css/styles.css">
    <link rel="stylesheet" href="/srtdash/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="/srtdash/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="/srtdash/assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <? new \app\widgets\menu\Menu([
                                'cache' => 0,
                            ]);?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                    <span>2</span>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                    <div class="nofity-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                                <div class="dropdown-menu notify-box nt-enveloper-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                    <div class="nofity-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img1.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img2.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">When you can connect with me...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img3.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">I missed you so much...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img4.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Your product is completely Ready...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img2.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img1.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="assets/images/author/author-img3.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>Aglae Mayer</p>
                                                <span class="msg">Hey I am waiting for you...</span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">OPKP</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="/">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">

                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- dismiss alert area start -- todo добавить вывод из сессии-->
                <? if(isset($_SESSION['message'])):?>
                    <div class="alert-dismiss mt-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fa fa-exclamation-circle"></i> Attention!</strong> <?=$_SESSION['message'];?>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                        </div>
                    </div>
                    <div class="alert-dismiss mt-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><i class="fa fa-exclamation-circle"></i> Attention!</strong> <?=$_SESSION['message'];?>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                        </div>
                    </div>
                    <? unset($_SESSION['message']);?>
                <? endif;?>
                <!-- dismiss alert area end -->
                <?=$content;?>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© All right reserved. Power by heilash_a_a</p>
                <? if(DEBUG):?>
                <div class="debug-panel block">
                    <p class="alert-danger">
                        <?php
                        $logs = \R::getDatabaseAdapter()->getDatabase()->getLogger();
                        btlc\libs\Debug::arr($logs->grep('SELECT'));
                        ?>
                    </p>
                </div>
                <?endif;?>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- jquery latest version -->
    <script src="/srtdash/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="/srtdash/assets/js/popper.min.js"></script>
    <script src="/srtdash/assets/js/bootstrap.min.js"></script>
    <script src="/srtdash/assets/js/owl.carousel.min.js"></script>
    <script src="/srtdash/assets/js/metisMenu.min.js"></script>
    <script src="/srtdash/assets/js/jquery.slimscroll.min.js"></script>
    <script src="/srtdash/assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="/srtdash/assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="/srtdash/assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="/srtdash/assets/js/plugins.js"></script>
    <script src="/srtdash/assets/js/scripts.js"></script>
</body>
</html>