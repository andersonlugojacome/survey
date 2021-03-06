<?php

/**
 * Addsurveylistquestion short summary.
 *
 * Addsurveylistquestion description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */


$count = count($_POST['qid']);
$_SESSION['body'] = "";
$codeApproval = "";
if ($count > 0) {
    $counter = 0;
    $nameTEP = $_POST['nameTEP'];
    $body = "";
    $sum = 0;
    $total = count($_POST['qid']) - 1;
    foreach ($_POST['qid'] as $key => $value) {
        $qa = isset($_POST['question_' . $value . '_answer']) ? $_POST['question_' . $value . '_answer'] : "";
        $ca = new SurveylistsanswerData();
        $ca->pn = $_POST["pn"] != "" ? $_POST["pn"] : 1;
        $ca->answer = $qa;
        $ca->surveylistsquestions_id = $value;
        $ca->pn_anho =  $_POST["pn_anho"] != "" ? $_POST["pn_anho"] : "";
        $ca->nameTEP = $_POST["nameTEP"] != "" ? $_POST["nameTEP"] : "";
        $ca->surveylists_id = $_POST['surveylists_id'];
        $ca->a_code_approval = $codeApproval;
        $ca->add();
        $body .= $_POST['q_' . $value] . ", answer: " . $qa . "\n<br/>";

        if (is_numeric($qa)) {
            $sum += $qa;
            $counter ++;
        } else {
            // do some error handling...
        }
    }
    if (!empty($nameTEP)) {
        # code...
        $body .= "<b>Name:</b> " . $nameTEP . "\n<br/>";
    }
    $average = $sum / $counter;
    $body .= "Average : " . $average . "\n<br/>";

    $_SESSION['body'] = $body;
    //   CHANGE THE BELOW VARIABLES TO YOUR NEEDS
    //  MAKE SURE THE "FROM" EMAIL ADDRESS DOESN'T HAVE ANY NASTY STUFF IN IT
    $form = 'survey@spanishasap.com';
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
    if (preg_match($pattern, trim(strip_tags($form)))) {
        $cleanedFrom = trim(strip_tags($form));
    } else {
        Core::redir("./?view=thankscustomer&msg=The email address you entered was invalid. Please try again!");
        return "";
    }
    //$to = 'andersonlugojacome@gmail.com';
    $to = 'customerfeedback@spanishasap.com, info@digitalesweb.tech';
    $subject = "Customers survey of project number: " . $_POST['pn'];
    $headers = "From: " . $cleanedFrom . "\r\n";
    $headers .= "Reply-To: " . strip_tags($form) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    if (mail($to, $subject, $body, $headers)) {
        // echo 'Your message has been sent.';
        Core::addFlash("info", "Exito!");
        Core::redir("./?view=thankscustomer&msg=Successfully added, project number: " . $_POST['pn']);
    } else {
        //echo 'There was a problem sending the email.';
        Core::redir("./?view=thankscustomer&msg=Email not sent");
    }
} else {
    Core::redir("./?view=thankscustomer&msg=Error");
}
