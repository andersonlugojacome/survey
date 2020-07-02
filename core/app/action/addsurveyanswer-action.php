<?php

/**
 * Addsurveylistquestion short summary.
 *
 * Addsurveylistquestion description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */

$counter = 0;
$count = count($_POST['qid']);
$_SESSION['body'] = "";
$codeApproval = "";
if ($count > 0) {
    //foreach ($_POST['qid'] as $key => $value) {
    //    if ($_POST['question_'.$value.'_answer'] == 1) {
    //        $counter++;
    //    }
    //    if ($counter == $count) {
    //        //$codeApproval=NumeroALetras::generarCodigo(10);
    //    }
    //}
    //echo "El codigo de aprobacion es: ". $codeApproval;
    $body = "";
    $sum = 0;
    $total = count($_POST['qid']) - 1;
    foreach ($_POST['qid'] as $key => $value) {
        $qa = isset($_POST['question_' . $value . '_answer']) ? $_POST['question_' . $value . '_answer'] : "5";
        $ca = new SurveylistsanswerData();
        $ca->pn = $_POST['pn'];
        $ca->answer = $qa;
        $ca->surveylistsquestions_id = $value;
        //$ca->user_id= Session::getUID();
        $ca->pn_anho = $_POST['pn_anho'];
        $ca->nameTEP = $_POST['nameTEP'];
        $ca->surveylists_id = $_POST['surveylists_id'];
        $ca->a_code_approval = $codeApproval;
        $ca->add();
        $body .= $_POST['q_' . $value] . ", answer: " . $qa . "\n<br/>";

        if (is_numeric($qa)) {
            $sum += $qa;
        } else {
            // do some error handling...
        }
        //$sum += $_POST['question_'.$value.'_answer'];


    }
    $average = $sum / $total;
    $body .= "Average : " . $average . "\n<br/>";
    //echo "Sum: ".$sum.", Total: ".$total." Average;".$average." ". $body;

    $_SESSION['body'] = $body;
    //   CHANGE THE BELOW VARIABLES TO YOUR NEEDS
    //  MAKE SURE THE "FROM" EMAIL ADDRESS DOESN'T HAVE ANY NASTY STUFF IN IT
    $form = 'survey@spanishasap.com';
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
    if (preg_match($pattern, trim(strip_tags($form)))) {
        $cleanedFrom = trim(strip_tags($form));
    } else {
        return "The email address you entered was invalid. Please try again!";
    }
    $to = 'loly.alvarez@traduccionestep.com';
    //$to = 'andersonlugojacome@gmail.com';
    $subject = "Linguistic survey of project number: " . $_POST['pn'];
    $headers = "From: " . $cleanedFrom . "\r\n";
    $headers .= "Reply-To: " . strip_tags($form) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    if (mail($to, $subject, $body, $headers)) {
        // echo 'Your message has been sent.';
        Core::redir("./?view=thanks&msg=Agregado exitosamente, project number: ".$_POST['pn']);
    } else {
        //echo 'There was a problem sending the email.';
        Core::redir("./?view=thanks&msg=Email no enviado");
    }
} else {
    Core::redir("./?view=thanks&msg=Error");
}
