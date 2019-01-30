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
 $answers = SurveylistsanswerData::getAllAnswers($numeroescriturapublica, $anho, $surveylists_id);
$display_number = 1;
?>

<table class="table">
    <tr>
        <td><img src="/themes/TEP/css/images/logo.gif" alt="TEP" style="width: 70px;" /></td>
        <td align="center">NOTARIA SESENTA Y DOS (62) DEL CIRCULO DE BOGOTA CARLOS ARTURO SERRATO GALEANO</td>
    </tr>
    <tr>
        <td colspan="2">Reporte de control porceso de la la escritura publica: <strong> <?php echo $caux->numeroescriturapublica;?></strong>
            del a&ntilde;o: <strong><?php echo $anho;?></strong> ,
            con lista de control proceso: <strong><?php echo $list->name.": ".$list->description;?></strong>,
            numero de aprobaci&oacute;n: <strong><?php echo $caux->a_code_approval;?>
            </strong></td>
    </tr>
</table>


<table class="table">
    <thead class="report-header">
        <tr>
            <th>Pregunta</th>
            <th>Si</th>
            <th>No</th>
        </tr>
    </thead>
    <?php foreach ($answers as $key => $value) {
    $question = SurveylistsquestionData::getById($value->clq_id);
    $cla_id=$value->cla_id;
    $question1 = $question->question;
    $description = $question->description;
    $checklistsquestions_id = $question->id; ?>
    <tr>
        <td>
            <?php echo $display_number; ?>. <?php echo $question1; ?>.
            <input type="hidden" name="aid[]" id="aid[]" value='<?php echo $cla_id; ?>'>
        </td>
        <td class="col-md-1">
            <label><input readonly type="radio" name="question<?php echo $cla_id; ?>_answer"
                    value="1" <?php if ($value->respuesta== "1") {
        echo "checked";
    } ?>
                required></label>
        </td>
        <td class="col-md-1">
            <label><input readonly type="radio" name="question<?php echo $cla_id; ?>_answer"
                    value="0" <?php if ($value->respuesta== "0") {
        echo "checked";
    } ?>></label>
        </td>
    </tr>
    <?php $display_number++;
} ?>
</table>

<script type="text/javascript">
    var document_focus = false; // var we use to monitor document focused status.
    // Now our event handlers.
    $(document).focus(function() {
        document_focus = true;
    });
    $(document).ready(function() {
        window.print();
    });
    setInterval(function() {
        if (document_focus === true) {
            window.close();
        }
    }, 500);
</script>
<style>
    .table>thead>tr>th,
    .table>tbody>tr>th,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        border: 1px solid #ccc;
    }

    .sidebar,
    .footer,
    nav {
        display: none;
    }

    .main-panel {
        float: none;
        width: 100%;
    }

    body {
        background-color: #fff;
    }

    .main-panel>.content {
        margin-top: 0px;
        padding: 0px;
        min-height: 100%;
    }
</style>