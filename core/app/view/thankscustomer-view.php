<?php

?>

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Thank you for your feedback! <i class="material-icons">accessibility_new</i></h4>
        <p class="card-category"></p>
    </div>
    <div class="card-body">
        <div class="card-title">
            <!-- Session comments -->
            <?php if (isset($_GET['msg'])) :    ?>
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Nota:</strong>
                <?php echo $_GET['msg']?>
            </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col–md–12">
                <p>
                    This information will be used by our QA Department internally. If you want us to
                    contact you on this specific job, please clic <a href="#">here</a>.</p>
                <p>You may also write directly to <a href="mailto:feedback@spanishasap.com">feedback@spanishasap.com</a>
                    to let us know your concerns.</p>
            </div>
        </div>


    </div>
</div>

</div>