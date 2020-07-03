<?php

/**
 * Addsurveylistquestion short summary.
 *
 * Addsurveylistquestion description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */
if (Session::getUID() == "") {
    Core::redir("./?view=login", false);
}
$pn = $_GET["pn"];
$pn_anho = $_GET["anho"];
$surveylists_id = $_GET["surveyid"];
$result2 = SurveylistsanswerData::getAllAnswersByPnAnhoSurveylistsID($pn, $pn_anho, $surveylists_id);

if (!empty($result2)) {
    $sum = 0;
    $count = 0;
    $body = "";
    foreach ($result2 as $v) {
        if (is_numeric($v->surveyanswer)) {
            $sum += $v->surveyanswer;
            $count++;
            $body .= $v->surveyquestion.", answer: " . $v->surveyanswer . "\n<br/>";
        } else {
            $body .= $v->surveyquestion.", answer: " . $v->surveyanswer . "\n<br/>";
        }
    }

    $average = $sum / $count;
    $average = number_format($average, 1, ',', '');


    $_SESSION['body'] = "";
    $body .= "Average : " . $average . " &#9733;\n<br/>";

    $_SESSION['body'] = $body;
    //  CHANGE THE BELOW VARIABLES TO YOUR NEEDS
    //  MAKE SURE THE "FROM" EMAIL ADDRESS DOESN'T HAVE ANY NASTY STUFF IN IT
    $form = 'survey@spanishasap.com';
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
    if (preg_match($pattern, trim(strip_tags($form)))) {
        $cleanedFrom = trim(strip_tags($form));
    } else {
        return "The email address you entered was invalid. Please try again!";
    }
    $to = 'spanishasap@spanishasap.com';
    $subject = "Survey of project number: " . $pn;
    $headers = "From: " . $cleanedFrom . "\r\n";
    $headers .= "Reply-To: " . strip_tags($form) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    if (mail($to, $subject, $body, $headers)) {
        // echo 'Your message has been sent.';
        echo "<script>alert('E-mail send');window.close();</script>";
    } else {
        echo "<script>alert('E-mail not send');window.close();</script>";
    }
} else {
    echo "<script>alert('E-mail not send');window.close();</script>";
}
