
<?php

/**
 * delchecklist short summary.
 *
 * delchecklist description.
 *
 * @version 1.0
 * @author sistemas
 */
$clq = SurveylistsquestionData::getById($_GET["id"]);
$clq->del();
print "<script>window.location='./?view=adminquestionlist';</script>";