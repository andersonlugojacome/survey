<!--/**
 * ChecklistsquestionsData short summary.
 *
 * ChecklistsquestionsData description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */-->
<?php

if (isset($_GET['checklist'])) {
    $surveylists_id = $_GET['checklist'];
} else {
    $surveylists_id = 0;
}

?>


<!--This page plugins -->
<script src="/themes/spanishasap/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/themes/spanishasap/dist/js/pages/datatable/custom-datatable.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Survey question list <i class="mdi mdi-menu"></i></h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Lists of question</li>
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
                    <h6 class="card-subtitle">List question survey</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="./?view=adminnewsurveylist" class="btn btn-primary">
                                <i class="mdi mdi-new-box"></i> New survey</a>
                            <a href="./?view=adminaddquestiontosurvey" class="btn btn-primary">
                                <i class="mdi mdi-autorenew"></i> Add quetion to survey</a>
                            <a href="./?view=adminsurveylists" class="btn btn-primary">
                                <i class="mdi mdi-eye-outline"></i> See list of surveys
                            </a>
                            <a href="./?view=adminquestionlist" class="btn btn-primary">
                                <i class="mdi mdi-eye"></i> See list of questions
                            </a>

                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group is-filled">
                                <label for="ddllists" class="bmd-label-floating">Chose to survey</label>
                                <select id="ddllists" name="ddllists" class="custom-select" onchange="location = this.options[this.selectedIndex].value;" required>
                                    <option value="./?view=adminquestionlist&checklist=0">--- CHOOSE ---</option>
                                    <?php foreach (SurveylistsData::getAll() as $list) : ?>
                                        <option value="./?view=adminquestionlist&checklist=<?= $list->id; ?>" <?= ($list->id ==
                                                                                                                    $surveylists_id) ? "selected" : ""; ?>>
                                            <?= $list->name . ": " . $list->description; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $record_per_page = 10;
                            $result = SurveylistsquestionData::getAllNumRowQuestionToList($surveylists_id);
                            $total_records = count($result);
                            if (count($result) > 0) {
                            ?>
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" style="width:100%">

                                        <thead>
                                            <tr>
                                                <th>Position</th>
                                                <th>Question</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Create</th>
                                                <th>User</th>
                                                <th>Options</th>

                                            </tr>
                                        </thead>
                                        <?php foreach ($result as $cq) {
                                            $user = UserData::getById($cq->user_id);
                                            $color = $cq->q_status; ?>
                                            <tr data-background-color-approval="<?= ($color == " off") ? 'no-approval' : ''; ?>">
                                                <td>
                                                    <?= $cq->position; ?>
                                                </td>
                                                <td>
                                                    <?php $question = $cq->question;
                                                    echo substr($question, 0, 100);
                                                    echo ($question != "") ? "..." : ""; ?>
                                                </td>
                                                <td>
                                                    <?= substr($cq->description, 0, 50);
                                                    echo ($cq->description != "") ? "..." : ""; ?>
                                                </td>
                                                <td>
                                                    <?= $cq->surveylists_id; ?>
                                                </td>
                                                <td>
                                                    <?= $cq->created_at; ?>
                                                </td>
                                                <td>
                                                    <?= $user->name ?>
                                                </td>
                                                <td style="width:150px;" class="td-actions">
                                                    <a href="./?view=admineditquestiontolist&id=<?= $cq->id; ?>&checklist=<?= $cq->surveylists_id; ?>" data-toggle="tooltip" title="Editar" class="btn btn-success btn-round">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a> |
                                                    <a href="./?view=adminaddquestiontolistclone&id=<?= $cq->id; ?>" data-toggle="tooltip" title="Clonar pregunta" class="btn btn-warning btn-round">
                                                        <i class="material-icons">toll</i>
                                                    </a> |
                                                    <?php
                                                    $u = UserData::getById(Session::getUID());
                                                    if ($u->is_admin) :
                                                    ?>
                                                        <a href="./?action=delquestionchecklist&id=<?= $cq->id; ?>" data-toggle="tooltip" title="Eliminar" class="btn btn-danger btn-round">
                                                            <i class="ti-pencil-alt"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                </td>

                                            </tr>
                                        <?php
                                        } ?>
                                    </table>
                                </div>

                                <div class="form-group">
                                    Total registros:
                                    <?= $total_records ?>
                                </div>

                            <?php
                            } else {
                                echo "<p class='alert alert-danger'>There are no questions in the selected survey lists.</p>";
                            }
                            ?>
                        </div>
                    </div>

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

<script language="javascript">
    $(document).ready(function() {
        $('#datatables').DataTable();
    });
</script>