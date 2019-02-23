<?php
/**
 *  short summary.
 *
 *  description.
 * sendmeailcustomerscontact
 *
 * @version 1.0
 * @author DigitalesWeb
 */

if (count($_POST) > 0) {
    $body = "";
    $body .= "name : ".$_POST["name"] ."\n<br/>";
    $body .= "email: : " . $_POST["email"] . "\n<br/>";
    $body .= "Phone number : " . $_POST["phone"] . "\n<br/>";

    $_SESSION['body']=$body;
 
    $form = 'customerfeedback@spanishasap.com';
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
    if (preg_match($pattern, trim(strip_tags($form)))) {
        $cleanedFrom = trim(strip_tags($form));
    } else {
        return "The email address you entered was invalid. Please try again!";
    }
    $to = 'customerfeedback@spanishasap.com,andersonlugojacome@gmail.com';
    //$to = 'andersonlugojacome@gmail.com';
    $subject = "Customer contact survey of project number: ";
    $headers = "From: " . $cleanedFrom . "\r\n";
    $headers .= "Reply-To: ". strip_tags($form) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    if (mail($to, $subject, $body, $headers)) {
        Core::redir("./?view=thankscustomer&msg=Successfully added, project number: ");
    } else {
        Core::redir("./?view=thankscustomer&msg=Email not send");
    }
} else {
    Core::redir("./?view=thankscustomer&msg=Error");
}