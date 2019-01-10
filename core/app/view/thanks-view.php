<?php

?>

<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Thanks</h1>

<div class="panel panel-default">
<div class="panel-heading">Thanks</div>
<div class="panel-body">

  <!-- Session comments -->
  <?php if (isset($_GET['msg'])) :    ?>
                <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Nota:</strong>
                    <?php echo $_GET['msg']?>
                </div>
                <?php endif; ?>
                <div class="row">
                <div class="col–md–12">
                <?= $_SESSION['body']
                ?>
                </div>
                </div>
 <a href="/" class="btn btn-default">
                    <i class='fas fa-paperclip'></i> Inicio
                </a>

</div>
</div>

</div>
</div>
</div>
<br><br><br><br>