<?php

/**
 * adminaddquestiontolist short summary.
 *
 * adminaddquestiontolist description.
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
        <h3 class="text-themecolor mb-0">Survey list <i class="mdi mdi-menu"></i></h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Add question to list</li>
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
                    <h6 class="card-subtitle">Survey</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="./?view=adminnewsurveylist" class="btn btn-primary">
                                <i class="mdi mdi-new-box"></i> New survey</a>
                            <a href="./?view=adminaddquestiontosurvey" class="btn btn-primary">
                                <i class="mdi mdi-autorenew"></i> Add quetion to survey</a>
                            <a href="./?view=adminsurveylists" class="btn btn-primary">
                                <i class="mdi mdi-eye-outline"></i> See list of surveys</a>
                            <a href="./?view=adminquestionlist" class="btn btn-primary">
                                <i class="mdi mdi-eye"></i> See list of questions</a>
                        </div>
                    </div>
                    <hr />


                    <form class="form-horizontal" method="post" id="addlist" action="./?action=addsurveylistquestion" role="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group is-filled">
                                    <label for="ddllists" class="bmd-label-floating">Choose to survey</label>
                                    <select id="ddllists" name="ddllists" class="custom-select" required>
                                        <?php foreach (SurveylistsData::getAll() as $list) : ?>
                                            <option value="<?= $list->id; ?>">
                                                <?= $list->name . ": " . $list->description; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="question" class="bmd-label-floating">Question</label>
                                    <textarea name="question" id="question" class="form-control" rows="3" cols="20" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description" class="bmd-label-floating">Descripion</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" cols="20"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="linkpdf" class="bmd-label-floating">link PDF</label>
                                    <input type="text" name="linkpdf" id="linkpdf" class="form-control" />

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="position" class="bmd-label-floating">Position</label>
                                    <input type="number" min="1" max="300" class="form-control" id="position" name="position" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group bmd-form-group is-filled">
                                    <label for="" class="bmd-label-floating">Status</label>
                                    <select id="ddllquestionstatus" name="ddllquestionstatus" class="custom-select" required>
                                        <option value="on">Active</option>
                                        <option value="off" selected>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group bmd-form-group is-filled">
                                    <label for="" class="bmd-label-floating">Format</label>
                                    <select id="q_format" name="q_format" class="custom-select" required>
                                        <option value="radio" selected>radio</option>
                                        <option value="textarea">textarea</option>
                                        <option value="tip">tips</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group bmd-form-group is-filled">
                                    <label for="" class="bmd-label-floating">Num input</label>
                                    <input type="number" min="1" max="300" class="form-control" id="num_input" name="num_input" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Create question</button>
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