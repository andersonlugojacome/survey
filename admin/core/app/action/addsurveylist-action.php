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
    $cl = new SurveylistsData();
    $cl->name = $_POST["name"];
    $cl->description = $_POST["description"];
    $cl->surveylist_status = $_POST['ddlsurveylist_status'];
    $cl->user_id=Session::getUID();
    $cl->add();
    Session::msg("s", "Successfully added.");
    Core::redir("./?view=adminsurveylists");
} else {
    Session::msg("d", "Error adding, please call system administrator.");
    Core::redir("./?view=adminsurveylists");
}
