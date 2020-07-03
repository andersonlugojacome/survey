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

        $count = 0;
        $sum = 0;
        $average = 0.0;
        $result2 = SurveylistsanswerData::getAllAnswersByPnAnhoSurveylistsIDReport($value->pn, $value->pn_anho, $value->surveylists_id);
        foreach ($result2 as $v) {

            if (is_numeric($v->surveyanswer)) {
                $sum += $v->surveyanswer;
                $count++;
                $arAnswer[] = array(
                    'surveyquestion' => $v->surveyquestion,
                    'surveyanswer' => $v->surveyanswer,
                    'surveyquestioncount' => "1"


                );
            } else {
                // do some error handling...
            }
        }
        //$totalQuestions = count($arAnswer);
        //$average = $sum / $count;
        //$average = number_format($average, 1, ',', '');

    }
    //$data = json_encode($arAnswer);
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
            //$average = $val1 / $val2;
            //$average = number_format($average, 1, ',', '');
            //echo $average ."<br>";
            $newArray[] = array(
                'surveyquestion' => $t['surveyquestion'],
                'surveyanswer' => $t['surveyanswer'],
                'surveyquestioncount' => $t['surveyquestioncount'],
                'created_at' => "-",
                'options' => "-"
            );
        }
    }

   echo json_encode($newArray);


    //echo "<pre>";
    //
    //print_r($arAnswer);
    //
    //echo "</pre>";

    //echo "<pre>";
//
    //print_r($result);
//
    //echo "</pre>";











    //echo json_encode($ar);
} else {
    $newArray[] = array(
        'surveyquestion' => "-",
        'surveyanswer' => "-",
        'surveyquestioncount' => "-",
        'created_at' => "-",
        'options' =>  "-"
    );
    echo json_encode($newArray);
}
