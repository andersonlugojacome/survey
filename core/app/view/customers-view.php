<?php
/**
*
* @version 1.0
* @author DigitalesWeb
*/
//$pn = $_GET['pn'];
//$pn = "1";
$surveylists_id = "11";
$anho = date('Y');
$questions = SurveylistsquestionData::getAllQuestionsOn("open", $surveylists_id);

$pnu= "";
$c= "";
if (isset($_GET["pn"])) {
    $pnu = $_GET["pn"];
}
if (isset($_GET["c"])) {
    $c = $_GET["c"];
}
    ?>
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title"><strong>We want to hear from you!</strong> <i class="material-icons">import_contacts</i>
        </h4>
        <p class="card-category">Whenever you want us to know something about a
            specific translation, you can use this tool to send a message <strong>directly</strong> to
            our QA Department. Your feedback is very important to us, as it helps us to improve the
            quality of our work. Thank you for your participation!</p>
    </div>
    <div class="card-body">
        <div class="card-title">
        </div>
        <form class="" method="post" id="addsurveycustomer" action="./?action=addsurveyanswercustomer" role="form">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pn" class="bmd-label-floating">Project number</label>
                        <input type="text" class="form-control" id="pn" name="pn" value="<?=$pnu;?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nameTEP" class="bmd-label-floating">Company name</label>
                        <input type="text" class="form-control" id="nameTEP" name="nameTEP" value="<?= $c?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
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
                            <td style="vertical-align: middle;" colspan='<?= $q_format!="tip"?"":"2";?>'>
                                <?php echo $display_number; ?>.
                                <?php echo $question1; ?>.
                                <input type="hidden" name="qid[]" id="qid[]"
                                    value='<?php echo $surveylistsquestions_id; ?>'>
                                <input type="hidden" name="<?='q_'.$surveylistsquestions_id; ?>"
                                    id='<?="q_".$surveylistsquestions_id; ?>' value="<?= $question1; ?>">
                            </td>
                            <?php if ($q_format!="tip") :?>

                            <td>
                                <?php
          if ($q_format=="radio") {
              echo Util::generateRadioButtonsRate(
                  "question_".$surveylistsquestions_id."_answer",
                                        $num_input
                                        );
          } else {
              if ($q_format=="textarea") {
                  echo Util::generateTextAreaRate("question_".$surveylistsquestions_id."_answer", $num_input);
              } else {
                  if ($q_format=="text") {
                      echo Util::generateTextRate(
                          "question_".$surveylistsquestions_id."_answer",
                          "",
                          $q_format
                      );
                  }
              }
          } ?>
                            </td>
                            <?php endif;?>
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

    </div>
</div>


<style>
#form p {
    text-align: center;
}

#form label {
    font-size: 20px;
}

input[type="radio"],
.navbar-toggle {
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