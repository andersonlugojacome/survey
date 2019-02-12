<?php

/**
 * controlofprocess short summary.
 *
 * controlofprocess description.
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

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Customers survey</h4>
        <p class="card-category">Customer</p>
    </div>
    <div class="card-body">
        <div class="card-title">
            <!-- Session comments -->
            <?= Util::display_msg(Session::$msg);?>
            <!-- End session comments-->
            <span class="badge badge-notify notification"></span>
            <hr />
            <form class="form-horizontal" role="form">
                <input type="hidden" name="view" value="customersurvey" />
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group bmd-form-group has-success">
                            <label for="start_at" class="bmd-label-floating">
                                Start</label>
                            <input type="text" name="start_at" id="start_at" class="form-control datepicker-here"
                                data-timepicker="true" data-date-format="yyyy-mm-dd" data-time-format="hh:ii"
                                placeholder="" value="<?=$start_at?>">
                            <span class="form-control-feedback">
                                <i class="material-icons">calendar_today</i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group bmd-form-group has-success">
                            <label for="finish_at" class="bmd-label-floating">
                                End</label>
                            <input type="text" name="finish_at" id="finish_at" class="form-control datepicker-here"
                                data-timepicker="true" data-date-format="yyyy-mm-dd" data-time-format="hh:ii"
                                placeholder="" value="<?=$now;?>">
                            <span class="form-control-feedback">
                                <i class="material-icons">calendar_today</i>
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <button class="btn btn-primary btn-block">
                            <i class="material-icons">done</i> Procesar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                $result = SurveylistsanswerData::getAllNumRowAnswerToListCustomer();
                if (count($result) > 0) :
                    ?>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                        width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nro. proyect</th>
                                <th>Year</th>
                                <th>Date of creation</th>
                                <th>Assigned</th>
                                <th class="disabled-sorting text-right">Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <?php
                else:
                    echo "<p class='alert alert-danger'>No survey.</p>";
                endif;
                ?>
            </div>
        </div>
    </div>
</div>


<script language="javascript">
$(document).ready(function() {
    var $url =
        '<?="./?action=searchcustomersurvey&start_at=".$start_at."&finish_at=".$now;?>';
    $('#datatables').DataTable({
        "processing": true,
        "ajax": {
            "url": $url,
            "dataSrc": "",
            "type": "GET"
        },
        "columns": [{
                "data": "pn"
            },
            {
                "data": "pn_anho"
            },

            {
                "data": "created_at"
            },
            {
                "data": "usuarioSolicitud"
            }, {
                "data": "options"
            }
        ],
        "columnDefs": [{
            className: "text-right",
            "targets": [4]
        }],
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
                    columns: [0, 1, 2, 3]
                }
            }
        ],
        language: {
            buttons: {
                print: 'Imprimir'
            },
            search: "_INPUT_",
            searchPlaceholder: "Buscar...",
        }
    });
    var table = $('#datatables').DataTable();
    table.order([1, 'desc']).draw();
    $('.card .material-datatables label').addClass('form-group');




});
</script>