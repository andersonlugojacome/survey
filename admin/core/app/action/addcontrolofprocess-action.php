<?php
/**
 * Addchecklistquestion short summary.
 *
 * Addchecklistquestion description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */
$counter = 0;
$count = count($_POST['qid']);
$codeAproval = "";
if ($count>0) {
    foreach ($_POST['qid'] as $key => $value) {
        if ($_POST['question'.$value.'_answer'] == 1) {
            # code...
            $counter++;
        }
        if ($counter == $count) {
            # code...
            $codeApproval=NumeroALetras::generarCodigo(10);
        }
    }
    //echo "El codigo de aprobacion es: ". $codeApproval;
    foreach ($_POST['qid'] as $key => $value) {
        $ca = new SurveylistsanswerData();
        $ca->numeroescriturapublica = $_POST['numeroescriturapublica'];
        $ca->answer= $_POST['question'.$value.'_answer'];
        $ca->checklistsquestions_id = $value;
        $ca->user_id= Session::getUID();
        $ca->ep_anho = $_POST['ep_anho'];
        $ca->surveylists_id = $_POST['surveylists_id'];
        $ca->client_id = $_POST['client_id'];
        $ca->a_code_approval = $codeApproval;
        $ca->add();
    }
    Seesion::msg("s", "Agregado correctamente.");
    Core::redir("./?view=controlofprocess");
} else {
    Seesion::msg("s", "Error al agregar, por favor llame al administrador del sistema.");
    Core::redir("./?view=controlofprocess");
}
