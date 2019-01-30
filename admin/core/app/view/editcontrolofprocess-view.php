<?php

/**
 * newcontrolofprocess short summary.
 *
 * newcontrolofprocess description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */


$idcp = $_GET['idcp'];
$surveylists_id= $_GET['surveylists_id'];
$caux= SurveylistsanswerData::getById($idcp);
 $numeroescriturapublica = $caux->numeroescriturapublica;
 $anho = $caux->ep_anho;
 $list = SurveylistsData::getById($surveylists_id);
$answers = SurveylistsanswerData::getAllAnswersOn($numeroescriturapublica, $anho, $surveylists_id);

?>


<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Editando control de proceso</h4>
        <p class="card-category">Se edita el control proceso para una escritura</p>
    </div>
    <div class="card-body">
        <div class="card-title">
            <!-- Session comments -->
            <?= Util::display_msg(Session::$msg);?>
            <!-- End session comments-->
        </div>
        <div class="row">
            <div class="col-md-12">

                <form class="" method="post" id="updatecontrolofprocess" action="./?action=updatecontrolofprocess" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            Editando el control porceso de la la escritura publica:
                            <strong>
                                <?= $caux->numeroescriturapublica;?>
                            </strong> del a&ntilde;o:
                            <strong>
                                <?= $anho;?>
                            </strong> , con lista de control proceso:
                            <strong>
                                <?= $list->name.": ".$list->description;?>
                            </strong>
                        </div>
                    </div>
                    <hr />

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Pregunta</th>
                                <th>Si</th>
                                <th>No</th>
                            </tr>
                        </thead>
                        <?php
                        $display_number = 1;
    foreach ($answers as $key => $value) :
        $question = SurveylistsquestionData::getById($value->clq_id);
        $cla_id=$value->cla_id;
        $question1 = $question->question;
        $description = $question->description;
        $q_format= $question->q_format;
        $description = $question->description;
    
        $description = $question->description;
        $linkpdf = $question->linkpdf;
        $created_at = new DateTime($question->created_at);
        $today = new DateTime(NumeroALetras::getDatetimeNow());
        $diff =$created_at->diff($today); ?>
                        <tr data-background-color-approval="<?=($diff->days <= 30) ? " approval " : "
                                "; ?>">
                            <td>
                                <?=$display_number; ?>.
                                <?= $question1; ?>.
                                <?php if (!empty($description) || (!empty($linkpdf))) :  ?>
                                <a href="" data-toggle="modal" data-target="#myModal-<?=$cla_id; ?>"
                                    title="<?php echo $description; ?>"
                                    class="btn btn-info btn-rounds">
                                    Ver m&aacute;s
                                    <i class="material-icons">visibility</i>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal-<?= $cla_id; ?>"
                                    tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Acotaci&oacute;n</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?=$description; ?>
                                                <?php if (!empty($linkpdf)): ?>
                                                <object width="100%" height="350px" data="<?php echo $linkpdf; ?>#zoom=85"
                                                    type="application/pdf" trusted="yes" application="yes"></object>
                                                <?php endif?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <input type="hidden" name="aid[]" id="aid[]" value='<?= $cla_id; ?>'>
                            </td>

                            <td class="col-md-1">
                                <label>
                                    <input type="radio" name="question<?= $cla_id; ?>_answer"
                                        value="1" <?php
                                            if ($value->respuesta == 1): ?>
                                    checked = "checked"
                                    <?php endif; ?>required>
                                </label>
                            </td>
                            <td class="col-md-1">
                                <label>
                                    <input type="radio" name="question<?= $cla_id; ?>_answer"
                                        value="0" <?php
                                            if ($value->respuesta !=1): ?>
                                    checked = "checked"
                                    <?php endif; ?>>
                                </label>
                            </td>
                        </tr>
                        <?php $display_number++;
    endforeach; ?>
                    </table>



                    <div class="col-lg-offset-2 col-lg-10 ">
                        <button type="submit " class="btn btn-success ">Actualizar control proceso</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript ">
    $(document).ready(function() {

    });

    function justNumbers(e) {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
            return true;
        return /\d/.test(String.fromCharCode(keynum));
    }
</script>