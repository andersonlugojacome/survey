<?php
/**
* BookMedik
* @author DigitalesWeb
* @url http://DigitalesWeb.com/about/
**/

if (count($_POST)>0) {
    $user = new PacientData();
    $user->name = $_POST["name"];
    $user->lastname = $_POST["lastname"];

    $user->gender = $_POST["gender"];
    $user->day_of_birth = $_POST["day_of_birth"];
    
    $user->sick = $_POST["sick"];
    $user->medicaments = $_POST["medicaments"];
    $user->alergy = $_POST["alergy"];
    

    $user->address = $_POST["address"];
    $user->email = $_POST["email"];
    $user->phone = $_POST["phone"];
    $user->add();
    Session::msg("s", "Agregado correctamente.");
    print "<script>window.location='./?view=pacients';</script>";
}
