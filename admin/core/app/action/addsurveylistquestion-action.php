<?php
/**
 *  short summary.
 *
 *  description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */

if (count($_POST)>0) {
    $cq = new SurveylistsquestionData();
    $cq->question = $_POST["question"];
    $cq->description = $_POST["description"];
    $cq->linkpdf = isset($_POST["linkpdf"]) ? $_POST["linkpdf"] : null;
    $cq->surveylists_id = $_POST["ddllists"];
    $cq->q_status = $_POST["ddllquestionstatus"];
    $cq->position = $_POST["position"];
    $cq->q_format = $_POST["q_format"];
    $cq->num_input = $_POST["num_input"];
    $cq->user_id=Session::getUID();
    $cq->add();
    Session::msg("s", "Agregado satisfactoriamente.");

    Core::redir("./?view=adminquestionlist");
} else {
    Session::msg("d", "Error al agregar, por favor llame al administrador del sistema.");

    Core::redir("./?view=adminquestionlist");
}
