<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/plugin/PHPMailer/src/Exception.php';
require 'assets/plugin/PHPMailer/src/PHPMailer.php';
require 'assets/plugin/PHPMailer/src/SMTP.php';

list($name, $phone, $email, $company, $industry, $employed) = array_values($_POST);

$html = '
<!DOCTYPE html>
<html lang="en">
<head></head>
<style>
        body{
        background-color: #f0f3f4;
        margin: 0 auto !important;
        padding: 0 auto !important;
        width: 0 auto !important;
        height: 0 auto !important;
        }
        #users{
        border-collapse: collapse;
        width: 100%;
        }
        #users td, #users th {
                boder: 1px solid  #ddd;
                padding: 8px;
        }

        #users tr:nth-child(even){
            background-color: #f2f2f2;
        }

        #users td:hover{
            background-color: #ddd;
        }

        #users th {
            padding-top; 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ecf6ff;
            color: #ffff;
        }
</style>
<body>';

$html = '
<table style="width: 100%; background-color: #3464cc; padding: 20px; color: #ffff;" >
<tr>
<td>
<table style="width:64px; margin:0px auto;">
<tr>
<td>
<tabel>
<tr>
<td colspan="2">
Hi,<br/>
<p> Here is new email from <b> '.$name.' </b></p>
</td>
</tr>
</tabel>
<table id="users">
<tr>
<th>Name</th>
<th>'.$name.'</th>
</tr>
<tr>
<th>Phone</th>
<th>'.$phone.'</th>
</tr>
<tr>
<th>Email</th>
<th>'.$email.'</th>
</tr>
<tr>
<th>Company</th>
<th>'.$company.'</th>
</tr>
<tr>
<th>Employed</th>
<th>'.$employed.'</th>
</tr>
</table>
</td>
</tr
</table>
</td>
</tr>
</table>
</body>
</html>';

/*$headers ="MIME-Version: 1.0" . "\r\n";
$headers += "Content-type:text/html;charset-UTF-8" . "\r\n";


 if(mail('gunswinger0@gmail.com', $html, $headers)){
    echo '<pre>';print_r("Mail sent succesfully"):echo '</pre>';
} else{
    echo '<pre>';print_r("Mail sent Failed"):echo '</pre>';
}
exit;
 */

$mail = new PHPMailer(true);

try {
       

       $mail->SMTPOptions = array(
           'ssl' => array(
               'verify_peer' => false,
               'verify_peer_name' => false,
               'allow_self_signed' => true
           )
           );

        //Server settings
                     // Enable verbose debug output
       $mail->isSMTP();                                            // Send using SMTP
       $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
       $mail->Username   = 'gunswinger0@gmail.com';                     // SMTP username
       $mail->Password   = 'fkwytyoyjrujobtn';                               // SMTP password
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
       $mail->Port       = 587;   


        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('gunswinger0@gmail.com', 'Support@DigiCare');     // Add a recipient


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->email = $email;
        $mail->Body    = $html;
        $mail->AltBody = strip_tags($html);

        $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}