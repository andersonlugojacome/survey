<!--
Este es el layout principal, a partir de este layout o plantilla se muestran el resto de "vistas"
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="57x57" href="./themes/TEP/img/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="./themes/TEP/img/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="./themes/TEP/img/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="./themes/TEP/img/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="./themes/TEP/img/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="./themes/TEP/img/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="./themes/TEP/img/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="./themes/TEP/img/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="./themes/TEP/img/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="./themes/TEP/img/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="./themes/TEP/img/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./themes/TEP/img/favicon-16x16.png" />
    <link rel="manifest" href="./themes/TEP/img/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="./themes/TEP/img/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./themes/TEP/css/material-dashboard-v=2.0.1.css">
    <link rel="stylesheet" href="./themes/TEP/css/material-dashboard-print.css" media="print" />

    <!--   Core JS Files   -->
    <script src="./themes/TEP/js/core/jquery.min.js"></script>
    <script src="./themes/TEP/js/core/popper.min.js"></script>
    <script src="./themes/TEP/js/bootstrap-material-design.js"></script>
    <script src="./themes/TEP/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="./themes/TEP/js/plugins/moment.min.js"></script>
    <!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="./themes/TEP/js/material-dashboard-v=2.0.1.js"></script>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img width="170" class=""
                            src="themes/TEP/img/Logo-spanish-ASAP-01-3.png" alt="SURVEY"></a>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <?php  View::load("index");?>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="text-muted text-center">Powered by <a href="http://www.digitalesweb.com/"
                        target="_blank">DigitalesWeb</a>
                    &copy; 2018</p>
            </div>
        </footer>
    </div>

</body>

</html>