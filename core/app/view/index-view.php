<?php
/**
*
* @version 1.0
* @author DigitalesWeb
*/
//$pn = $_GET['pn'];
//$pn = "1";
$surveylists_id = "1";
$anho = date('Y');
$questions = SurveylistsquestionData::getAllQuestionsOn("open", $surveylists_id);
//$surveyanswers = SurveylistsanswerData::getByPN($pn, $anho);
//if (count($surveyanswers) <= 0) {
    $allnameTEP =  SurveylistsanswerData::getAllnameTEP();
$text = "";
foreach ($allnameTEP as $key => $value) {
    $text .= "'".$value->nameTEP."',";
}
    ?>
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Linguistic survey <i class="material-icons">accessibility_new</i></h4>
        <p class="card-category"></p>
    </div>
    <div class="card-body">
        <div class="card-title">
        </div>
        <form class="" method="post" id="addsurvey" action="./?action=addsurveyanswer" role="form">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pn" class="bmd-label-floating">Project number:</label>
                        <input type="text" class="form-control" id="pn" name="pn" required>
                    </div>
                    <div class="form-group">
                        <label for="nameTEP" class="bmd-label-floating">Editor name</label>
                        <input type="text" class="form-control" id="nameTEP" name="nameTEP" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Linguistic</th>
                                <th>Scale: 1=bad, 3=Good, 5=Excelent.</th>
                            </tr>
                        </thead>
                        <?php
    $display_number = 1;
    foreach ($questions as $key => $value) :
    $q_format= $value->q_format;
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
                                <a href="" data-toggle="modal" data-target="#myModal-<?php echo $surveylistsquestions_id; ?>"
                                    title="<?php echo $description; ?>" class="btn-simple btn btn-danger btn-xs">
                                    Ver m&aacute;s
                                    <i class='fas fa-eye'></i>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal-<?php echo $surveylistsquestions_id; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Acotaci&oacute;n</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo $description; ?>
                                                <?php if (!empty($linkpdf)): ?>
                                                <object width="100%" height="350px" data="<?php echo $linkpdf; ?>#zoom=85"
                                                    type="application/pdf" trusted="yes" application="yes"></object>
                                                <?php endif?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <input type="hidden" name="qid[]" id="qid[]" value='<?php echo $surveylistsquestions_id; ?>'>
                                <input type="hidden" name="<?php echo " q_".$surveylistsquestions_id; ?>"
                                id="
                                <?php echo "q_".$surveylistsquestions_id; ?>"
                                value='
                                <?php echo $question1; ?>'>
                            </td>
                            <td>
                                <?php
          if ($q_format=="radio") {
              echo generateRadioButtons("question_".$surveylistsquestions_id."_answer", $num_input);
          } else {
              if ($q_format=="textarea") {
                  echo generateTextArea("question_".$surveylistsquestions_id."_answer", $num_input);
              }
          }
          ?>
                            </td>
                        </tr>
                        <?php $display_number++; endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <input type="hidden" name="surveylists_id" id="surveylists_id" value="<?=$surveylists_id; ?>" />
                    <input type="hidden" name="pn_anho" id="pn_anho" value="<?=$anho; ?>" />
                    <button type="submit" class="btn btn-success">Send</button>
                </div>
            </div>
        </form>

        <?php
// } else {
//         echo "<p class='alert alert-danger'>Survey number project: ".$_GET['pn']." del a&ntilde;o: ".$_GET['pn_anho']." ya esta creada. <a href='./?view='>Haga click para ver</a></p>";
//     }


    function generateRadioButtons($name, $values = 6)
    {
        $o = '<div class="clasificacion">' . "\n";
        for ($v = $values; $v >= 1; $v--) {
            $o.= '<input required type="radio" id="' . $name . '_'.$v.'" name="' . $name . '" value="' . $v . '">';
            $o.= '<label for="' . $name .'_'.$v.'">&#9733;</label>';
        }
        $o.= '</div>' . "\n";
        return $o;
    }
  function generateTextArea($name, $values = 6)
  {
      $o = '<div class="form-group">' . "\n";
      $o.= ' <textarea class="form-control" rows="'.$values.'" id="' . $name . '"name="' . $name . '"></textarea>';
      $o.= '</div>' . "\n";
      return $o;
  }
?>
    </div>
</div>
</div>



<style>
#form p {
    text-align: center;
}

#form label {
    font-size: 20px;
}

input[type="radio"] {
    display: none;
}

label {
    color: grey;
}

.clasificacion {
    direction: rtl;
    unicode-bidi: bidi-override;
}

label:hover,
label:hover~label {
    color: orange;
}

input[type="radio"]:checked~label {
    color: orange;
}
</style>
<script>
$(document).ready(function() {
    var availableTags = [<?php echo $text;?>];
    autocomplete(document.getElementById("nameTEP"), availableTags);
});
</script>