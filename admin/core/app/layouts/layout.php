<?php $user = Util::current_user();
$categories = CategoryMenuData::get_base_categories();

if (isset($_GET['view'])) {
    if (($_GET['view'] != "fechafirmapublico") && ($_GET['view'] != "consultatramite") && ($_GET['view'] != "processlogin") && ($_GET['view'] != "consultatramiteresultado") && ($_GET['view'] != "emailsuccess") && ($_GET['view'] != "emailto")) {
        Session::getLogin();
    }
}
?>

<!doctype html>
<html lang="es-co">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        <?php if (!empty($page_title)) {
            echo Util::remove_junk($page_title);
        } elseif (!empty($user)) {
            echo ucfirst($user->name);
        } else {
            echo "Content management system TEP";
        } ?>
    </title>
    <link rel="apple-touch-icon" sizes="57x57" href="../themes/TEP/img/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="../themes/TEP/img/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="../themes/TEP/img/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="../themes/TEP/img/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="../themes/TEP/img/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="../themes/TEP/img/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="../themes/TEP/img/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="../themes/TEP/img/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="../themes/TEP/img/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="../themes/TEP/img/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="../themes/TEP/img/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../themes/TEP/img/favicon-16x16.png" />
    <link rel="manifest" href="../themes/TEP/img/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="../themes/TEP/img/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />

    <!-- This page plugin CSS -->
    <link href="/themes/spanishasap/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/themes/spanishasap/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/themes/spanishasap/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/themes/spanishasap/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/themes/spanishasap/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="/themes/spanishasap/dist/js/app.min.js"></script>
    <script src="/themes/spanishasap/dist/js/app.init.overlay.js"></script>
    <script src="/themes/spanishasap/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/themes/spanishasap/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/themes/spanishasap/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="/themes/spanishasap/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/themes/spanishasap/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/themes/spanishasap/dist/js/custom.min.js"></script>

    </script>
</head>

