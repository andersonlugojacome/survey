<?php

/**
 *  short summary.
 *
 *  description.
 *
 * @version 1.0
 * @author sistemas
 */
SurveylistsanswerData::delBy($_GET["pn"], $_GET["pnanho"], $_GET["surveyid"]);
Session::msg("d", " Deleted.");
Core::redir("./?view=adminsurveystadistics&surveyid=".$_GET["surveyid"]);
