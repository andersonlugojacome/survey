<!--
Este es el layout principal, a partir de este layout o plantilla se muestran el resto de "vistas"
-->
<!doctype html>
<html lang="es-co">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>spanishasap.com</title>

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
    <!-- Custom CSS -->
    <link href="/themes/spanishasap/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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

                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#">
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
                    </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                     
                     

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <?php View::load("index"); ?>

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
   
    <!--Custom JavaScript -->
    <script src="/themes/spanishasap/dist/js/custom.min.js"></script>
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