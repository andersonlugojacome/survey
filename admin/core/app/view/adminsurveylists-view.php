<?php

/**
 *  short summary.
 *
 *  description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */

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
    $start_at = date('Y\-m\-d\ H:i', strtotime("-1 month", $finish_at));
}

?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Survey list <i class="mdi mdi-menu"></i></h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Lists</li>
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
                            <a href="./?view=newadminsurveylists" class="btn btn-primary">
                                <i class="mdi mdi-new-box"></i> New survey</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form">
                                <input type="hidden" name="view" value="adminsurveylists" />
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group has-success">
                                            <label for="start_at" class="bmd-label-floating">
                                                Start date</label>
                                            <input type="text" name="start_at" id="start_at" class="form-control datepicker-here" data-timepicker="true" data-date-format="yyyy-mm-dd" data-time-format="hh:ii" placeholder="" value="<?= $start_at ?>">
                                            <span class="form-control-feedback">
                                                <i class="mdi mdi-calendar-range"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group has-success">
                                            <label for="finish_at" class="bmd-label-floating">
                                                End date</label>
                                            <input type="text" name="finish_at" id="finish_at" class="form-control datepicker-here" data-timepicker="true" data-date-format="yyyy-mm-dd" data-time-format="hh:ii" placeholder="" value="<?= $now; ?>">
                                            <span class="form-control-feedback">
                                                <i class="mdi mdi-calendar-range"></i>
                                            </span>
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
                            $result = SurveylistsData::getAllNumRow();
                            if (count($result) > 0) {
                            ?>
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>User_ID</th>
                                                <th>Fecha creacion</th>
                                                <th>Status</th>
                                                <th class="disabled-sorting text-right">Opciones</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            <?php
                            } else {
                                echo "<p class='alert alert-danger'>No hay listas de chequeo creadas.</p>";
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
            "<?= "./?action=searchsurveylist&start_at=" . $start_at . "&finish_at=" . $now; ?>";

        $('#datatables').DataTable({
            "ajax": {
                "url": $url,
                "dataSrc": "",
                "type": "GET"
            },
            "columns": [{
                    "data": "name"
                },
                {
                    "data": "description"
                },

                {
                    "data": "created_at"
                },
                {
                    "data": "user_id"
                },

                {
                    "data": "surveylist_status"
                },
                {
                    "data": "options"
                }
            ],
            "columnDefs": [{
                className: "text-right",
                "targets": [4, 4]
            }],
            "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                if ($('td:eq(2)', nRow).text() != "") {
                    $('td:eq(2)', nRow).addClass('class_edit');
                }


                return nRow;
            },
            "bProcessing": true,
            "pagingType": "full_numbers",
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"]
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