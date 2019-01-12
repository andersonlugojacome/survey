<!--
Este es el layout principal, a partir de este layout o plantilla se muestran el resto de "vistas"
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="57x57" href="themes/TEP//apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="themes/TEP//apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="themes/TEP//apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="themes/TEP//apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="themes/TEP//apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="themes/TEP//apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="themes/TEP//apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="themes/TEP//apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="themes/TEP//apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="themes/TEP//android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="themes/TEP//favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="themes/TEP//favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="themes/TEP//favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <?=Html::title('LINGUISTIC SURVEY');?>
    <?=Html::link('res/bootstrap/css/bootstrap.css'); ?>
    <?=Html::link('res/font-awesome/css/fontawesome-all.min.css'); ?>
    <?=Html::link('themes/survey/css/survey.css'); ?>
    <?=Html::script('res/js/jquery.min.js'); ?>
    <?=Html::script('themes/survey/js/util.js'); ?>
    
  </head>

  <body>
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./"><img width="250" class="" src="themes/survey/img/logo-tep.jpg" alt="LINGUISTIC SURVEY" ></a>
    </div>
  </div>
</nav>
<?php 
  View::load("index");
?>
<div class="container">
<div class="row">
<div class="col-md-12">
<br>
<hr>
<p class="text-muted text-center">Powered by <a href="http://DigitalesWeb.com/" target="_blank">DigitalesWeb</a> &copy; 2018</p>
</div>
</div>
</div>
<?= Html::script('res/bootstrap/js/bootstrap.min.js'); ?>
  </body>
</html>
