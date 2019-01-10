<!--
Este es el layout principal, a partir de este layout o plantilla se muestran el resto de "vistas"
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <?=Html::title('LINGUISTIC SURVEY');?>
    <?=Html::link('res/bootstrap/css/bootstrap.css'); ?>
    <?=Html::link('res/font-awesome/css/fontawesome-all.min.css'); ?>
    <?=Html::script('res/js/jquery.min.js'); ?>
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
      <a class="navbar-brand" href="./"><img width="250" class="" src="http://spanishasap.com/wp-content/uploads/2017/03/Logo-spanish-ASAP-01-3.png" alt="LINGUISTIC SURVEY" ></a>
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
