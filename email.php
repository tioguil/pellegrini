
<?php
$to      = 'guil_stay@hotmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: guil_stay@hotmail.com' . "\r\n" .
    'Reply-To: guil_stay@hotmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>