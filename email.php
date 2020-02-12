<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
                
require 'assets/plugin/PHPMailer/src/PHPMailer.php';
require 'assets/plugin/PHPMailer/src/Exception.php';
require 'assets/plugin/PHPMailer/src/SMTP.php';
list($name, $phone, $email, $company, $industry, $employed) = array_values($_POST);
$mail = new PHPMailer(true);
try{
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ));

    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'gunswinger0@gmail.com';                     // SMTP username
    $mail->Password   = 'Gunungsindur';                               // SMTP password
    $mail->SMTPSecure = 'tsl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;   
    $mail->From = $_POST["email"];
    $mail->FromName = $_POST["name"];
    $mail->addAddress('gunswinger0@gmail.com', 'support@DigiCareId'); 
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject =  $_POST["email"];
    $mail->Body = '<h3>Name : '.$_POST["name"].' <br/> Phone : '.$_POST["phone"].' 
    <br/> Email : '.$_POST["email"].'  <br/> Company : '.$_POST["company"].'
    <br/> Industry : '.$_POST["industry"].' <br/> Employed : '.$_POST["employed"].' </h3>';

    if(!$mail->send()){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          }) </script>";
    }else{
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong!',
            showConfirmButton: false,
            timer: 1500
          }) </script>";
    }
}catch ( Exception $e ){
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>