<?php

/**
 * Addsurveylistquestion short summary.
 *
 * Addsurveylistquestion description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */
$_SESSION['body'] = "";
$body = "";


$resultIs = SurveylistsanswerData::getPnByPnAnho($_POST['pn'], $_POST['pn_anho'], $_POST['surveylists_id']);




if (!empty($resultIs)) {
    # code...
    Core::redir("./?view=thanks&msg=Ya este número de survey fue usado, por favor, intente con otro número y si no, comuníquese con: lidia.escuela@spanishasap.com");
} else {


    $counter = 0;
    $count = count($_POST['qid']);
    $nameTEP = $_POST['nameTEP'];
    $surveyId = $_POST['surveylists_id'];
    $codeApproval = "";
    $subjectName = "";
    if ($surveyId == "1") {
        # code...
        $subjectName = "Linguistic ";
        $surveyname = "Linguistic ";
    }
    if ($surveyId == "12") {
        # code...
        $subjectName = "Editor ";
        $surveyname = "Editor ";
    }
    if ($count > 0) {
        $_SESSION['body'] = "";
        $bodySession = "";
        $sum = 0;
        $total = count($_POST['qid']) - 1;
        foreach ($_POST['qid'] as $key => $value) {
            $qa = isset($_POST['question_' . $value . '_answer']) ? $_POST['question_' . $value . '_answer'] : "";
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
            $bodySession .= $_POST['q_' . $value] . ", answer: " . $qa . "\n<br/>";
         $body .="<tr><td>".$_POST['q_' . $value] ."</td><td>".$qa."</td></tr>";
            

            if (is_numeric($qa)) {
                $sum += $qa;
                $counter ++;
            } else {
                // do some error handling...
            }
        }
        if (!empty($nameTEP)) {
            # code...
           $bodySession .= "<b>Name:</b> " . $nameTEP . "\n<br/>";
            $body .="<tr><td>Name</td><td>".$nameTEP."</td></tr>";
        }
        $average = $sum / $counter;
        $body .="<tr><td>Average</td><td>".$average."</td></tr>";
        $bodySession .= "Average : " . $average . "\n<br/>";


        $_SESSION['body'] = $bodySession;
        //   CHANGE THE BELOW VARIABLES TO YOUR NEEDS
        //  MAKE SURE THE "FROM" EMAIL ADDRESS DOESN'T HAVE ANY NASTY STUFF IN IT
        $form = 'survey@spanishasap.com';
        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
        if (preg_match($pattern, trim(strip_tags($form)))) {
            $cleanedFrom = trim(strip_tags($form));
        } else {
            return "The email address you entered was invalid. Please try again!";
        }
        $to = 'spanishasap@spanishasap.com, info@digitalesweb.tech';
        $subject = $subjectName ."survey of project number: " . $_POST['pn'];
        sendEmailStatus($to,$subject,$surveyname,  $body);
    } else {
        Core::redir("./?view=thanks&msg=Error");
    }
}

function sendEmailStatus($to,$subject,$surveyname, $message){
    //$newpassmd5 = md5($pass);
    $bool=false;
    $path = 'admin/template/email-rating.html';
    //echo file_get_contents($path);
    if(file_exists($path)){
        $tpl = file_get_contents($path);
    }
    $bodyHtml = str_replace('{{surveyname}}', strtoupper($surveyname), $tpl);
    $bodyHtml = str_replace('{{contentTR}}', $message, $bodyHtml);
    //$to = $to;
    $header = "From: spanishasap <spanishasap@spanishasap.com> \r\n";
    $header .= "Bcc: info@digitalesweb.com \r\n";
    //$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $bool = mail($to,$subject,$bodyHtml,$header);
    // echo $bool;
    if($bool){
        Core::alert("Actualizado exitosamente!, email enviado: ".$bool);
        Core::redir("./?view=thanks&ids=".$_POST['surveylists_id']."&msg=Agregado exitosamente, project number: " . $_POST['pn']);
    }else{
        Core::alert("Actualizado exitosamente!, pero email no enviado, por favor notificar.");
        Core::redir("./?view=thanks&msg=Email no enviado");
    }

    //if (mail($email, "Alguien solicit� una nueva contrase�a para tu cuenta de Dolphy", $body, $header)) {
    //    mysql_query("UPDATE pw_user SET password ='$newpassmd5' WHERE user = '$email'");
    //}
}
