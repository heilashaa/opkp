<!doctype html>
<html class="no-js" lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?=$this->getMeta();?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/images/favicon.ico">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/metisMenu.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/export.css">
    <link rel="stylesheet" href="/css/slicknav.min.css">
    <link rel="stylesheet" href="/css/typography.css">
    <link rel="stylesheet" href="/css/default-css.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/responsive.css">

</head>
<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <? if(!isset($_SESSION['employee'])):?>
        <?=$content;?>
    <? else:?>
        <!-- page container area start -->
        <div class="page-container">
            <!-- sidebar menu area start -->
            <div class="sidebar-menu">
                <div class="sidebar-header">
                    <div class="logo">
                        <a href="/"><img src="/images/icon/logo.png" alt="logo"></a>
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
                <? if(DEBUG):?>
                    <div class="container">
                        <div id="debager">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="alert-danger">
                                        <h4 class="header-title">DEBUG SQL QUERIES</h4>
                                        <p class="alert-danger">
                                            <?php
                                            $logs = \R::getDatabaseAdapter()->getDatabase()->getLogger();
                                            btlc\libs\Debug::arr($logs->grep('SELECT'));
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="alert-danger">
                                        <h4 class="header-title">POST</h4>
                                        <p class="alert-danger">
                                            <?=btlc\libs\Debug::arr($_POST);?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="alert-danger">
                                        <h4 class="header-title">GET</h4>
                                        <p class="alert-danger">
                                            <?=btlc\libs\Debug::arr($_GET);?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="alert-danger">
                                        <h4 class="header-title">SESSION</h4>
                                        <p class="alert-danger">
                                            <?=btlc\libs\Debug::arr($_SESSION);?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?endif;?>
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
<!--                                <form action="#">-->
<!--                                    <input type="text" name="search" placeholder="Search..." required>-->
<!--                                    <i class="ti-search"></i>-->
<!--                                </form>-->
                            </div>
                        </div>
                        <!-- profile info & task notification -->
                        <div class="col-md-6 col-sm-4 clearfix">
                            <ul class="notification-area pull-right">
<!--                                <li id="full-view"><i class="ti-fullscreen"></i></li>-->
<!--                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>-->
                                <li class="dropdown">
<!--                                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">-->
<!--                                        <span>2</span>-->
<!--                                    </i>-->
<!--                                    <div class="dropdown-menu bell-notify-box notify-box">-->
<!--                                        <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>-->
<!--                                        <div class="nofity-list">-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>You have Changed Your Password</p>-->
<!--                                                    <span>Just Now</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>New Commetns On Post</p>-->
<!--                                                    <span>30 Seconds ago</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>Some special like you</p>-->
<!--                                                    <span>Just Now</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>New Commetns On Post</p>-->
<!--                                                    <span>30 Seconds ago</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>Some special like you</p>-->
<!--                                                    <span>Just Now</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>You have Changed Your Password</p>-->
<!--                                                    <span>Just Now</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>You have Changed Your Password</p>-->
<!--                                                    <span>Just Now</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                </li>
                                <li class="dropdown">
<!--                                    <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>-->
<!--                                    <div class="dropdown-menu notify-box nt-enveloper-box">-->
<!--                                        <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>-->
<!--                                        <div class="nofity-list">-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb">-->
<!--                                                    <img src="assets/images/author/author-img1.jpg" alt="image">-->
<!--                                                </div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>Aglae Mayer</p>-->
<!--                                                    <span class="msg">Hey I am waiting for you...</span>-->
<!--                                                    <span>3:15 PM</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb">-->
<!--                                                    <img src="assets/images/author/author-img2.jpg" alt="image">-->
<!--                                                </div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>Aglae Mayer</p>-->
<!--                                                    <span class="msg">When you can connect with me...</span>-->
<!--                                                    <span>3:15 PM</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb">-->
<!--                                                    <img src="assets/images/author/author-img3.jpg" alt="image">-->
<!--                                                </div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>Aglae Mayer</p>-->
<!--                                                    <span class="msg">I missed you so much...</span>-->
<!--                                                    <span>3:15 PM</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb">-->
<!--                                                    <img src="assets/images/author/author-img4.jpg" alt="image">-->
<!--                                                </div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>Aglae Mayer</p>-->
<!--                                                    <span class="msg">Your product is completely Ready...</span>-->
<!--                                                    <span>3:15 PM</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb">-->
<!--                                                    <img src="assets/images/author/author-img2.jpg" alt="image">-->
<!--                                                </div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>Aglae Mayer</p>-->
<!--                                                    <span class="msg">Hey I am waiting for you...</span>-->
<!--                                                    <span>3:15 PM</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb">-->
<!--                                                    <img src="assets/images/author/author-img1.jpg" alt="image">-->
<!--                                                </div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>Aglae Mayer</p>-->
<!--                                                    <span class="msg">Hey I am waiting for you...</span>-->
<!--                                                    <span>3:15 PM</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                            <a href="#" class="notify-item">-->
<!--                                                <div class="notify-thumb">-->
<!--                                                    <img src="assets/images/author/author-img3.jpg" alt="image">-->
<!--                                                </div>-->
<!--                                                <div class="notify-text">-->
<!--                                                    <p>Aglae Mayer</p>-->
<!--                                                    <span class="msg">Hey I am waiting for you...</span>-->
<!--                                                    <span>3:15 PM</span>-->
<!--                                                </div>-->
<!--                                            </a>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                </li>
                                <li class="settings-btn">
                                    <a href="/employees/logout"><i class="fa fa-2x fa-sign-out"></i></a>
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
                                    <li><a href="<?=PATH;?>">Главная</a></li>
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
                    <? if(isset($_SESSION['msg'])):?>
                        <div class="alert-dismiss mt-3">
                            <div class="alert alert-<?=$_SESSION['msg']['result'];?> alert-dismissible fade show" role="alert">
                                <strong><i class="fa fa-exclamation-circle"></i> </strong> <?=$_SESSION['msg']['text'];?>.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                            </div>
                        </div>
                        <? unset($_SESSION['msg']);?>
                    <? endif;?>
                    <!-- dismiss alert area end -->
                    <?=$content;?>
                </div>
            </div>
            <!-- main content area end -->
            <!-- footer area start-->
            <footer>
                <div class="footer-area">
                    <p>© Приложение является собственностью ЦКП БТЛЦ</p>
                </div>
            </footer>
            <!-- footer area end-->
        </div>
    <?endif;?>
    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/metisMenu.min.js"></script>
    <script src="/js/jquery.slimscroll.min.js"></script>
    <script src="/js/jquery.slicknav.min.js"></script>
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
    <script src="/js/line-chart.js"></script>
    <script src="/js/pie-chart.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="/js/btlc-scripts.js"></script>
</body>
</html>
