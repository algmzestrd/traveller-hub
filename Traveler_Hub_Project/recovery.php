<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 4/2/15
 * Time: 8:39 PM
 */

session_start();

$to      = $_POST['email'];
$subject = 'Traveler Hub Password Reset Request';
$message = 'Hello, You have requested a new password.';
$headers = 'From: thetravelerhubteam@gmail.com' . "\r\n" .
    'Reply-To: thetravelerhubteam@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers))
{
    echo "success";
}
else
{
    echo "failure";
}