<?php

/**
 *
 * @version 1.0
 * @author DigitalesWeb
 */
//$pn = $_GET['pn'];
//$pn = "1";
$surveylists_id = "12";
$anho = date('Y');
$questions = SurveylistsquestionData::getAllQuestionsOn("open", $surveylists_id);
//$surveyanswers = SurveylistsanswerData::getByPN($pn, $anho);
//if (count($surveyanswers) <= 0) {
$allnameTEP =  SurveylistsanswerData::getAllnameTEP();
$text = "";
foreach ($allnameTEP as $key => $value) {
    $text .= "'" . $value->nameTEP . "',";
}

function generateRadioButtons($name, $values = 6)
{
    $o = '<div class="clasificacion">' . "\n";
    for ($v = $values; $v >= 1; $v--) {
        $o .= '<input required type="radio" id="' . $name . '_' . $v . '" name="' . $name . '" value="' . $v . '">';
        $o .= '<label for="' . $name . '_' . $v . '">&#9733;</label>';
    }
    $o .= '</div>' . "\n";
    return $o;
}
function generateTextArea($name, $values = 6)
{
    $o = '<div class="form-group">' . "\n";
    $o .= ' <textarea class="form-control" rows="' . $values . '" id="' . $name . '"name="' . $name . '"></textarea>';
    $o .= '</div>' . "\n";
    return $o;
}
?>
<style>
    label {
        color: grey;
    }

    input[type="radio"] {
        display: none;
    }

    input[type="radio"],
    input[type="checkbox"] {
        padding: 0;
    }

    .clasificacion {
        direction: rtl;
        unicode-bidi: bidi-override;
    }

    .clasificacion label {
        font-size: 20px;
    }



    label:hover,
    label:hover~label {
        color: orange;
    }

    input[type="radio"]:checked~label {
        color: orange;
    }

    [type="radio"]:not(:checked)+label::after,
    [type="radio"]:not(:checked)+label::before,
    [type="radio"]:checked+label::before,
    [type="radio"]:checked+label::after {
        border: none;
        display: none !important;
    }

    [type="radio"]:checked+label,
    [type="radio"]:not(:checked)+label {
        position: relative;
        padding-left: 2px;
        font-size: 20px;
    }


    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
    }

    .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>








<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h3 class="text-themecolor mb-0">Editor survey</h3>
        <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item active">Home</li>
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
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Editor survey</h4>
                    <h6 class="card-subtitle"></h6>

                    <form class="" method="post" id="addsurvey" action="./?action=addsurveyanswer" role="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pn" class="bmd-label-floating">N.° de job en Xtrf:</label>
                                    <input type="text" class="form-control" id="pn" name="pn" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="nameTEP" class="bmd-label-floating">Editor name</label>
                                    <input type="text" class="form-control" id="nameTEP" name="nameTEP" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title"><strong> Indicaciones: </strong>
                                    Indique en una escala de 1 a 5 estrellas, siendo 5 la mejor calificación y 1 la más baja, para ponderar el trabajo del editor en este proyecto en función de los indicadores de evaluación a continuación:
                                </h4>
                                <h6 class="card-subtitle"></h6>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Scale: 1=Nunca, 2=Casi nunca, 3=A veces, 4=Casi siempre, 5=Siempre.</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $display_number = 1;
                                    foreach ($questions as $key => $value) :
                                        $q_format = $value->q_format;
                                        $question1 = $value->pregunta;
                                        $description = $value->description;
                                        $surveylistsquestions_id = $value->clq_id;
                                        $description = $value->description;
                                        $linkpdf = $value->linkpdf;
                                        $q_format = $value->q_format;
                                        $num_input = $value->num_input;
                                        $created_at = new DateTime($value->created_at);
                                    ?>
                                        <tr data-background-color-approval="">
                                            <td>
                                                <?php echo $display_number; ?>.
                                                <?php echo $question1; ?>.
                                                <?php if (!empty($description) || (!empty($linkpdf))) :  ?>
                                                    <a href="" data-toggle="modal" data-target="#myModal-<?php echo $surveylistsquestions_id; ?>" title="<?php echo $description; ?>" class="btn-simple btn btn-danger btn-xs">
                                                        Ver m&aacute;s
                                                        <i class='fas fa-eye'></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal-<?php echo $surveylistsquestions_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="myModalLabel">Acotaci&oacute;n
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?= $description; ?>
                                                                    <?php if (!empty($linkpdf)) : ?>
                                                                        <object width="100%" height="350px" data="<?= $linkpdf; ?>#zoom=85" type="application/pdf" trusted="yes" application="yes"></object>
                                                                    <?php endif ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <input type="hidden" name="qid[]" id="qid[]" value='<?= $surveylistsquestions_id; ?>'>
                                                <input type="hidden" name="<?php echo "q_" . $surveylistsquestions_id; ?>" id="<?= "q_" . $surveylistsquestions_id; ?>" value='<?= $question1; ?>'>
                                            </td>
                                            <td>
                                                <?php
                                                if ($q_format == "radio") {
                                                    echo generateRadioButtons("question_" . $surveylistsquestions_id . "_answer", $num_input);
                                                } else {
                                                    if ($q_format == "textarea") {
                                                        echo generateTextArea("question_" . $surveylistsquestions_id . "_answer", $num_input);
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php $display_number++;
                                    endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="hidden" name="surveylists_id" id="surveylists_id" value="<?= $surveylists_id; ?>" />
                                <input type="hidden" name="pn_anho" id="pn_anho" value="<?= $anho; ?>" />
                                <button type="submit" class="btn btn-success">Send</button>
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


<script>
    $(document).ready(function() {
        //var availableTags = [ < ? php echo $text; ? > ];
        autocomplete(document.getElementById("nameTEP"), availableTags);
    });
</script>