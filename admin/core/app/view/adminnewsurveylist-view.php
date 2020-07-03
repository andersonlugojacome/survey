<?php

/**
 *  short summary.
 *
 *  description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */
?>


<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">New urvey <i class="mdi mdi-menu"></i></h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">New survey</li>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <!-- Session comments -->
                        <?= Util::display_msg(Session::$msg); ?>
                        <!-- End session comments-->
                    </div>
                    <h6 class="card-subtitle">New survey</h6>


                    <form class="form-horizontal" method="post" id="addsurveylist" action="./?action=addsurveylist" role="form">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mane" class="bmd-label-floating">Name survey</label>
                                    <input type="text" class="form-control" id="name" name="name" require />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="description" class="bmd-label-floating">description</label>
                                    <input type="text" class="form-control" id="description" name="description" require />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group bmd-form-group is-filled">
                                    <label for="ddlsurveylist_status" class="bmd-label-floating">Status</label>
                                    <select id="ddlsurveylist_status" name="ddlsurveylist_status" class="custom-select" required>
                                        <option value="open">Active</option>
                                        <option value="close">Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
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