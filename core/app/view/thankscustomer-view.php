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
            <?php if (isset($_GET['msg'])):    ?>
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Nota:</strong>
                <?php echo $_GET['msg'] ?>
            </div>
            <?php endif; ?>
        </div>

        <form class="" method="post" id="addsurveycustomer" action="./?action=sendemailcustomerscontact" role="form">
            <div class="row">
                <div class="col-12">
                    <p>
                        This information will be used by our QA Department internally. If you want us to
                        contact you on this specific job, please click <a
                            href="mailto:customerfeedback@spanishasap.com">here</a>.</p>
                    <p> You may also write directly to <a
                            href="mailto:customerfeedback@spanishasap.com">customerfeedback@spanishasap.com</a>
                        to let us know your concerns.</p>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <p>
                        Please choose how you would like us to contact you:
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                        <label for="name" class="bmd-label-floating">
                            Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                        <label for="email" class="bmd-label-floating">
                            Email address</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                        <label for="phone" class="bmd-label-floating">
                            Phone number</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>