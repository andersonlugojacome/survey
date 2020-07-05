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
    $arAnswer = array();
    $totalSurvey = count($result);
    foreach ($result as $value) {
        $result2 = SurveylistsanswerData::getAllAnswersByPnAnhoSurveylistsIDReport($value->pn, $value->pn_anho, $value->surveylists_id);
        foreach ($result2 as $v) {
            if (is_numeric($v->surveyanswer)) {
                //$sum += $v->surveyanswer;
                
                $arAnswer[] = array(
                    'surveyquestion' => $v->surveyquestion,
                    'surveyanswer' => $v->surveyanswer,
                    'surveyquestioncount' => "1"
                );
            } else {
                // do some error handling...
            }
        }
    }
    $newArray = array();
    foreach ($arAnswer as $t) {
        $repeat = false;
        for ($i = 0; $i < count($newArray); $i++) {
            if ($newArray[$i]['surveyquestion'] == $t['surveyquestion']) {
                $newArray[$i]['surveyanswer'] += $t['surveyanswer'];
                $newArray[$i]['surveyquestioncount'] += $t['surveyquestioncount'];

                $repeat = true;
                break;
            }
        }
        if ($repeat == false) {
            $newArray[] = array(
                'surveyquestion' => $t['surveyquestion'],
                'surveyanswer' => $t['surveyanswer'],
                'surveyquestioncount' => $t['surveyquestioncount'],
                'average' => "-"
            );
        }
    }
$newArray2 = array();
foreach ($newArray as $val) {
    $average = 0.0;
    # code...
    if (is_numeric($val['surveyanswer'])) {
        $average = number_format($val['surveyanswer'] / $val['surveyquestioncount'], 1, ',', '');
        $newArray2[] = array(
            'surveyquestion' => $val['surveyquestion'],
            'surveyanswer' => $val['surveyanswer'] . " &#9733;",
            'surveyquestioncount' => $val['surveyquestioncount'],
            'average' =>  $average. " &#9733;"
        );
    } else {
        // do some error handling...
    }

}
   echo json_encode($newArray2);

} else {
    $newArray[] = array(
        'surveyquestion' => "-",
        'surveyanswer' => "-",
        'surveyquestioncount' => "-",
        'average' => "-",
    );
    echo json_encode($newArray);
}
