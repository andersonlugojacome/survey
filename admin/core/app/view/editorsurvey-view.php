<?php

/**
 * controlofprocess short summary.
 *
 * controlofprocess description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */
?>

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Editor survey list</h4>
        <p class="card-category">Editor survey list</p>
    </div>
    <div class="card-body">
        <div class="card-title">
            <!-- Session comments -->
            <?= Util::display_msg(Session::$msg);?>
            <!-- End session comments-->
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                $result = SurveylistsanswerData::getAllNumRowAnswerToList();
                $total_records = count($result);
                if (count($total_records) > 0) {
                    ?>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                        width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nro. proyect</th>
                                <th>Year</th>
                                <th>Status</th>
                                <th>Date of creation</th>
                                <th>Assigned</th>
                                <th class="disabled-sorting text-right">Options</th>
                            </tr>
                        </thead>
                        <?php foreach ($result as $cla) {
                        $user = UserData::getById($cla->user_id);
                        //$client = ClientData::getById($cla->client_id);
                        $color= $cla->a_code_approval; ?>

                        <tr data-background-color-approval="<?=($color!="")? 'approval': 'no-approval'; ?>">
                            <td>
                                <?=$cla->pn; ?>
                            </td>
                            <td>
                                <?=$cla->pn_anho; ?>
                            </td>
                            <td>
                                <?=$cla->a_code_approval; ?>
                            </td>
                            <td>
                                <?=$cla->created_at; ?>
                            </td>
                            <td>
                                <?= $cla->nameTEP ?>
                            </td>

                            <td class="text-right">
                                <input type="hidden" name="id" id="id" value="<?=$cla->pn; ?>" />
                                <a onclick="openWindowsPrint('./?view=print&nep=<?=$cla->pn; ?>&anho=<?=$cla->pn_anho; ?>&idcp=<?=$cla->id; ?>&surveylists_id=<?=$cla->surveylists_id; ?>')"
                                    data-toggle="tooltip" title="Download"
                                    class="btn btn-link btn-info btn-just-icon btn-sm print">
                                    <i class="material-icons">print</i>
                                </a>
                                <?php
                              $u = UserData::getById(Session::getUID());
                        if ($u->is_admin):
                            ?>
                                <a href="./?view=edit&nep=<?=$cla->pn; ?>&anho=<?=$cla->pn_anho; ?>&idcp=<?=$cla->id; ?>&surveylists_id=<?=$cla->surveylists_id; ?>"
                                    data-toggle="tooltip" title="Edit"
                                    class="btn btn-link btn-warning btn-just-icon btn-sm edit">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="./?action=admindelchecklists&id=<?=$cla->id; ?>" data-toggle="tooltip"
                                    title="Delete" class="btn btn-link btn-danger btn-just-icon btn-sm remove">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php
                    } ?>
                    </table>
                </div>
                <?php
                } else {
                    echo "<p class='alert alert-danger'>There are no survey created.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar...",
        }
    });

    $('.card .material-datatables label').addClass('form-group');
});

function openWindowsPrint($url) {
    var newWindow = window.open($url, 'Reporte',
        'width=700,height=700,location=no,menubar=no,scrollbars=no,resizable=no,left=200px'); //replace with your url
    newWindow.focus(); //Sets focus window
}
</script>