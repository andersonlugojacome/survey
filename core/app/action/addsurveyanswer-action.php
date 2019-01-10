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
$_SESSION['body']="";
$codeApproval = "";
if ($count>0) {
    foreach ($_POST['qid'] as $key => $value) {
        if ($_POST['question_'.$value.'_answer'] == 1) {
            $counter++;
        }
        if ($counter == $count) {
            //$codeApproval=NumeroALetras::generarCodigo(10);
        }
    }
    //echo "El codigo de aprobacion es: ". $codeApproval;
    $body = "";
    $sum = 0;
    $total = count($_POST['qid'])-1;
    foreach ($_POST['qid'] as $key => $value) {
        $ca = new SurveylistsanswerData();
        $ca->pn = $_POST['pn'];
        $ca->answer= $_POST['question_'.$value.'_answer'];
        $ca->surveylistsquestions_id = $value;
        //$ca->user_id= Session::getUID();
        $ca->pn_anho = $_POST['pn_anho'];
        $ca->surveylists_id = $_POST['surveylists_id'];
        $ca->a_code_approval = $codeApproval;
        $ca->add();
        $body .= $_POST['q_'.$value].", answer: ".$_POST['question_'.$value.'_answer']."\n<br/>";
        $sum += $_POST['question_'.$value.'_answer'];
    }
    $average = $sum / $total;
    $body .= "Average : ".$average."\n<br/>";
    //echo "Sum: ".$sum.", Total: ".$total." Average;".$average." ". $body;
     	
$_SESSION['body']=$body;
    //mail("loly.alvarez@traduccionestep.com", "Linguistic survey of project number: ".$_POST['pn'], $body, "survey@spanishasap.com");
    //mail("andersonlugojacome@gmail.com", "Linguistic survey of project number: ".$_POST['pn'], $body, "survey@spanishasap.com");
    //   CHANGE THE BELOW VARIABLES TO YOUR NEEDS
             //  MAKE SURE THE "FROM" EMAIL ADDRESS DOESN'T HAVE ANY NASTY STUFF IN IT
             $form ='survey@spanishasap.com';
			$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 
            if (preg_match($pattern, trim(strip_tags($form)))) { 
                $cleanedFrom = trim(strip_tags($form)); 
            } else { 
                return "The email address you entered was invalid. Please try again!"; 
            } 
			$to = 'loly.alvarez@traduccionestep.com';
			$subject = "Linguistic survey of project number: ".$_POST['pn'];
			$headers = "From: " . $cleanedFrom . "\r\n";
			$headers .= "Reply-To: ". strip_tags($form) . "\r\n";
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


// function sendEmailStatus($to, $subject, $radicado, $ci, $message, $email, $created_at)
// {
//     //$newpassmd5 = md5($pass);
//     $bool=false;
//     $path = 'template/update-procedure.html';
//     //echo file_get_contents($path);
//     if (file_exists($path)) {
//         $tpl = file_get_contents($path);
//     }
//     $body = str_replace('{{radicado}}', strtoupper($radicado), $tpl);
//     $body = str_replace('{{ci}}', $ci, $body);
//     $body = str_replace('{{email}}', $email, $body);
//     $body = str_replace('{{created_at}}', $created_at, $body);
//     $body = str_replace('{{content}}', $message, $body);
//     //$to = $to;
//     $header = "From: Info <info@notaria62bogota.com> \r\n";
//     $header .= "Bcc: app@notaria62bogota.com \r\n";
//     //$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
//     $header .= "Mime-Version: 1.0 \r\n";
//     $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//     $bool = mail($to, $subject, $body, $header);
//     // echo $bool;
//     if ($bool) {
//         Core::alert("Actualizado exitosamente!, email enviado: ".$bool);
//         print "<script>window.location='index.php?view=notarialprocedure';</script>";
//     } else {
//         Core::alert("Actualizado exitosamente!, pero email no enviado, por favor notificar.");
//         print "<script>window.location='index.php?view=notarialprocedure';</script>";
//     }
//     //if (mail($email, "Alguien solicit� una nueva contrase�a para tu cuenta de Dolphy", $body, $header)) {
//     //    mysql_query("UPDATE pw_user SET password ='$newpassmd5' WHERE user = '$email'");
//     //}
// }
