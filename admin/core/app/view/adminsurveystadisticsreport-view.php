<?php

/**
 * checklistbcs short summary.
 *
 * checklistbcs description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */

if (isset($_GET["surveyid"])) {
    $surveyId = $_GET["surveyid"];
} else {
    Core::redir("./?view=adminsurveylists");
}
$survey = SurveylistsData::getById($surveyId);
$surveyName = $survey->name;

if (isset($_GET["finish_at"])) {
    $finish_at = strtotime($_GET["finish_at"]);
    $now = $_GET["finish_at"];
} else {
    $finish_at = strtotime(Util::getDatetimeNow());
    $now = date('Y\-m\-d\ H:i', strtotime("+1 hour", strtotime(Util::getDatetimeNow())));
}
if (isset($_GET["start_at"])) {
    $start_at = $_GET["start_at"];
} else {
    $start_at = date('Y\-m\-d\ H:i', strtotime("-1 week", $finish_at));
}


?>







<!-- This Page CSS -->
<link rel="stylesheet" type="text/css" href="/themes/spanishasap/assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">

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

<!-- This Page JS -->
<link rel="stylesheet" href="/themes/spanishasap/assets/libs/datepicker/datepicker.min.css">
<script src="/themes/spanishasap/assets/libs/datepicker/datepicker.min.js"></script>
<script src="/themes/spanishasap/assets/libs/datepicker/datepicker.en-us.js"></script>


<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Survey stadistics <?=$surveyName?> <i class="mdi mdi-chart-bar"></i></h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Survey stadistics <?=$surveyName?></li>
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
                    <h6 class="card-subtitle">Survey stadistics <?=$surveyName?></h6>
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
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form">
                                <input type="hidden" name="view" value="adminsurveystadisticsreport" />
                                <input type="hidden" name="surveyid" value="<?= $surveyId ?>" />
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group has-success">

                                            <input type="text" name="start_at" id="start_at" class="form-control datepicker-here" data-timepicker="true" data-date-format="yyyy-mm-dd" data-time-format="hh:ii" placeholder="" value="<?= $start_at ?>">
                                            <label for="start_at" class="bmd-label-floating">
                                                Start date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group has-success">

                                            <input type="text" name="finish_at" id="finish_at" class="form-control datepicker-here" data-timepicker="true" data-date-format="yyyy-mm-dd" data-time-format="hh:ii" placeholder="" value="<?= $now; ?>">
                                            <label for="finish_at" class="bmd-label-floating">
                                                End date</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <button class="btn btn-primary btn-block">
                                            <i class="mdi mdi-keyboard-return"></i> Process
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $result = SurveylistsanswerData::getAllNumRowAnswerToList();
                            if (count($result) > 0) {
                            ?>
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>Rating total</th>
                                                <th>Num question</th>
                                                <th>average</th>
                                               
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            <?php
                            } else {
                                echo "<p class='alert alert-danger'>No found</p>";
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
<script>
    function openWindowsPrint($url) {
        var newWindow = window.open($url, 'Reporte',
            'width=700,height=700,location=no,menubar=no,scrollbars=no,resizable=no,left=200px'); //replace with your url
        newWindow.focus(); //Sets focus window
    }
</script>
<script language="javascript">
    $(document).ready(function() {
        var $url =
            "<?= "./?action=searchsurveyansweredreport&surveyid=" . $surveyId . "&start_at=" . $start_at . "&finish_at=" . $now; ?>";
        $('#datatables').DataTable({
            "ajax": {
                "url": $url,
                "dataSrc": "",
                "type": "GET"
            },
            "columns": [{
                    "data": "surveyquestion"
                },
                {
                    "data": "surveyanswer"
                },
                {
                    "data": "surveyquestioncount"
                },
                {
                    "data": "average"
                }
            ],
            "columnDefs": [{
                className: "text-center",
                "targets": [1,2,3]
            }],
            "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                //alert(aData.status);

                //alert($('td:eq(1)', nRow).text());
                //if ($('td:eq(2)', nRow).text() != "") {
                //    $('td:eq(2)', nRow).addClass('class_edit');
                //}


                return nRow;
            },
            "bProcessing": true,
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 15, 20, -1],
                [10, 15, 20, "All"]
            ],
            responsive: true,
            dom: 'lBfrtip',
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ],
            language: {
                buttons: {
                    print: 'Print'
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            }

        });

        var table = $('#datatables').DataTable();
        table.order([3, 'desc']).draw();
        $('.card .material-datatables label').addClass('form-group');

    });
</script>