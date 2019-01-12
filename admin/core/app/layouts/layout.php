<?php $user = Util::current_user();
    if (isset($_GET['view'])) {
        if (($_GET['view']!="fechafirmapublico")&&($_GET['view']!="consultatramite")&&($_GET['view']!="processlogin")&&($_GET['view']!="consultatramiteresultado")&&($_GET['view']!="emailsuccess")&&($_GET['view']!="emailto")) {
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
    <title><?php if (!empty($page_title)) {
    echo Util::remove_junk($page_title);
} elseif (!empty($user)) {
    echo ucfirst($user->name);
} else {
    echo "Sistema de administrador de contenido TEP del circulo de Bogotá";
}?>
    </title>
    <link rel="apple-touch-icon" sizes="57x57" href="themes/TEP/img/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="themes/TEP/img/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="themes/TEP/img/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="themes/TEP/img/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="themes/TEP/img/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="themes/TEP/img/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="themes/TEP/img/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="themes/TEP/img/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="themes/TEP/img/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="themes/TEP/img/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="themes/TEP/img/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="themes/TEP/img/favicon-16x16.png" />
    <link rel="manifest" href="themes/TEP/img/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="themes/TEP/img/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="themes/TEP/css/material-dashboard-v=2.0.1.css">
    <link rel="stylesheet" href="themes/TEP/css/material-dashboard-print.css" media="print" />

    <!--   Core JS Files   -->
    <script src="themes/TEP/js/core/jquery.min.js"></script>
    <script src="themes/TEP/js/core/popper.min.js"></script>
    <script src="themes/TEP/js/bootstrap-material-design.js"></script>
    <script src="themes/TEP/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="themes/TEP/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker 
    <script src="themes/TEP/js/plugins/bootstrap-datetimepicker.min.js"></script>-->
    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ 
    <script src="themes/TEP/js/plugins/nouislider.min.js"></script>-->
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="themes/TEP/js/plugins/bootstrap-selectpicker.js"></script>
    <!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
    <script src="themes/TEP/js/plugins/bootstrap-tagsinput.js"></script>
    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="themes/TEP/js/plugins/jasny-bootstrap.min.js"></script>
    <!-- Plugins for presentation and navigation  -->
    <script src="themes/TEP/assets-for-demo/js/modernizr.js"></script>
    <script src="themes/TEP/assets-for-demo/js/vertical-nav.js"></script>
    <!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="themes/TEP/js/material-dashboard-v=2.0.1.js"></script>
    <!-- Dashboard scripts -->
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="themes/TEP/js/plugins/arrive.min.js" type="text/javascript"></script>
    <!-- Forms Validations Plugin -->
    <script src="themes/TEP/js/plugins/jquery.validate.min.js"></script>
    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="themes/TEP/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
    <script src="themes/TEP/js/plugins/bootstrap-notify.js"></script>
    <!--    Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
    <script src="themes/TEP/js/plugins/nouislider.min.js"></script>
    <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="themes/TEP/js/plugins/jquery.select-bootstrap.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/   -->
    <script src="themes/TEP/js/plugins/datatables.min.js"></script>
    <!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
    <script src="themes/TEP/js/plugins/sweetalert2.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="themes/TEP/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="themes/TEP/js/plugins/fullcalendar.min.js"></script>

    <link rel="stylesheet" href="themes/TEP/css/datepicker.min.css">
    <script src="themes/TEP/js/plugins/datepicker.min.js"></script>
    <script src="themes/TEP/js/plugins/datepicker.es.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
</head>

<body class="">
    <?php if (count($user)>0):
        $fullname = $user->name." ".$user->lastname;
        $name = $user->name;
        $gender = $user->gender;
        ?>
    <div class="wrapper">
        <div class="sidebar" data-color="rose" data-background-color="white" data-image="themes/TEP/img/sidebar-1.jpg">
            <div class="logo">
                <a href="./" class="simple-text logo-mini">
                    62
                </a>
                <a href="/" class="simple-text logo-normal">
                    <img src="themes/TEP/img/logo.png" alt="TEP" height="40" width="40" />
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <?= ($gender=='1')?'<img src="themes/TEP/img/male.png" />':'<img src="themes/TEP/img/female.png" />'?>
                    </div>
                    <div class="user-info">
                        <a data-toggle="collapse" href="#collapseuser" class="username">
                            <span>
                                <?=$name ?>
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="collapse" id="collapseuser">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini">MP</span>
                                        <span class="sidebar-normal">Mi perfil </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini">EP</span>
                                        <span class="sidebar-normal">Editar perfil </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=configuration">
                                        <span class="sidebar-mini"><i class="material-icons">security</i></span>
                                        <span class="sidebar-normal">Cambiar contrase&ntilde;a</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">
                                        <span class="sidebar-mini"><i class="material-icons">power_settings_new</i></span>
                                        <span class="sidebar-normal">Salir</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <?php if ($user->user_level== 1 || $user->user_level== 4):?>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#products-nav">
                            <i class="material-icons">tablet_android</i>
                            <p>Productos
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="products-nav">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=calendarrents">
                                        <span class="sidebar-mini"><i class="material-icons">home</i></span>
                                        Inicio
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=rent">
                                        <span class="sidebar-mini"><i class="material-icons">device_hub</i></span>
                                        <span class="sidebar-normal">Prestamo</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=rents">
                                        <span class="sidebar-mini"> <i class="material-icons">trending_up</i>
                                        </span>
                                        <span class="sidebar-normal"> Prestamos </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=books">
                                        <span class="sidebar-mini"> <i class="material-icons">timeline</i> </span>
                                        <span class="sidebar-normal"> Productos </span>
                                    </a>
                                </li>
                                <?php if ($user->user_level== 1 || $user->user_level== 4):?>
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=categories">
                                        <span class="sidebar-mini"> <i class="material-icons">category</i></span>
                                        <span class="sidebar-normal"> Categorias</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=editorials">
                                        <span class="sidebar-mini"> <i class="material-icons">compare</i></span>
                                        <span class="sidebar-normal"> Empresa</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=authors">
                                        <span class="sidebar-mini"> <i class="material-icons">home</i></span>
                                        <span class="sidebar-normal"> Creadores</span>
                                    </a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </li>
                    <?php endif;?>
                    <?php if ($user->user_level== 1 || $user->user_level== 4):?>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#controlofprocess-nav">
                            <i class="material-icons">control_point</i>
                            <p>Control maestro
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="controlofprocess-nav">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=newcontrolofprocess">
                                        <span class="sidebar-mini"> <i class="material-icons">add</i>
                                        </span>
                                        <span class="sidebar-normal"> Crear control maestro </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=controlofprocess">
                                        <span class="sidebar-mini"> <i class="material-icons">search</i> </span>
                                        <span class="sidebar-normal"> Busqueda control maestro </span>
                                    </a>
                                </li>
                                <?php if ($user->user_level ==1):?>
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=adminchecklists">
                                        <span class="sidebar-mini"> <i class="material-icons">settings</i></span>
                                        <span class="sidebar-normal"> Admin control maestro</span>
                                    </a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </li>
                    <?php endif;?>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#certificados-nav">
                            <i class="material-icons">control_camera</i>
                            <p>Control de certificados
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="certificados-nav">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=consecutivosderemisiones">
                                        <span class="sidebar-mini"> <i class="material-icons">local_offer</i>
                                        </span>
                                        <span class="sidebar-normal">Consecutivo remisiones </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=consecutivosdecertificados">
                                        <span class="sidebar-mini"> <i class="material-icons">search</i> </span>
                                        <span class="sidebar-normal">Consecutivo certificados. </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#protocolo-nav">
                            <i class="material-icons">local_parking</i>
                            <p>Protocolo
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="protocolo-nav">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=newbeneficencia">
                                        <span class="sidebar-mini"> <i class="material-icons">get_app</i> </span>
                                        <span class="sidebar-normal"> Solicitar escritura </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=convertnumbertoword">
                                        <span class="sidebar-mini"> <i class="material-icons">local_convenience_store</i>
                                        </span>
                                        <span class="sidebar-normal"> Convertir n&uacute;meros a letras</span>
                                    </a>
                                </li>
                                <?php if ($user->user_level== 1 || $user->user_level== 4 || $user->user_level== 5):?>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=protocolocierres">
                                        <span class="sidebar-mini"> <i class="material-icons">cancel</i></span>
                                        <span class="sidebar-normal"> Cierres </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=beneficencia">
                                        <span class="sidebar-mini"> <i class="material-icons">search</i> </span>
                                        <span class="sidebar-normal"> Busqueda escritura </span>
                                    </a>
                                </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </li>
                    <?php if ($user->user_level== 1 || $user->user_level== 4 || $user->user_level== 6):?>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#bcs-nav">
                            <i class="material-icons">account_balance</i>
                            <p>BCS
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="bcs-nav">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=creatememorandum">
                                        <span class="sidebar-mini"> <i class="material-icons">add</i>
                                        </span>
                                        <span class="sidebar-normal"> Crear Minuta </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=memorandumcreated">
                                        <span class="sidebar-mini"> <i class="material-icons">search</i> </span>
                                        <span class="sidebar-normal"> Minuta creadas </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=checklistbcs">
                                        <span class="sidebar-mini"> <i class="material-icons">format_list_bulleted</i>
                                        </span>
                                        <span class="sidebar-normal"> Lista de chequeo </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=admintemplates">
                                        <span class="sidebar-mini"> <i class="material-icons">assignment</i> </span>
                                        <span class="sidebar-normal"> Administrador de plantillas </span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <?php endif;?>
                    <?php if ($user->user_level== 1 || $user->user_level== 4):?>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#setting-nav">
                            <i class="material-icons">settings_applications</i>
                            <p>Configuraci&oacute;n
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="setting-nav">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="./?view=reports">
                                        <span class="sidebar-mini"> <i class="material-icons">report</i> </span>
                                        <span class="sidebar-normal"> Reportes </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=users">
                                        <span class="sidebar-mini"> <i class="material-icons">people</i> </span>
                                        <span class="sidebar-normal"> Usuarios del sistema </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=clients">
                                        <span class="sidebar-mini"> <i class="material-icons">person</i> </span>
                                        <span class="sidebar-normal"> Empleados </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="./?view=usergroups">
                                        <span class="sidebar-mini"> <i class="material-icons">pan_tool</i> </span>
                                        <span class="sidebar-normal"> Permisos de usuarios </span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <?php endif;?>
                    <li class="nav-item">
                        <a class="nav-link" href="./?view=notarialprocedure">
                            <i class="material-icons">wallpaper</i>
                            <p> Consulta de tramite </p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="./">Sistema ADC de TEP</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Buscar..." />
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="./">
                                    <i class="material-icons">dashboard</i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="./" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="d-lg-none d-md-block">Some Actions</p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                    <a class="dropdown-item" href="#">Another Notification</a>
                                    <a class="dropdown-item" href="#">Another One</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="./" id="navbarDropdownProfile" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="logout.php"><i class="material-icons">power_settings_new</i>
                                        Salir</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">

                    <?php View::load("login"); ?>

                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="./?view=changelog">
                                    Log de cambios
                                </a>
                            </li>
                            <li>
                                <a href="//adc.notaria62bogota.com/" target="_blank">
                                    Notaria62 ADC
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        <a href="//adc.notaria62bogota.com" target="_blank">Notaria62 ADC</a>&copy; 2018
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <?php else:
        View::load("login");
    ?>
    <?php endif;?>
</body>

</html>