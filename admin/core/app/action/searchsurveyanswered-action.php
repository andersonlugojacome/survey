<?php

/**
 *  short summary.
 *
 *  description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */
//$_GET['surveyid'];


$result = SurveylistsanswerData::getByRangeAndSurveyID($_GET['start_at'], $_GET['finish_at'], $_GET['surveyid']);

if (count($result) > 0) {
    $ar = array();

    foreach ($result as $value) {
        $count = 0;
        $sum = 0;
        $average = 0.0;
        $u = UserData::getById($value->user_id);
        $us = UserData::getById(Session::getUID());
        $sendHref = './?action=sendemailaverage&pn='.$value->pn.'&anho='.$value->pn_anho.'&surveyid='.$value->surveylists_id;
        
        $editHref = './?view=admineditsurveylist&pn=' . $value->pn;
        $delHref = ($us->user_level) ? './?action=delsurveylist&cid=' . $value->id . '&pn=' . $value->pn  : '';
        $btnAction = '<div class="btn-group"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings"></i></button>
        <div class="dropdown-menu animated rubberBand" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
        <a class="dropdown-item" target="_blank" href="' . $sendHref . '"><i class="ti-envelope"></i> Send email</a>    
        <a class="dropdown-item" href="' . $editHref . '"><i class="ti-pencil-alt"></i> Edit</a>
            <a class="dropdown-item" href="' . $delHref . '"><i class="ti-trash"></i> Delete</a>
        </div></div>';
        $result2 = SurveylistsanswerData::getAllAnswersByPnSurveylistsID($value->pn, $value->pn_anho, $value->surveylists_id);
        foreach ($result2 as $v) {
            if (is_numeric($v->respuesta)) {
                $sum += $v->respuesta;
                $count++;
            } else {
                //    // do some error handling...
            }
        }
        $average = $sum / $count;
        $average = number_format($average, 1, ',', '');

        $ar[] = array(
            'pn' => $value->pn,
            'nameTEP' => $value->nameTEP,
            'rating' => $average . " &#9733;",
            'created_at' => $value->created_at,
            'options' =>  $btnAction
        );
    }
    echo json_encode($ar);
} else {
    $ar[] = array(
        'pn' => "-",
        'nameTEP' => "-",
        'rating' => "-",
        'created_at' => "-",
        'options' =>  "-"
    );
    echo json_encode($ar);
}