<body class="">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <?php

    if (!empty($user)) : $fullname = $user->name . " " . $user->lastname;
        $name = $user->name;
        $gender = $user->gender;
    ?>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-header">
                        <!-- This is for the sidebar toggle which is visible on mobile only -->
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        <a class="navbar-brand" href="/">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="/themes/spanishasap/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="/themes/spanishasap/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="/themes/spanishasap/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="/themes/spanishasap/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Toggle which is visible on mobile only -->
                        <!-- ============================================================== -->
                        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto float-left">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <li class="nav-item d-none d-md-block search-box"> <a class="nav-link d-none d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                                <form class="app-search">
                                    <input type="text" class="form-control" placeholder="Search & enter">
                                    <a class="srh-btn"><i class="ti-close"></i></a>
                                </form>
                            </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav float-right">
                            <!-- ============================================================== -->
                            <!-- Comment -->
                            <!-- ============================================================== -->
                            <!--<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                    <ul class="list-style-none">
                                        <li>
                                            <div class="border-bottom rounded-top py-3 px-4">
                                                <h5 class="mb-0 font-weight-medium">Notifications</h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="message-center notifications position-relative" style="height:50px;">
                                                 Message 
                                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                    <span class="btn btn-danger rounded-circle btn-circle"><i class="fa fa-link"></i></span>
                                                    <div class="w-75 d-inline-block v-middle pl-2">
                                                        <h5 class="message-title mb-0 mt-1">Luanch Admin</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                            see the my new admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link border-top text-center text-dark pt-3" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->
                            <!-- ============================================================== -->
                            <!-- End Comment -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->
                            <!--  <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>
                                <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                    <ul class="list-style-none">
                                        <li>
                                            <div class="border-bottom rounded-top py-3 px-4">
                                                <h5 class="font-weight-medium mb-0">You have 4 new messages</h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="message-center message-body position-relative" style="height:50px;">
                                               Message 
                                                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                    <span class="user-img position-relative d-inline-block"> <img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle w-100"> <span class="profile-status rounded-circle online"></span> </span>
                                                    <div class="w-75 d-inline-block v-middle pl-2">
                                                        <h5 class="message-title mb-0 mt-1">Pavan kumar</h5> <span class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                            see the my admin!</span> <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                    </div>
                                                </a>

                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link border-top text-center text-dark pt-3" href="javascript:void(0);"> <b>See all e-Mails</b> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->
                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= ($gender == '1') ? '<img src="../themes/TEP/img/male.png" alt="user" width="30" class="profile-pic rounded-circle"  />' : '<img src="../themes/TEP/img/female.png" alt="user" width="30" class="profile-pic rounded-circle" />' ?>
                                </a>
                                <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                    <ul class="dropdown-user list-style-none">
                                        <li>
                                            <div class="dw-user-box p-3 d-flex">
                                                <div class="u-img">
                                                    <?= ($gender == '1') ? '<img src="../themes/TEP/img/male.png" alt="user" class="rounded" width="80" />' : '<img src="../themes/TEP/img/female.png" alt="user" class="rounded" width="80"/>' ?>
                                                </div>
                                                <div class="u-text ml-2">
                                                    <h4 class="mb-0"><?= $name ?></h4>
                                                    <p class="text-muted mb-1 font-14"><?= $user->email ?></p>
                                                    <a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm text-white d-inline-block">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li role="separator" class="dropdown-divider"></li>
                                        <li class="user-list"><a class="px-3 py-2" href="#"><i class="ti-user"></i> My
                                                Profile</a></li>
                                        <li class="user-list"><a class="px-3 py-2" href="#"><i class="ti-wallet"></i> My
                                                Balance</a></li>
                                        <li class="user-list"><a class="px-3 py-2" href="#"><i class="ti-email"></i>
                                                Inbox</a></li>
                                        <li role="separator" class="dropdown-divider"></li>
                                        <li class="user-list"><a class="px-3 py-2" href="#"><i class="ti-settings"></i>
                                                Account Setting</a></li>
                                        <li role="separator" class="dropdown-divider"></li>
                                        <li class="user-list"><a class="px-3 py-2" href="#"><i class="fa fa-power-off"></i>
                                                Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- Language -->
                            <!-- ============================================================== 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                                <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                            </li>-->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- User profile -->
                    <div class="user-profile position-relative" style="background: url(/themes/spanishasap/assets/images/background/user-info.jpg) no-repeat;">
                        <!-- User profile image -->
                        <div class="profile-img">
                            <?= ($gender == '1') ? '<img src="../themes/TEP/img/male.png" alt="user" alt="user" class="w-100"  />' : '<img src="../themes/TEP/img/female.png" alt="user" alt="user" class="w-100" />' ?>
                        </div>
                        <!-- User profile text-->
                        <div class="profile-text pt-1">
                            <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?= $name ?></a>
                            <div class="dropdown-menu animated flipInY">
                                <a href="#" class="dropdown-item"><i class="ti-user"></i>
                                    My Profile</a>
                                <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My
                                    Balance</a>
                                <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User profile text-->

                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Menu</span>
                            </li>
                            <?php if (count($categories) > 0) : ?>
                                <ul class="nav">
                                    <?php foreach ($categories as $cat) : $view_id = CategoryMenuData::isUserGroupCategoryMenu($cat->id, $user->user_level);
                                        if ($user->user_level == $view_id) : ?>
                                            <li class="sidebar-item">
                                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                                    <i class="mdi <?= $cat->icon; ?>"></i>
                                                    <span class="hide-menu"><?= $cat->name; ?> </span>
                                                </a>
                                                <?php CategoryMenuData::list_tree_cat_id_user($cat->id); ?>
                                        <?php
                                        endif;
                                    endforeach; ?>
                                            </li>
                                </ul>
                            <?php else : ?>
                                <p class="alert alert-danger">No menu created</p>
                            <?php endif; ?>


                            <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">Extra</span></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../../Documentation/document.html" aria-expanded="false"><i class="mdi mdi-content-paste"></i><span class="hide-menu">Documentation</span></a>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="logout.php" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
                <!-- Bottom points-->
                <div class="sidebar-footer">
                    <!-- item-->
                    <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                    <!-- item-->
                    <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                    <!-- item-->
                    <a href="logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                </div>
                <!-- End Bottom points-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <?php View::load("login"); ?>

                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer">
                    Spanish ASAP - Since 2014
                    ©2019 - All rights reserved.
                    Developed by <a href="https://digitalesweb.tech" target="_blank">
                        <strong>digitalesweb.tech</strong></a></p>
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->

    <?php
    else : View::load("login");
    endif; ?>


</body>
<style>
    .page-titles {
        background: #273c99;
    }

    .breadcrumb-item.active {
        color: #fff;
    }

    .page-titles .text-themecolor {
        color: #8cc63e;
    }
</style>

</html>