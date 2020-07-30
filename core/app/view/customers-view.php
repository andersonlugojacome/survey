<?php

/**
 *
 * @version 1.0
 * @author DigitalesWeb
 */
//$pn = $_GET['pn'];
//$pn = "1";

Util::ch_title("We want to hear from you!");
$surveylists_id = "11";
$anho = date('Y');
$questions = SurveylistsquestionData::getAllQuestionsOn("open", $surveylists_id);

$pnu = "";
$c = "";
if (isset($_GET["pn"])) {
    $pnu = $_GET["pn"];
}
if (isset($_GET["c"])) {
    $c = $_GET["c"];
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
        <h3 class="text-themecolor mb-0">Survey</h3>
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
                    <h4 class="card-title">We want to hear from you!</h4>
                    <h6 class="card-subtitle">Whenever you want us to know something about a
                        specific translation, you can use this tool to send a message <strong>directly</strong> to
                        our QA Department. Your feedback is very important to us, as it helps us to improve the
                        quality of our work. Thank you for your participation!</h6>

                    <form class="needs-validation" novalidate method="post" id="addsurveycustomer" action="./?action=addsurveyanswercustomer" role="form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pn" class="bmd-label-floating">Project number</label>
                                    <input type="text" class="form-control" id="pn" name="pn" value="<?= $pnu; ?>" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="nameTEP" class="bmd-label-floating">Company name</label>
                                    <input type="text" class="form-control" id="nameTEP" name="nameTEP" value="<?= $c ?>" autocomplete="off" required>
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
                                        $q_format = $value->q_format;
                                        $question1 = $value->pregunta;
                                        $description = $value->description;
                                        $surveylistsquestions_id = $value->clq_id;
                                        $linkpdf = $value->linkpdf;
                                        $q_format = $value->q_format;
                                        $num_input = $value->num_input;
                                        $requiredoption = $value->requiredoption;
                                    
                                        $created_at = new DateTime($value->created_at);
                                    ?>
                                        <tr data-background-color-approval="">
                                            <td style="vertical-align: middle;" colspan='<?= $q_format != "tip" ? "" : "2"; ?>'>
                                                <?= ($q_format != "tip") ? $display_number : ""; ?>.
                                                <?php echo $question1; ?>
                                                <input type="hidden" name="qid[]" id="qid[]" value='<?php echo $surveylistsquestions_id; ?>'>
                                                <input type="hidden" name="<?= 'q_' . $surveylistsquestions_id; ?>" id='<?= "q_" . $surveylistsquestions_id; ?>' value="<?= $question1; ?>">
                                            </td>
                                            <?php if ($q_format != "tip") : ?>

                                                <td>
                                            
                                                    <?php
                                                   
                                                    if ($q_format == "radio") {
                                                       
                                                        echo Util::generateRadioButtonsRate("question_" . $surveylistsquestions_id . "_answer", $num_input, $requiredoption);
                                                        
                                                    } else {
                                                        if ($q_format == "textarea") {
                                                            echo Util::generateTextAreaRate("question_" . $surveylistsquestions_id . "_answer", $num_input);
                                                        } else {
                                                            if ($q_format == "text") {
                                                                echo Util::generateTextRate(
                                                                    "question_" . $surveylistsquestions_id . "_answer",
                                                                    "",
                                                                    $q_format
                                                                );
                                                            }
                                                        }
                                                    } ?>
                                                </td>
                                            <?php $display_number++;
                                            endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
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
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);

})();

</script>