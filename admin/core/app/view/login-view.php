<?php

if (Session::getUID() != "") {
    Core::redir("./?view=home", false);
} ?>

<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../assets/images/background/login-register.jpg) no-repeat center center; background-size: cover;">
    <div class="auth-box p-4 bg-white rounded">
        <div id="loginform">
            <div class="logo">
                <h3 class="box-title mb-3">Sign In</h3>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal mt-3 form-material" id="loginform" role="form" method="post" action="./?view=processlogin">
                        <div class="form-group mb-3">
                            <div class="">
                                <input class="form-control" id="mail" name="mail" type="text" required="" placeholder="Username"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="">
                                <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password"> </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <div class="checkbox checkbox-info pt-0">
                                    <input id="checkbox-signup" type="checkbox" class="material-inputs chk-col-indigo">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div>
                                <div class="ml-auto">
                                    <a href="javascript:void(0)" id="to-recover" class="text-muted float-right"><i class="fa fa-lock mr-1"></i> Forgot pwd?</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center mt-4">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>


                    </form>
                    <?php if (isset($_COOKIE['password_updated'])) : ?>
                        <div class="alert alert-success alert-with-icon" data-notify="container">
                            <i class="material-icons" data-notify="icon">notifications</i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
                            <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                            <span data-notify="message">
                                The password has been changed successfully!
                            </span>
                        </div>
                    <?php setcookie("password_updated", "", time() - 18600);
                    endif; ?>
                    <?php if (isset($_COOKIE['loginInvalid'])) : ?>
                        <div class="alert alert-danger alert-with-icon" data-notify="container">
                            <i class="material-icons" data-notify="icon">notifications</i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
                            <span data-notify="icon" class="now-ui-icons ui-1_bell-53"></span>
                            <span data-notify="message">
                                Username and / or incorrect password.
                            </span>
                        </div>
                    <?php setcookie("loginInvalid", "", time() - 18600);
                    endif; ?>
                </div>
            </div>
        </div>
        <div id="recoverform">
            <div class="logo">
                <h3 class="font-weight-medium mb-3">Recover Password</h3>
                <span class="text-muted">Enter your Email and instructions will be sent to you!</span>
            </div>
            <div class="row mt-3 form-material">
                <!-- Form -->
                <form class="col-12" action="index.html">
                    <!-- email -->
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="email" required="" placeholder="Username">
                        </div>
                    </div>
                    <!-- pwd -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-block btn-lg btn-primary text-uppercase" type="submit" name="action">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>