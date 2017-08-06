<?php

$to      = $email; 
$subject = 'Verification for Circuitstock'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$email.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://localhost/verify.php?id='.$random.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@circuitstock.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email

?>