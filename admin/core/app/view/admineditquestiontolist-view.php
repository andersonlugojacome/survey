<?php

/**
 * admineditquestiontolist short summary.
 *
 * adminaeditquestiontolist description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */
$checklistquestion = SurveylistsquestionData::getById($_GET["id"]);
$surveylists_id = $_GET["checklist"];

?>



<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Edit question <i class="ti-help"></i></h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Edit question</li>
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
                    <h6 class="card-subtitle">Edit question</h6>

                    <form class="" method="post" id="updatechecklistquestion" action="./?action=updatechecklistquestion" role="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ddllists" class="bmd-label-floating">Choose survey</label>
                                    <select id="ddllists" name="ddllists" class="form-control" required>
                                        <?php foreach (SurveylistsData::getAll() as $list) : ?>
                                            <option value="<?= $list->id; ?>" <?= ($list->id == $surveylists_id) ? "selected" : ""; ?>>
                                                <?= $list->name . ": " . $list->description; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="question" class="bmd-label-floating">Question</label>
                                    <textarea name="question" id="question" class="form-control" rows="3" cols="20" required><?= $checklistquestion->question; ?></textarea>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description" class="bmd-label-floating">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" cols="20"><?= $checklistquestion->description; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="linkpdf" class="bmd-label-floating">Link PDF</label>
                                    <input type="text" name="linkpdf" id="linkpdf" class="form-control" value="<?= $checklistquestion->linkpdf; ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="position" class="bmd-label-floating">Posiction</label>
                                    <input type="number" min="1" max="300" class="form-control" id="position" name="position" value="<?= $checklistquestion->position; ?>" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group bmd-form-group is-filled">
                                    <label for="ddllquestionstatus" class="bmd-label-floating">Status</label>
                                    <select id="ddllquestionstatus" name="ddllquestionstatus" class="custom-select" required>
                                        <option value="on" <?php if ($checklistquestion->q_status == 'on') : echo "selected";
                                                            endif; ?>>Activo</option>
                                        <option value="off" <?php if ($checklistquestion->q_status == 'off') : echo "selected";
                                                            endif; ?>>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <input type="hidden" name="id" id="id" value="<?= $_GET['id']; ?>" />
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button class="btn btn-dark hBack" type="button"><i class="ti-back-left"></i> Back</button>
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