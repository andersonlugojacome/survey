<?php

?>




<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Thank you for your feedback!</h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Thanks</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thanks</h4>
                    <h6 class="card-subtitle">
                        <!-- Session comments -->
                        <?php if (isset($_GET['msg'])) :    ?>
                            <div class="alert alert-info alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Note:</strong>
                                <?php echo $_GET['msg'] ?>
                            </div>
                        <?php endif; ?></h6>


                    <form method="post" id="addsurveycustomer" action="./?action=sendemailcustomerscontact" role="form" class="needs-validation" novalidate>
                     <div class="row">
                            <div class="col-12">
                                <p>
                                    This information will be used by our QA Department internally. If you want us to
                                    contact you on this specific job, please click <a href="mailto:customerfeedback@spanishasap.com">here</a>.</p>
                                <p> You may also write directly to <a href="mailto:customerfeedback@spanishasap.com">customerfeedback@spanishasap.com</a>
                                    to let us know your concerns.</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <p>
                                    Please choose how you would like us to contact you:
                                </p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control is-valid" id="name" name="name" placeholder="Name" autocomplete="nope" required />
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control is-valid" id="email" name="email"  placeholder="Email address" autocomplete="nope" required />
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="phone">Phone number</label>
                                <input type="text" class="form-control is-valid" id="phone" name="phone" placeholder="Phone number" autocomplete="nope" required />
                            </div>


                            <div class="col-md-3 mb-3">
                                <button type="submit" class="btn btn-success">Send</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>